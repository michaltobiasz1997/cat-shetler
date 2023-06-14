<?php

namespace App\Http\Controllers;

use App\Actions\Shelter\CreateEmployeeAction;
use App\Actions\Shelter\UpdateEmployeeAction;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Response as HttpResponse;

class EmployeeController extends Controller
{
    public function index()
    {
        return EmployeeResource::collection(Employee::all());
    }

    public function show(Employee $employee): EmployeeResource
    {
        return new EmployeeResource($employee);
    }

    public function store(CreateEmployeeRequest $request, CreateEmployeeAction $createEmployeeAction): EmployeeResource
    {
        $employee = $createEmployeeAction($request->validated());

        return new EmployeeResource($employee);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee, UpdateEmployeeAction $updateEmployeeAction): EmployeeResource
    {
        $employee = $updateEmployeeAction($employee, $request->validated());

        return new EmployeeResource($employee);
    }

    public function destroy(Employee $employee): HttpResponse
    {
        $employee->delete();

        return response()->noContent();
    }
}
