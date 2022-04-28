<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.show',compact('user'));
        //
    }


    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        //
        $user = Auth::user();
        return view('admin.profile.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request) {
        $user = Auth::user();
        $checkExistingUserEmail = User::query()
            ->where("id", "!=", $user->id)
            ->where("email", "=", $request->email)
            ->exists();
        if($checkExistingUserEmail == true) {
            Session::flash("error", "Cette adresse email est déjà utilisée");
            return redirect()->back();
        }
        Validator::make($request->all(), User::$updateRules, User::$messageValidator)->validate();
        if($request->password != null || trim($request->password) != ""){
            if(!Hash::check($request->old_password, $user->password)) {
                Session::flash("error", "Ancien de passe incorrect");
                return redirect()->back();
            }
            if(!isset($request->password) || !isset($request->password_confirm)) {
                Session::flash('error', "Veuillez renseigner le mot de passe");
                return redirect()->back()->withInput($request->all());
            }
            if($request->password != $request->password_confirm){
                Session::flash('error', "Mots de passe non identiques");
                return redirect()->back()->withInput($request->all());
            }
            $user->password = Hash::make($request->password);
            $user->save();
        }
       $user->update([
           'nom'=>$request->nom,
           'prenom'=>$request->prenom,
           'sexe'=>$request->sexe,
           'telephone'=>$request->telephone,
           'email'=>$request->email,
       ]);
      Session::flash('success', "Modification effectuée avec succès");
      return redirect()->route("profile.index");
    }
}
