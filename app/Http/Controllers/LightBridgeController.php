<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;

class LightBridgeController extends Controller{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getIndex(){
        // return view('user.profile', ['user' => User::findOrFail($id)]);
        return view('lbs.index');
    }

    public function getContact(){
        return view('welcome');
    }

    public function postContact(){
        return view('welcome');
    }

    public function getPages($page){
       return view('welcome'); 
    }
}