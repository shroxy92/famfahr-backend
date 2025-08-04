<?php

namespace App\Contracts;

use App\Models\AdvanceSalary;
use App\Models\LoanClaim;

interface AllClaimRequestServiceContract
{
    public function loanClaimRequests(array $data) : LoanClaim;
    public function allClaimRequestLists() : array;

    public function advanceSalaryClaimRequest(array $data) : AdvanceSalary;

    public function advanceSalaryClaimRequestLists() : array;
}
