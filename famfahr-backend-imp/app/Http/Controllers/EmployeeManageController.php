<?php

namespace App\Http\Controllers;

use App\Contracts\EmployeeServiceContract;
use App\Http\Requests\EmployeeCreateRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmployeeManageController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeServiceContract $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    public function viewForm()
    {
        $departmentList = Department::all();
        return view('layouts.user_management.uadd_employee',compact('departmentList'));
    }
    public function createEmployee (EmployeeCreateRequest $employeeRequest): RedirectResponse
    {
        $data = $this->employeeService->createEmployee($employeeRequest->validated());
        return redirect()->route('hr.employee.list')->with('success','Employee Created Successfully');
    }
    public function getAllEmployees(): ?View
    {
        $empData = $this->employeeService->getAllEmployees();
        return view('layouts.user_management.uemployee_list',compact('empData'));
    }

    public function getEmployee(int $id): ?View
    {
        $indivisualData = $this->employeeService->getEmployeeById($id);
        return view('layouts.user_management.uemployee_profile',compact('indivisualData'));
    }
    public function user_profile(): ?View
    {
        $id = Auth::user()->emp_id;
        $indivisualData = $this->employeeService->getEmployeeById($id);
        return view('layouts.user_management.uemployee_profile',compact('indivisualData'));
    }
    public function deleteEmployee(int $id): bool
    {
        return $this->employeeService->deleteEmployee($id);
    }

    public function getEmployeeByEmployeeId(int $id): ?array
    {
        return $this->employeeService->getEmployeeByEmployeeId($id);
    }
    public function updateEmployeeByEmployeeId(int $id, array $data): ?array
    {
        return $this->employeeService->updateEmployee($id, $data);
    }


}
