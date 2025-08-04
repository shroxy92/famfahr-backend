<?php

namespace App\Services;

use App\Contracts\DepartmentLeadRepositoryContract;
use App\Models\DepartmentLead;
use App\Repositories\DepartmentLeadRepository;
use Illuminate\Http\Request;
use mysql_xdevapi\Collection;

class DepartmentLeadService implements DepartmentLeadRepositoryContract
{
    protected $departmentLead;

    public function __construct(DepartmentLeadRepository $departmentLead)
    {
        $this->departmentLead = $departmentLead;
    }

    public function addDepartmentLead(array $data) : DepartmentLead
    {
        return $this->departmentLead->addDepartmentLead($data);
    }

    public function updateDepartmentLead(DepartmentLead $departmentLead)
    {
        // TODO: Implement updateDepartmentLead() method.
    }
}
