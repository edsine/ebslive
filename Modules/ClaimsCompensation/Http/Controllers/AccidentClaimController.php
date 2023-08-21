<?php

namespace Modules\ClaimsCompensation\Http\Controllers;

use Modules\ClaimsCompensation\Http\Requests\StoreAccidentClaimRequest;
use Modules\ClaimsCompensation\Http\Requests\UpdateAccidentClaimRequest;
use Modules\ClaimsCompensation\Models\AccidentClaim;
use Modules\EmployerManager\Models\Employer;
use App\Http\Controllers\AppBaseController;

class AccidentClaimController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $claims = AccidentClaim::with('employee')->get(); //auth()->user()->accident_claims;
        return view('claimscompensation::accident_claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /* public function create()
    {
        $employees = auth()->user()->employees;
        return view('claimscompensation::accident_claims.create', compact('employees'));
    } */

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(StoreAccidentClaimRequest $request)
    {
        $validated = $request->validated();
        $validated['document'] = request()->file('document')->store('claims_documents', 'public');

        auth()->user()->accident_claims()->create($validated);

        return redirect()->route('accident.index')->with('success', 'Accident claim created successfully!');
    } */

    /**
     * Display the specified resource.
     */
    public function show(AccidentClaim $accidentClaim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccidentClaim $accidentClaim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /* public function update(UpdateAccidentClaimRequest $request, AccidentClaim $accidentClaim)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccidentClaim $accidentClaim)
    {
        //
    }
}
