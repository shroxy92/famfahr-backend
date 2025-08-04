<?php

namespace App\Services;


use App\Contracts\AllClaimRequestServiceContract;
use App\Models\AdvanceSalary;
use App\Models\LoanClaim;
use App\Repositories\AllClaimRequestRepository;

class AllClaimRequestService implements AllClaimRequestServiceContract
{
    protected $loanClaimrepository;

    public function __construct(AllClaimRequestRepository $loanClaimRepository)
    {
        $this->loanClaimrepository = $loanClaimRepository;
    }
    public function loanClaimRequests(array $data): LoanClaim
    {
         return $this->loanClaimrepository->loanClaimRequests($data);
    }

    public function allClaimRequestLists(): array
    {
        // TODO: Implement allClaimRequestLists() method.
        return $this->loanClaimrepository->allClaimRequestLists();
    }

    public function advanceSalaryClaimRequest(array $data): AdvanceSalary
    {
        // TODO: Implement advanceSalaryClaimRequest() method.
        $mapData = [
                'salary' =>$data['amount'],
                'reason' =>$data['reason'],
                'date' =>$data['needed_by'],
            ];
        return $this->loanClaimrepository->advanceSalaryClaimRequest($mapData);

    }

    public function advanceSalaryClaimRequestLists(): array
    {
        // TODO: Implement advanceSalaryClaimRequestLists() method.
    }
}
