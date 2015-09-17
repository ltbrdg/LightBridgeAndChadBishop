<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;

class ChadBishopController extends Controller{
    protected $view_prefix = 'cb';

    protected $creative_items = [
        'world-cup-cancun-mexico'
    ];

    protected $photography_items = [
        'world-cup-cancun-mexico'
    ];

    protected function renderThumb($key, $page){
        return view('partial.thumbnail')
            ->with('content', view("pages.$page"))
            ->with('key', $key)
            ->with('slug', $page)
            ->render();
    }

    public function getIndex(){
        $view_obj = view("{$this->view_prefix}.index");

        //This can be cached at some point:
        $creative = "";
        foreach ($this->creative_items as $key => $page){
            $creative .= $this->renderThumb($key, $page);
        }

        $photography = "";
        foreach ($this->photography_items as $key => $page){
            $photography .= $this->renderThumb($key, $page);
        }

        return $view_obj->with('creative', $creative)->with('photography', $photography);
    }

    public function getContact(){
        return view('welcome');
    }

    public function postContact(){
        return view('welcome');
    }

    public function getPages($page){
        $view = "pages.$page";
        // $layout = $template ? $template : $this->layout;
        $data = array();
        if (view()->exists($view)){
            return view("{$this->view_prefix}.page")->with('content', view($view));
        }else{
            return App::abort(404);
        }
    }

    public function getQuickPages($page){
        $view = "pages.$page";
        if (view()->exists($view)){
            return view('quick_page')->with('content', view($view));
        }else{
            return App::abort(404);
        }
    }
}