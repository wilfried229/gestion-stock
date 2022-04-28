<?php

/**
 * Récupérer le nom de la route active
 */

use App\Models\Radio;
use App\Models\RadioCentreInteret;
use App\Models\User;

if(!function_exists('getCurrentRouteName')){
    function getCurrentRouteName(){
        return \Illuminate\Support\Facades\Route::currentRouteName();
    }
}

/**
 * Vérifier si une route est active
 */
if(!function_exists('isRouteActivated')){
    function isRouteActivated($theActivatedRoute){
        return getCurrentRouteName() == $theActivatedRoute;
    }
}

/**
 * Vérifier si la route active fais partir de []
 */
if(!function_exists('isRouteActivatedIn')){
    function isRouteActivatedIn(array $routesNames){
        if(!is_array($routesNames)) {
            return false;
        }
        return in_array(getCurrentRouteName(), $routesNames);
    }
}


/**
 * Get users admin
 */
if(!function_exists('getUsersAdmin')){
    function getUsersAdmin(){
        return User::query()->where("role", "=", env('ROLE_ADMIN'))->get();
    }
}

/**
 * Get users sexes
 */
if(!function_exists('getUsersSexes')){
    function getUsersSexes(){
        return [
            "MASCULIN" => "Masculin",
            "FEMININ" => "Féminin",
            "AUTRE" => "Autre"
        ];
    }
}

/**
 * Get type centre interet
 */
if(!function_exists('getTypeCentreInteret')){
    function getTypeCentreInteret(){
        return [
            "GENRE" => "Genre",
            "THEME" => "Thème",
        ];
    }
}

/**
 * Display jours de la semaine
 */
if(!function_exists('getJoursSemaine')){
    function getJoursSemaine(){
        return [
            "LUNDI" => "Lundi",
            "MARDI" => "Mardi",
            "JEUDI" => "Jeudi",
            "VENDREDI" => "Vendredi",
            "SAMEDI" => "Samedi",
            "DIMANCHE" => "Dimanche",
            "TOUT" => "Tous les jours"
        ];
    }
}



/**
 * Get users roles
 */
if(!function_exists('displayUserRole')){
    function displayUserRole($role) : string{
        if($role == env('ROLE_USER')) return "Utilisateur";
        if($role == env('ROLE_ADMIN')) return "Administrateur";
        if($role == env('ROLE_ABONNE')) return "Abonné";
        if($role == env('ROLE_PROMOTEUR')) return "Promoteur";

        return "";
    }
}

/**
 * Get users roles
 */
if(!function_exists('getUsersRoles')){
    function getUsersRoles(){
        return [
            env('ROLE_ADMIN') => "Administrateur",
            env('ROLE_USER') => "Utilisateur",
            env('ROLE_ABONNE') => "Abonné",
            env('ROLE_PROMOTEUR') => "Promoteur",

        ];
    }
}


if(!function_exists('getRadios')){
   function getRadios(){
       return Radio::get()
       ;
   }
}

/**
 *
 */
if(!function_exists('radioHasCentre')){
    function radioHasCentre($radio, $centreId): bool{
        return RadioCentreInteret::query()
            ->where('radio_id', '=', $radio->id)
            ->where('centre_interet_id', '=', $centreId)
            ->exists();
    }
}

/**
 * Convert dif date to milli seconds
 */
if(!function_exists('convertDiffDateToMilliSeconds')){
    function convertDiffDateToMilliSeconds($diff): int{
        $seconde = 1000;
        $minute = 60 * $seconde;
        $heure = 60 * $minute;
        $jour = 24 * $heure;
        $somme = 0;
        if($diff == null ) return $somme;
        if($diff->y > 0) {
            $somme += $diff->y * (355) * $jour;
        }
        if($diff->m > 0) {
            $somme += $diff->m * (30) * $jour;
        }
        if($diff->d > 0) {
            $somme += $diff->d * $jour;
        }
        if($diff->h > 0) {
            $somme += $diff->h * $heure;
        }
        if($diff->i > 0) {
            $somme += $diff->i * $minute;
        }
        if($diff->s > 0) {
            $somme += $diff->s * $seconde;
        }
        // return value
        return $somme;
    }
}
