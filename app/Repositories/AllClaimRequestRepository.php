<?php

namespace App\Repositories;

use App\Contracts\AllClaimRequestRepositoryContract;
use App\Models\AdvanceSalary;
use App\Models\Claim;
use App\Models\LoanClaim;
use Illuminate\Support\Facades\Auth;


class AllClaimRequestRepository implements AllClaimRequestRepositoryContract
{
    protected $modelLoanClaim;
    protected $modelAdvanceSalary;

    protected $modelClaim;
    public function __construct(LoanClaim $modelLoanClaim, AdvanceSalary $modelAdvanceSalary, Claim $modelClaim)
    {
        $this->modelLoanClaim = $modelLoanClaim;
        $this->modelAdvanceSalary = $modelAdvanceSalary;
        $this->modelClaim = $modelClaim;
    }

    public function loanClaimRequests(array $data): LoanClaim
    {
        $data['employee_id'] = Auth::user()->emp_id;
        return $this->modelLoanClaim->create($data);
    }

    public function allClaimRequests(int $page, int $perPage): array
    {
        // TODO: Implement allClaimRequests() method.
    }

    public function allClaimRequestLists(): array
    {
        // TODO: Implement allClaimRequestLists() method.
        $employee_id = Auth::user()->emp_id;
        return [
          'loanClaims' => $this->modelLoanClaim::where('employee_id', $employee_id)->orderByDesc('created_at')->get(),
          'claims' => $this->modelClaim::where('employee_id', $employee_id)->orderByDesc('created_at')->get(),
          'advanceSalaries' =>$this->modelAdvanceSalary::where('employee_id', $employee_id)->orderByDesc('created_at')->get(),
        ];
        //return $this->modelLoanClaim->all()->where('employee_id','=',Auth::id())->toArray();
    }

    public function advanceSalaryClaimRequest(array $data): AdvanceSalary
    {
        // TODO: Implement advanceSalaryClaimRequest() method.
        $data['employee_id'] = Auth::user()->emp_id;
        //dd($data);
        return  $this->modelAdvanceSalary->create($data);
    }

    public function claimRequests(array $data): Claim
    {
        // Save claim
        $insertClaim = [
            'employee_id'=> auth()->user()->emp_id,
            'category'   => $data['category'],
            'amount'     => $data['amount'],
            'from_date'  => $data['fmdate'],
            'to_date'    => $data['todate'],
            'description'=> $data['description'],
            'attachment' => $data['attachment'] ?? null,
        ];

        return $this->modelClaim->create($insertClaim);
    }
}
