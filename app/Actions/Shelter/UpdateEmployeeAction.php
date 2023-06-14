<?php

namespace App\Actions\Shelter;

use App\Models\Employee;

class UpdateEmployeeAction
{
    public function __invoke(Employee $employee, array $employeeData): Employee
    {
        $employee->update($employeeData);

        return $employee;
    }
}
