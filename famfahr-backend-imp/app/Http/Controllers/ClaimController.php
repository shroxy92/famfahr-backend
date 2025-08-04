<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvanceSalaryRequest;
use App\Services\AllClaimRequestService;
use App\Http\Requests\allclaimsRequest;
use App\Models\allclaims;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    protected $allclaims;
    public function __construct(\App\Services\AllClaimRequestService $allclaims)
    {
        $this->allclaims = $allclaims;

    }

    public function index()
    {
        $dataList =  $this->allclaims->allClaimRequestLists();
        return view('layouts.claim.all_requested_lists',compact('dataList'));
    }

    public function loan_claim()
    {
        return view('layouts.claim.loan_apply');
    }

    public function loan_claim_store(allclaimsRequest $request)
    {
        $claimedData = $this->allclaims->allclaimsRequests($request->validated());
        return redirect()->route('claim.list')->with('success', 'Loan Claim Request has been created.');
    }
    public function advance_salary_apply()
    {
        return view('layouts.claim.advance_salary');
    }

    public function advance_salary_submit(AdvanceSalaryRequest $advanceSalaryRequest)
    {
        $receivedValue = $this->allclaims->advanceSalaryClaimRequest($advanceSalaryRequest->validated());
        return redirect()->route('claim.list')->with('success', 'Advance Salary Request has been created.');
    }
    public function claimStore(StoreClaimRequest $request)
    {
        $data = $request->validated();

        // Save file
        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('claims', 'public');
        }

        // Save claim
        Claim::create([
            'user_id'    => auth()->id(),
            'category'   => $data['category'],
            'amount'     => $data['amount'],
            'from_date'  => $data['date'][0],
            'to_date'    => $data['date'][1],
            'description'=> $data['description'],
            'attachment' => $data['attachment'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Claim submitted successfully.');
    }
}
