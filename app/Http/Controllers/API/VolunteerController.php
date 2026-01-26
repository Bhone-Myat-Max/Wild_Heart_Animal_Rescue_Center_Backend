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

    public function index()
    {
        $volunteerdata = $this->VolunteerRepository->index();
        return $this->success($volunteerdata, 'Volunteer data success', 200);

    }

    public function store(Request $request)
    {
        $volunteerdata = $this->VolunteerRepository->show($id);
        $volunteerdata->delete();
        return $this->success($volunteerdata, 'Successfully Delete Volunteer data ', 200);
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

// return response()->json($request->all());
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


        // if ($validation->fails()) {
        //     return $this->error("Validation Error", $validation->errors(), 422);
        // }


        $Volunteer->update([
            'name' => $request->name,
            'skill' => $request->skill,
            'availability' => $request->availability,
            'phone' => $request->phone,
            'status' =>$request->status,
            'price' => $request->price,
            'status' => $request->status
        ]);


        return $this->success($validation, "Product updated successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $volunteerdata = $this->VolunteerRepository->show($id);
        $volunteerdata->delete();
        return $this->success($volunteerdata, 'Successfully Delete Volunteer data ', 200);

    }
}
