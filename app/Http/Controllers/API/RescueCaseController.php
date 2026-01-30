<?php

namespace App\Http\Controllers\API;

use App\Models\RescueCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class RescueCaseController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rescueCase = RescueCase::get();
        if (!$rescueCase) {
            return $this->error("rescueCase not found", [], 404);
        }
        return $this->success($rescueCase, "rescueCase data Show successfully", 201);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(),
         [
            'case_title'     => 'required|string|max:255',
            'reported_by'    => 'nullable|string|max:255',   // public can submit name
            'location'       => 'required|string|max:255',
            'description'    => 'nullable|string',
            'priority_level' => [
                'required',
                Rule::in(['Low', 'Medium', 'High', 'Emergency'])
            ],
            'case_status' => [
                'required',
                Rule::in(['Pending', 'In Progress', 'Completed'])
            ],
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

        $rescueCase = RescueCase::create(
        [
            'case_title'     => $request->case_title,
            'reported_by'    => $request->reported_by,
            'location'       => $request->location,
            'description'    => $request->description,
            'priority_level' => $request->priority_level,
            'case_status'    => $request->case_status,
            'reported_date'  => $request->reported_date,
        ]);




     return $this->success($rescueCase, "rescueCase created successfully", 201);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $rescueCase = RescueCase::with('users')->find($id);
         return $this->success($rescueCase, "Each rescueCase data Show successfully", 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $rescueCase = RescueCase::find($id);

        if (!$rescueCase) {
            return $this->error("Volunteer not found", [], 404);
        }

        $validation = Validator::make($request->all(),
         [
            'case_title'     => 'required|string|max:255',
            'reported_by'    => 'nullable|string|max:255',   // public can submit name
            'location'       => 'required|string|max:255',
            'description'    => 'nullable|string',
            'priority_level' => [
                'required',
                Rule::in(['Low', 'Medium', 'High', 'Emergency'])
            ],
            'case_status' => [
                'required',
                Rule::in(['Pending', 'In Progress', 'Completed'])
            ],
        ]);


        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }


        $rescueCase->update([
            'case_title'     => $request->case_title,
            'reported_by'    => $request->reported_by,
            'location'       => $request->location,
            'description'    => $request->description,
            'priority_level' => $request->priority_level,
            'case_status'    => $request->case_status,
            'reported_date'  => $request->reported_date,
        ]);


        return $this->success($rescueCase, "RescueCase updated successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rescueCase = RescueCase::find($id);
        $rescueCase->delete();
        return $this->success($rescueCase, 'Successfully Delete rescueCase data ', 200);
    }
}
