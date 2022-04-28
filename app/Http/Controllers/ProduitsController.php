<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduitsRequest;
use App\Http\Requests\UpdateProduitsRequest;
use App\Models\Categories;
use App\Models\Produits;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProduitsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        //
        $produits = Produits::all();
        return view('admin.produits.index',compact('produits'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $produit = new Produits();

        $categories = Categories::all();


        return view('admin.produits.create',compact('produit','categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduitsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        try {

            //dd($request->all());
            $produit = Produits::create($request->all());

        Session::flash('success', 'Produits enregister avec succes');
        return redirect()->route('produit.index');
        } catch (\Throwable $th) {
            //throw $th;

            Log::info($th->getMessage());

        Session::flash('success', 'error');

        return redirect()->route('produit.index');


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function show(Produits $produits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function edit(Produits $produits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduitsRequest  $request
     * @param  \App\Models\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduitsRequest $request, Produits $produits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produits $produits)
    {
        //
    }
}
