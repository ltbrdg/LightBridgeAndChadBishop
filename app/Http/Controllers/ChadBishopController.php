<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;

class ChadBishopController extends Controller{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getIndex(){
        // return view('user.profile', ['user' => User::findOrFail($id)]);
        return view('cb.index');
    }

    // public function getHelp(){
    // 	return view('welcome');
    // }
}