<?php

namespace App\Http\Controllers;

use App\Models\TermsPolicy;
use Illuminate\Http\Request;

class TermsPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms_of_service()
    {
        return view('frontend.terms_policy.terms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy_policy()
    {
        return view('frontend.terms_policy.policy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermsPolicy  $termsPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(TermsPolicy $termsPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermsPolicy  $termsPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(TermsPolicy $termsPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermsPolicy  $termsPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermsPolicy $termsPolicy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermsPolicy  $termsPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermsPolicy $termsPolicy)
    {
        //
    }
}
