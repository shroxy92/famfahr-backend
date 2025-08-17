<?php

namespace App\Http\Controllers;

use App\Contracts\AllClaimRequestServiceContract;
use App\Http\Requests\AdvanceSalaryRequest;
use App\Http\Requests\LoanClaimRequest;
use App\Http\Requests\StoreClaimRequest;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    protected $allclaims;
    public function __construct(AllClaimRequestServiceContract $allclaims)
    {
        $this->allclaims = $allclaims;

    }

    public function index()
    {
        $dataList =  $this->allclaims->allClaimRequestLists();
        return view('layouts.claim.all_requested_lists',$dataList);
    }

    public function loan_claim()
    {
        return view('layouts.claim.loan_apply');
    }

    public function loan_claim_store(LoanClaimRequest $request)
    {
        $claimedData = $this->allclaims->loanClaimRequests($request->validated());
        return redirect()->route('claim.list')->with('success', 'Loan Claim Request has been created.');
    }
    public function advance_salary_apply()
    {
        return view('layouts.claim.advance_salary');
    }

    public function advance_salary_store(AdvanceSalaryRequest $advanceSalaryRequest)
    {
        $receivedValue = $this->allclaims->advanceSalaryClaimRequest($advanceSalaryRequest->validated());
        return redirect()->route('claim.list')->with('success', 'Advance Salary Request has been created.');
    }
    public function claim_request_apply()
    {
        return view('layouts.claim.claim_request_form');
    }
    public function claim_request_store(StoreClaimRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('claims', 'public');
        }
        $this->allclaims->claimRequests($validated);
        return redirect()->route('claim.list')->with('success', 'Claim Request has been created.');

    }
}
