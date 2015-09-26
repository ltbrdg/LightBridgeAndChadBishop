<?php

namespace App\Http\Controllers;

class ChadBishopController extends SiteController{
	protected $creative_items = [
		'world-cup-cancun-mexico'
	];

	protected $photography_items = [
		'world-cup-cancun-mexico'
	];

	protected function view_prefix(){
		return 'cb';
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
}