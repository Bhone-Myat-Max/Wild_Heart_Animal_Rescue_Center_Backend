<?php

namespace App\Http\Controllers\API;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnimalResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class AnimalController extends BaseController
{
    public function index()
    {
        $limit = request()->get('limit', 10);
        $search = request()->get('search', "");

        $animals = Animal::when($search, function ($query) use ($search) {
                $query->where('tagcode_name', 'like', "%{$search}%")
                      ->orWhere('species', 'like', "%{$search}%");
            })
            ->orderBy('animal_id', 'desc')
            ->paginate($limit);

        $body['total'] = Animal::count();
        $body['data'] = AnimalResource::collection($animals);

        return $this->success($body, "Animals retrieved successfully", 200);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'tagcode_name'   => 'required|string|unique:animals',
            'species'        => 'required|string',
            'rescue_date'    => 'required|date',
            'current_status' => 'required|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validation->fails()) {
            return $this->error("Validation Error", $validation->errors(), 422);
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('animalImages'), $imageName);
        }

        $animal = Animal::create(array_merge(
            $request->all(),
            ['image' => $imageName]
        ));

        return $this->success(new AnimalResource($animal), "Animal created successfully", 201);
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::find($id);
        if (!$animal) return $this->error("Animal not found", [], 404);

        $validation = Validator::make($request->all(), [
            'tagcode_name' => 'required|string|unique:animals,tagcode_name,' . $id . ',animal_id',
            'species'      => 'required|string',
        ]);

        if ($validation->fails()) return $this->error("Validation Error", $validation->errors(), 422);

        if ($request->hasFile('image')) {
            if ($animal->image && file_exists(public_path('animalImages/' . $animal->image))) {
                unlink(public_path('animalImages/' . $animal->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('animalImages'), $imageName);
            $animal->image = $imageName;
        }

        $animal->update($request->except('image'));
        return $this->success(new AnimalResource($animal), "Animal updated successfully", 200);
    }

    public function destroy($id)
    {
        $animal = Animal::find($id);
        if (!$animal) return $this->error("Animal not found", [], 404);

        if ($animal->image && file_exists(public_path('animalImages/' . $animal->image))) {
            unlink(public_path('animalImages/' . $animal->image));
        }

        $animal->delete();
        return $this->success([], "Animal deleted successfully", 200);
    }
}
