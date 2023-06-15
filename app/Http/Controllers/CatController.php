<?php

namespace App\Http\Controllers;

use App\Actions\CreateCatAction;
use App\Actions\UpdateCatAction;
use App\Http\Requests\CreateCatRequest;
use App\Http\Requests\UpdateCatRequest;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Response as HttpResponse;

class CatController extends Controller
{
    public function index()
    {
        return CatResource::collection(Cat::all());
    }

    public function show(Cat $cat): CatResource
    {
        return new CatResource($cat);
    }

    public function store(CreateCatRequest $request, CreateCatAction $createCatAction): CatResource
    {
        $cat = $createCatAction($request->validated());

        return new CatResource($cat);
    }

    public function update(UpdateCatRequest $request, Cat $cat, UpdateCatAction $updateCatAction): CatResource
    {
        $cat = $updateCatAction($cat, $request->validated());

        return new CatResource($cat);
    }

    public function destroy(Cat $cat): HttpResponse
    {
        $cat->delete();

        return response()->noContent();
    }
}
