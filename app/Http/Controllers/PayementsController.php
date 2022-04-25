<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePayementsRequest;
use App\Http\Requests\UpdatePayementsRequest;
use App\Models\Payements;

class PayementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $payements = Payements::all();
        return view('admin.payements.index',compact('payements'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePayementsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayementsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payements  $payements
     * @return \Illuminate\Http\Response
     */
    public function show(Payements $payements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payements  $payements
     * @return \Illuminate\Http\Response
     */
    public function edit(Payements $payements)
    {
        //

        return view('admin.payements.edit',compact('payements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayementsRequest  $request
     * @param  \App\Models\Payements  $payements
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayementsRequest $request, Payements $payements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payements  $payements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payements $payements)
    {
        //
    }
}
