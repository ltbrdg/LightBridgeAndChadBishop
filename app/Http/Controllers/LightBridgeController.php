<?php

namespace App\Http\Controllers;

class LightBridgeController extends SiteController{
    protected $portfolio_items = [
        'world-cup-cancun-mexico',
    ];

    protected $inspire_items = [
        'world-cup-cancun-mexico',
    ];
    
    protected function view_prefix(){
        return 'lb';
    }

    public function getIndex(){
        $view_obj = view("{$this->view_prefix}.index");

        //This can be cached at some point:
        $portfolio = "";
        foreach ($this->portfolio_items as $key => $page){
            $portfolio .= $this->renderThumb($key, $page);
        }

        $inspire = "";
        foreach ($this->inspire_items as $key => $page){
            $inspire .= $this->renderThumb($key, $page);
        }
        
        return $view_obj->with('portfolio', $portfolio)->with('inspire', $inspire);
    }
}