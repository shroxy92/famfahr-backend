<?php

namespace App\Services;

use App\Contracts\EmployeeServiceContract;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Database\Eloquent\Collection;


class EmployeeService implements EmployeeServiceContract
{
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function createEmployee(array $data): Employee
    {
        // TODO: Implement createEmployee() method.
        return $this->employeeRepository->createEmployee($data);
    }

    public function updateEmployee(int $id, array $data): ?Employee
    {
        // TODO: Implement updateEmployee() method.
        return $this->employeeRepository->updateEmployee($id, $data);
    }

    public function deleteEmployee(int $id): bool
    {
        // TODO: Implement deleteEmployee() method.
        return $this->employeeRepository->deleteEmployee($id);
    }

    public function getEmployeeByEmployeeId(string $employeeId): ?Employee
    {
        // TODO: Implement getEmployeeByEmployeeId() method.
        return $this->employeeRepository->getEmployeeByEmployeeId($employeeId);
    }

    public function getEmployeeById(int $id): ?Employee
    {
        // TODO: Implement getEmployeeById() method.
        return $this->employeeRepository->getEmployeeById($id);
    }

    public function getAllEmployees(): ?Collection
    {
        // TODO: Implement getAllEmployee() method.
        return $this->employeeRepository->getAllEmployees();
    }
}
