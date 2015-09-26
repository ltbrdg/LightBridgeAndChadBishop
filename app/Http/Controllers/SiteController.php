<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View, Input, Validator, Mail, App;

abstract class SiteController extends Controller{

	protected $view_prefix;

	public function __construct(){
		$this->view_prefix = $this->view_prefix();
		View::share('VIEW_PREFIX', $this->view_prefix);
	}

	abstract protected function view_prefix();

	protected function renderThumb($key, $page){
		return view('partial.thumbnail')
			->with('content', view("pages.$page"))
			->with('key', $key)
			->with('slug', $page)
			->render();
	}

	public function getContact(){
		return view('contact');
	}

	public function postContact(){
		$data = Input::all();
		
		$rules = array(
			'organization' => 'required',
			'firstName' => 'required',
			'lastName' => 'required',
			'website' => 'required|url',
			'email' => 'required|email',
			'projectLength' => 'required',
			'projectBudget' => 'required',
			'description' => '',
			'servicesGroup' => ''
		);
		   
		$validator = Validator::make($data, $rules);
		$view_data = [];
		
		if ($validator->fails()){
			$view_data['form_error'] = $validator->messages();
		}else{
			$view_data['from_name'] = $data['from_name'] = $data['firstName'] . ' ' . $data['lastName'];
			
			// Mail::pretend();
			Mail::send('emails.def_contact', $data, function($message) use ($data){
				if(App::environment('local')){
					$message->to('shixish@gmail.com', 'Andrew Wessels');
				}else{
					$message->to('connect@ltbrdg.com', 'Chad Bishop');
				}
				$message->from($data['email'], $data['from_name']);
				$message->subject('chadbishop/ltbrdg contact form from ' . $data['from_name']);
			});

			$view_data['form_success'] = TRUE;
		}
		
		return view('contact')->with($view_data);
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