<?php

namespace App\Contracts;

use App\Models\DepartmentLead;

interface DepartmentLeadRepositoryContract
{
    public function addDepartmentLead(array $data) : DepartmentLead;
    public function updateDepartmentLead(DepartmentLead $departmentLead);
}
