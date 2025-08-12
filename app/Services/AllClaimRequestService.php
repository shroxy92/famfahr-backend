<?php

namespace App\Services;


use App\Contracts\AllClaimRequestRepositoryContract;
use App\Contracts\AllClaimRequestServiceContract;
use App\Models\AdvanceSalary;
use App\Models\Claim;
use App\Models\LoanClaim;
use App\Repositories\AllClaimRequestRepository;

class AllClaimRequestService implements AllClaimRequestServiceContract
{
    protected $claimsRepository;

    public function __construct(AllClaimRequestRepositoryContract $claimsRepository)
    {
        $this->claimsRepository = $claimsRepository;
    }
    public function loanClaimRequests(array $data): LoanClaim
    {
         return $this->claimsRepository->loanClaimRequests($data);
    }

    public function allClaimRequestLists(): array
    {
        // TODO: Implement allClaimRequestLists() method.
        return $this->claimsRepository->allClaimRequestLists();
    }

    public function advanceSalaryClaimRequest(array $data): AdvanceSalary
    {
        // TODO: Implement advanceSalaryClaimRequest() method.
        $mapData = [
                'salary' =>$data['amount'],
                'reason' =>$data['reason'],
                'date' =>$data['needed_by'],
            ];
        return $this->claimsRepository->advanceSalaryClaimRequest($mapData);

    }

    public function advanceSalaryClaimRequestLists(): array
    {
        // TODO: Implement advanceSalaryClaimRequestLists() method.
    }

    public function claimRequests(array $data): Claim
    {
        return $this->claimsRepository->claimRequests($data);
    }
}
