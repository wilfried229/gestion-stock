<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Radio;
use App\Models\RadioPromoteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{




    /**
     * LISTE DES ABIONNES.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listAbonnes() {
        //
        $users = User::query()->where('role','=',env('ROLE_ABONNE','ABONNE'))->orderBy('nom')->get();
        return view('admin.users.list-abonne',compact('users'));
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        //

        dd('ddd');
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user  = new User();
        return view('admin.users.create',compact('user'));
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
        Validator::make($request->all(), User::$rules, User::$messageValidator)->validate();
        if(!isset($request->password) || !isset($request->password_confirm)) {
            Session::flash('error', "Veuillez renseigner le mot de passe");
            return redirect()->back()->withInput($request->all());
        }
        if($request->password != $request->password_confirm){
             Session::flash('error', "Mots de passe non identiques");
            return redirect()->back()->withInput($request->all());
        }

     $user = User::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'role'=>$request->role,
        ]);


       Session::flash('success', "Nouvel utilisateur ajouté avec succès");

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $radioUser = Radio::where('users_id',$user->id)->first();

        //dd($radioUser);
        return view('admin.users.update',compact('user','radioUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $user = User::find($id);
        $rules = User::$rules;
        $rules['email'] = $rules['email'] . ',id,' . $id;
        Validator::make($request->all(), User::$rules, User::$messageValidator)->validate();
        if($request->password != null || trim($request->password) != ""){
        $user->password = Hash::make($request->password);
        $user->save();
        }
       $user->update([
           'nom'=>$request->nom,
           'prenom'=>$request->prenom,
           'sexe'=>$request->sexe,
           'telephone'=>$request->telephone,
           'email'=>$request->email,
           'role'=>$request->role,
       ]);


      Session::flash('success', "Modification effectuée avec succès");

       return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        Session::flash('error', "Suppression effectuée avec succès");
        return redirect()->route('users.index');
    }
}
