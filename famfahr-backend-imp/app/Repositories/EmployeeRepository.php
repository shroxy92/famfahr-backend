<?php

namespace App\Repositories;

use App\Contracts\EmployeeRepositoryContract;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository implements EmployeeRepositoryContract
{
    /**
     * @var Employee
     */
    protected $model;

    /**
     * EmployeeRepository constructor.
     *
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    /**
     * Get all employees
     *
     * @return Collection
     */
    public function getAllEmployees(): Collection
    {
        return $this->model::with('departments')->get();
    }

    /**
     * Get employee by ID
     *
     * @param int $id
     * @return Employee|null
     */
    public function getEmployeeById(int $id): ?Employee
    {
        return $this->model::with('departments')->find($id);
    }

    /**
     * Get employee by employee ID
     *
     * @param string $employeeId
     * @return Employee|null
     */
    public function getEmployeeByEmployeeId(string $employeeId): ?Employee
    {
        return $this->model->where('employee_id', $employeeId)->first();
    }

    /**
     * Create a new employee
     *
     * @param array $data
     * @return Employee
     */
    public function createEmployee(array $data): Employee
    {
        $insertedData = $this->model->create($data);
        $insertedData->departments()->attach($data['department']);
        return $insertedData;
    }

    /**
     * Update an existing employee
     *
     * @param int $id
     * @param array $data
     * @return Employee|null
     */
    public function updateEmployee(int $id, array $data): ?Employee
    {
        $employee = $this->getEmployeeById($id);

        if (!$employee) {
            return null;
        }

        $employee->update($data);
        return $employee->fresh();
    }

    /**
     * Delete an employee
     *
     * @param int $id
     * @return bool
     */
    public function deleteEmployee(int $id): bool
    {
        $employee = $this->getEmployeeById($id);

        if (!$employee) {
            return false;
        }

        return $employee->delete();
    }
}
