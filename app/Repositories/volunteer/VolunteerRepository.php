<?php

namespace App\Repositories\volunteer;
use App\Models\Volunteer;
use App\Repositories\Volunteer\VolunteerRepositoryInterface;


class VolunteerRepository implements VolunteerRepositoryInterface
{
    public function index(){
        return Volunteer::get();
    }
    public function show($id){
          return Volunteer::find($id);
    }
}
