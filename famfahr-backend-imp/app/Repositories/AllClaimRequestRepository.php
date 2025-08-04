<?php

namespace App\Repositories;

use App\Contracts\AllClaimRequestRepositoryContract;
use App\Models\AdvanceSalary;
use App\Models\LoanClaim;
use Illuminate\Support\Facades\Auth;


class AllClaimRequestRepository implements AllClaimRequestRepositoryContract
{
    protected $modelLoanClaim;
    protected $modelAdvanceSalary;
    public function __construct(LoanClaim $modelLoanClaim, AdvanceSalary $modelAdvanceSalary)
    {
        $this->modelLoanClaim = $modelLoanClaim;
        $this->modelAdvanceSalary = $modelAdvanceSalary;
    }

    public function loanClaimRequests(array $data): LoanClaim
    {
        $data['employee_id'] = Auth::id();
        return $this->modelLoanClaim->create($data);
    }

    public function allClaimRequests(int $page, int $perPage): array
    {
        // TODO: Implement allClaimRequests() method.
    }

    public function allClaimRequestLists(): array
    {
        // TODO: Implement allClaimRequestLists() method.
        return $this->modelLoanClaim->all()->where('employee_id','=',Auth::id())->toArray();
    }

    public function advanceSalaryClaimRequest(array $data): AdvanceSalary
    {
        // TODO: Implement advanceSalaryClaimRequest() method.
        $data['employee_id'] = Auth::id();
        //dd($data);
        return  $this->modelAdvanceSalary->create($data);
    }

    public function allClaimRequestLists1(): array
    {
        $results = \DB::select("
        SELECT id, user_id, amount, reason, need_by as date, 'loan_claim' as type, created_at
        FROM loan_claims

        UNION ALL

        SELECT id, user_id, salary as amount, reason, need_by as date, 'advance_salary' as type, created_at
        FROM advance_salaries

        ORDER BY created_at DESC
    ");

        return collect($results)->toArray();
    }

    public function advanceSalaryClaimRequestLists(): array
    {
        // TODO: Implement advanceSalaryClaimRequestLists() method.
    }
}
