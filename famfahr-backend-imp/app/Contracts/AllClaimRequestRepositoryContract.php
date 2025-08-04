<?php

namespace App\Contracts;

use App\Models\AdvanceSalary;
use App\Models\LoanClaim;

interface AllClaimRequestRepositoryContract
{
public function loanClaimRequests(array $data) : LoanClaim;
public function allClaimRequests(int $page, int $perPage) : array;
public function allClaimRequestLists() : array;
public function advanceSalaryClaimRequest(array $data) : AdvanceSalary;

public function advanceSalaryClaimRequestLists() : array;
}
