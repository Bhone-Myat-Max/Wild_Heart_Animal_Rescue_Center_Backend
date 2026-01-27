<?php

namespace App\Http\Controllers\API;

use App\Models\Treatment;
use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TreatmentResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class TreatmentController extends BaseController
{
    /**
     * Display a listing of treatments with pagination and search.
     */
    public function index()
    {
        $limit = request()->get('limit', 10);
        $search = request()->get('search', "");

        // Search by diagnosis or animal tag code
        $treatments = Treatment::with(['animal', 'user'])
            ->when($search, function ($query) use ($search) {
                $query->where('diagnosis', 'like', "%{$search}%")
                      ->orWhereHas('animal', function ($q) use ($search) {
                          $q->where('tagcode_name', 'like', "%{$search}%");
                      });
            })
            ->orderBy('treatment_id', 'desc')
            ->paginate($limit);

        $body['total'] = Treatment::count();
        $body['data'] = TreatmentResource::collection($treatments);

        return $this->success(
            $body,
            "Treatment records retrieved successfully",
            200
        );
    }

    /**
     * Display the specified treatment.
     */
    public function show($id)
    {
        $treatment = Treatment::with(['animal', 'user'])->find($id);

        if (!$treatment) {
            return $this->error("Treatment record not found", [], 404);
        }

        return $this->success(
            new TreatmentResource($treatment),
            "Treatment record retrieved successfully",
            200
        );
    }

    /**
     * Store a newly created treatment.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'animal_id'      => 'required|exists:animals,animal_id',
            'user_id'        => 'required|exists:users,id',
            'diagnosis'      => 'required|string|max:255',
            'treatment_date' => 'required|date',
            'notes'          => 'nullable|string',
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

        $treatment = Treatment::create([
            'animal_id'      => $request->animal_id,
            'user_id'        => $request->user_id,
            'diagnosis'      => $request->diagnosis,
            'treatment_date' => $request->treatment_date,
            'notes'          => $request->notes,
        ]);

        return $this->success(
            new TreatmentResource($treatment),
            "Treatment record created successfully",
            201
        );
    }

    /**
     * Update the specified treatment.
     */
    public function update(Request $request, $id)
    {
        $treatment = Treatment::find($id);

        if (!$treatment) {
            return $this->error("Treatment record not found", [], 404);
        }

        $validation = Validator::make($request->all(), [
            'animal_id'      => 'required|exists:animals,animal_id',
            'user_id'        => 'required|exists:users,id',
            'diagnosis'      => 'required|string|max:255',
            'treatment_date' => 'required|date',
            'notes'          => 'nullable|string',
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

        $treatment->update($request->all());

        return $this->success(
            new TreatmentResource($treatment),
            "Treatment record updated successfully",
            200
        );
    }

    /**
     * Remove the specified treatment.
     */
    public function delete($id)
    {
        $treatment = Treatment::find($id);

        if (!$treatment) {
            return $this->error("Treatment record not found", [], 404);
        }

        $treatment->delete();

        return $this->success([], "Treatment record deleted successfully", 200);
    }
}
