<?php

namespace App\Repositories;

use App\Contracts\DepartmentLeadRepositoryContract;
use App\Models\DepartmentLead;

class DepartmentLeadRepository implements DepartmentLeadRepositoryContract
{

    protected $departmentLead;
    function __construct(DepartmentLead $departmentLead)
    {
        $this->departmentLead = $departmentLead;
    }
    public function addDepartmentLead(array $data) : DepartmentLead
    {

        return $this->departmentLead->create($data);
    }

    public function updateDepartmentLead(DepartmentLead $departmentLead)
    {
        // TODO: Implement updateDepartmentLead() method.
    }
}
