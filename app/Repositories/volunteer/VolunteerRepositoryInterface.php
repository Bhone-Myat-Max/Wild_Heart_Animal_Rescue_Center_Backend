<?php

namespace App\Repositories\volunteer;

interface VolunteerRepositoryInterface
{
    // public function index();
    public function pendingVolunteer();
    public function acceptVolunteer();    // public function store();
    public function show($id);
}
