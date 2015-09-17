<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use File;
use Image;

class ImageController extends Controller{
	protected $image_location = '/resources/assets/images';

	protected $sizes = [
		'small' => 200,
		'medium' => 400,
		'large' => 600,
	];

	function handleImage($image_name, $size = 'original'){
		$destination_path = storage_path() . '/images/' . $size . '/' . $image_name;
		$path = base_path() . "/resources/assets/images/" . $image_name;
		if ($size == 'original'){
			//return the original:
			return Image::make($path)->response();
		}else if (File::Exists($destination_path)){
			//returned the cached version:
			return Image::make($destination_path)->response();
		} else if (File::Exists($path)){
			//resize the image, and cache it for the future:
			$width = $this->sizes[$size];
			return Image::make($path)
				->widen($width)
				->save($destination_path)
				->response();
		}else{
			return App::abort(404);
		}
	}

	function getSmall($image_name){
		return $this->handleImage($image_name, 'small');
	}

	function getMedium($image_name){
		return $this->handleImage($image_name, 'medium');
	}

	function getLarge($image_name){
		return $this->handleImage($image_name, 'large');
	}

	function getOriginal($image_name){
		return $this->handleImage($image_name);
	}
}