<?php

namespace App\Http\Controllers\API;

// use App\Models\RescueCase;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class DonationController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donation = Donation::get();
        if (!$donation) {
            return $this->error("donation not found", [], 404);
        }
        return $this->success($donation, "donation data Show successfully", 201);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'email' => 'required|string',
            'phone' => 'required|string',
            'purpose' => 'required|string',
            'image' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

        if ($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('DonationImages'), $imageName);

        }

        $donation = Donation::create(
            [
            'name' => $request->name,
            'amount' => $request->amount,
            'email' => $request->email,
            'phone' => $request->phone,
            'purpose' => $request->purpose,
            'image' =>$imageName,
        ]);



     return $this->success($donation, "donation created successfully", 201);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $donation = Donation::find($id);
         return $this->success($donation, "Each donation data Show successfully", 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $donation = Donation::find($id);

        if (!$donation) {
            return $this->error("donation not found", [], 404);
        }

        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'email' => 'required|string',
            'phone' => 'required|string',
            'purpose' => 'required|string',
            'image' => 'required',
        ]);


        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

        if ($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('DonationImages'), $imageName);

        }


        $donation->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'email' => $request->email,
            'phone' => $request->phone,
            'purpose' => $request->purpose,
            'image' =>$imageName,
        ]);


        return $this->success($donation, "donation updated successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donation = Donation::find($id);
        $donation->delete();
        return $this->success($donation, 'Successfully Delete donation data ', 200);
    }
}
