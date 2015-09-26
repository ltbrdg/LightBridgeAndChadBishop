<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;
use View;

class LightBridgeController extends SiteController{
    
    protected function view_prefix(){
        return 'lb';
    }

    public function getIndex(){
        $view_obj = view("{$this->view_prefix}.index");
        // return view('user.profile', ['user' => User::findOrFail($id)]);
        return $view_obj;
    }
}