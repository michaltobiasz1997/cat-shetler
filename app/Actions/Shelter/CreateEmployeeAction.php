<?php

namespace App\Actions\Shelter;

use App\Models\Employee;

class CreateEmployeeAction
{
    public function __invoke(array $employeeData): Employee
    {
        return Employee::query()->create($employeeData);
    }
}
