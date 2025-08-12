<?php

namespace App\Http\Controllers;

use App\Contracts\DepartmentLeadServiceContract;
use App\Contracts\EmployeeServiceContract;
use App\Models\Department;
use App\Models\DepartmentLead;
use App\Http\Requests\StoreDepartmentLeadRequest;
use App\Http\Requests\UpdateDepartmentLeadRequest;



class DepartmentLeadController extends Controller
{
    protected $employeeService;
    protected $departmentLeadservice;

    public function __construct(EmployeeServiceContract $employeeService, DepartmentLeadServiceContract $departmentLeadService)
    {
        $this->employeeService = $employeeService;
        $this->departmentLeadservice = $departmentLeadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = $this->employeeService->getAllEmployees();
        $leads = DepartmentLead::with(['employee', 'department'])->get();
        $department = Department::all();
        return view('layouts.user_management.uadd_dept_lead',compact('employees','leads','department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentLeadRequest $request)
    {
        //dd($request);
        $this->departmentLeadservice->addDepartmentLead($request->validated());
        return redirect()->route('hr.lead.add')->with('success', 'Lead assigned successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DepartmentLead $departmentLead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DepartmentLead $departmentLead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentLeadRequest $request, DepartmentLead $departmentLead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DepartmentLead::findOrFail($id)->delete();

        return redirect()->route('hr.lead.add')->with('success', 'Lead removed successfully.');
    }
}
