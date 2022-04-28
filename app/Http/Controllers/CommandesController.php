<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommandesRequest;
use App\Http\Requests\UpdateCommandesRequest;
use App\Models\Commandes;
use App\Models\Produits;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $commandes  = Commandes::all();
        $produits = Produits::all();

        return view('admin.commandes.index',compact('commandes','produits'));

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
     * @param  \App\Http\Requests\StoreCommandesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommandesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commandes  $commandes
     * @return \Illuminate\Http\Response
     */
    public function show(Commandes $commandes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commandes  $commandes
     * @return \Illuminate\Http\Response
     */
    public function edit(Commandes $commandes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommandesRequest  $request
     * @param  \App\Models\Commandes  $commandes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandesRequest $request, Commandes $commandes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commandes  $commandes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commandes $commandes)
    {
        //
    }
}
