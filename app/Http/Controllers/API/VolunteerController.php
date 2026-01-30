<?php

namespace App\Http\Controllers\API;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use App\Repositories\Volunteer\VolunteerRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class VolunteerController extends BaseController
{
    protected $VolunteerRepository;

    public function __construct(VolunteerRepositoryInterface $VolunteerRepository)
        {
            $this->VolunteerRepository = $VolunteerRepository;
        }

    public function acceptedVolunteer()
    {
        $volunteerdata = $this->VolunteerRepository->acceptVolunteer();
        return $this->success($volunteerdata, 'Volunteer data success', 200, count($volunteerdata));

    }

    public function pendingVolunteer()
    {
        $volunteerdata = $this->VolunteerRepository->pendingVolunteer();
        return $this->success($volunteerdata, 'Volunteer data success', 200, count($volunteerdata));

    }

    public function store(Request $request)
    {

    }


    public function show(string $id)
    {
         $volunteerdata = Volunteer::find($id);
        return $this->success($volunteerdata, 'Successfully show Volunteer data ', 200);



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {

        $Volunteer = $this->VolunteerRepository->show($id);
        if (!$Volunteer) {
            return $this->error("Volunteer not found", [], 404);
        }
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'skill' => 'required|string',
            'availability' => 'required|string',
            'phone' => 'required',
            'status' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }
        $Volunteer->update([
            'name' => $request->name ?? $Volunteer->name,
            'skill' => $request->skill ?? $Volunteer->skill,
            'availability' => $request->availability ?? $Volunteer->availability,
            'phone' => $request->phone ?? $Volunteer->phone,
            'status' =>$request->status ?? $Volunteer->status,
        ]);


        return $this->success($Volunteer, "Volunteer updated successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {

        $volunteerdata = $this->VolunteerRepository->show($id);
        $volunteerdata->delete();
        return $this->success($volunteerdata, 'Successfully Delete Volunteer data ', 200);

    }

    public function statusUpdate(Request $request, string $id)

    {

        $Volunteer = $this->VolunteerRepository->show($id);
        if (!$Volunteer) {
            return $this->error("Volunteer not found", [], 404);
        }
        $validation = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }
        $Volunteer->update([
            'name' => $request->name ?? $Volunteer->name,
            'skill' => $request->skill ?? $Volunteer->skill,
            'availability' => $request->availability ?? $Volunteer->availability,
            'phone' => $request->phone ?? $Volunteer->phone,
            'status' =>$request->status ?? $Volunteer->status,
        ]);


        return $this->success($Volunteer, "Volunteer updated successfully", 200);
    }
}
