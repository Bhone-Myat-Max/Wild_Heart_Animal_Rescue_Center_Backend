<?php

namespace App\Http\Controllers\API;

use App\Models\Adopt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdoptResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class AdoptController extends BaseController
{
    public function index()
    {
        $limit = request()->get('limit', 10);
        $search = request()->get('search', "");

        // Search by adopter name or species
        $adoptions = Adopt::with('animal')
            ->when($search, function ($query) use ($search) {
                $query->where('adopted_by', 'like', "%{$search}%")
                      ->orWhere('species', 'like', "%{$search}%");
            })
            ->orderBy('adopt_id', 'desc')
            ->paginate($limit);

        $body['total'] = Adopt::count();
        $body['data'] = AdoptResource::collection($adoptions);

        return $this->success(
            $body,
            "Adoption records retrieved successfully",
            200
        );
    }

    public function show($id)
    {
        $adopt = Adopt::with('animal')->find($id);

        if (!$adopt) {
            return $this->error("Adoption record not found", [], 404);
        }

        return $this->success(
            new AdoptResource($adopt),
            "Adoption record retrieved successfully",
            200
        );
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'animal_id'    => 'required|exists:animals,animal_id',
            'species'      => 'required|string',
            'adopted_by'   => 'required|string|max:255',
            'address'      => 'required|string',
            'email'        => 'required|email',
            'phone_number' => 'required|string',
            'adopted_date' => 'required|date',
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

        $adopt = Adopt::create($request->all());

        return $this->success(
            new AdoptResource($adopt),
            "Adoption processed successfully",
            201
        );
    }

    public function update(Request $request, $id)
    {
        $adopt = Adopt::find($id);

        if (!$adopt) {
            return $this->error("Adoption record not found", [], 404);
        }

        $validation = Validator::make($request->all(), [
            'animal_id'    => 'required|exists:animals,animal_id',
            'adopted_by'   => 'required|string|max:255',
            'email'        => 'required|email',
            'phone_number' => 'required|string',
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

        $adopt->update($request->all());

        return $this->success(
            new AdoptResource($adopt),
            "Adoption record updated successfully",
            200
        );
    }

    public function delete($id)
    {
        $adopt = Adopt::find($id);

        if (!$adopt) {
            return $this->error("Adoption record not found", [], 404);
        }

        $adopt->delete();

        return $this->success([], "Adoption record deleted successfully", 200);
    }
}
