<?php

namespace App\Repositories\volunteer;
use App\Models\Volunteer;
use App\Repositories\Volunteer\VolunteerRepositoryInterface;


class VolunteerRepository implements VolunteerRepositoryInterface
{
    public function acceptVolunteer(){
        return Volunteer::where('status', "Accepted")->get();
    }
    public function show($id){
          return Volunteer::find($id);
    }

    public function pendingVolunteer(){
        return Volunteer::where('status', "Pending")->get();
    }
}
