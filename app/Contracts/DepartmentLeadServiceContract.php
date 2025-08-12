<?php

namespace App\Contracts;

use App\Models\DepartmentLead;
use Illuminate\Http\Request;

interface DepartmentLeadServiceContract
{
    public function addDepartmentLead(array $data) : DepartmentLead;
    public function updateDepartmentLead(DepartmentLead $departmentLead);

}
