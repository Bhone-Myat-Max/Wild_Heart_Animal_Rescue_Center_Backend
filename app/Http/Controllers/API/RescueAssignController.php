<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RescueAssignment;
use App\Models\RescueCase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class RescueAssignController extends BaseController
{
    #View RescueAssignment
    public function index()
    {
        $rescue_assign = RescueAssignment::with('rescueCase', 'user')->get();
        return $this->success($rescue_assign, 'Rescue_Case_Assigned Data successfully show', 200,);

    }

    # Store RescueAssignment
    public function store(Request $request)
    {
         $validation = Validator::make($request->all(), [
            'rescue_case_id' => 'required|integer|exists:rescue_cases,id',
            'user_id' => 'required|integer|exists:users,id',
            'assignment_status' => [
                'required',
                Rule::in(['Assigned', 'Completed'])
            ],
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

        $rescue_assign = RescueAssignment::create([
            'rescue_case_id' => $request->rescue_case_id,
            'user_id' => $request->user_id,
            'assignment_status' => $request->assignment_status ?? 'Assigned',
        ]);

        return $this->success($rescue_assign, 'Rescue Case Successfully Assigned', 200,);
    }

    #show each RescueAssignment

    public function show(string $id)
    {
        $rescue_assign=RescueAssignment::with('rescueCase', 'user')->find($id);
        return $this->success($rescue_assign, 'each Assigned_RescueCase Successfully show', 200,);
    }

    #Update RescueAssignment
    public function update(Request $request, string $id)
    {

        $validation = Validator::make($request->all(), [
            'assignees' => 'required|array',
            'assignees.*' => 'exists:users,id',
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

    $data = $validation->validated();
    $assignees = $data['assignees'];
    $rescueCase = RescueCase::findOrFail($id);

    $rescueCase->users()->sync($assignees);


        return $this->success($rescueCase, 'Assigned_Rescue Case Successfully Updated', 200,);
    }

    #Delete RescueAssignment
    public function destroy(string $id)
    {
        $rescue_assign=RescueAssignment::find($id);
        $rescue_assign->delete();
        return $this->success($rescue_assign, 'Assigned_Rescue Case Successfully removed', 200,);

    }
}
