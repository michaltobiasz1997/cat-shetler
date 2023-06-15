<?php

namespace App\Http\Controllers;

use App\Actions\CreateShelterAction;
use App\Actions\UpdateShelterAction;
use App\Http\Requests\CreateShelterRequest;
use App\Http\Requests\UpdateShelterRequest;
use App\Http\Resources\ShelterResource;
use App\Models\Shelter;
use Illuminate\Http\Response as HttpResponse;

class ShelterController extends Controller
{
    public function index()
    {
        return ShelterResource::collection(Shelter::all());
    }

    public function show(Shelter $shelter): ShelterResource
    {
        return new ShelterResource($shelter);
    }

    public function store(CreateShelterRequest $request, CreateShelterAction $createShelterAction): ShelterResource
    {
        $shelter = $createShelterAction($request->validated());

        return new ShelterResource($shelter);
    }

    public function update(UpdateShelterRequest $request, Shelter $shelter, UpdateShelterAction $updateShelterAction): ShelterResource
    {
        $shelter = $updateShelterAction($shelter, $request->validated());

        return new ShelterResource($shelter);
    }

    public function destroy(Shelter $shelter): HttpResponse
    {
        $shelter->delete();

        return response()->noContent();
    }
}
