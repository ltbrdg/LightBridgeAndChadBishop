<?php

namespace App\Http\Controllers;

class ChadBishopController extends SiteController{
	protected $creative_items = [
		"who-s-next-ui-redesign",
		"our-stories-the-fabric-of-the-home-depot",
		"home-services-microsite",
		"home-services",
		"technology-microsite",
		"technology-video",
		"welcome-card",
		"who-s-next-video",
		"diversity-inclusion-microsite",
		"light-bridge-site-redesign",
		"who-s-next-event-display",
		"home-depot-military-campaign",
		"puerto-rico-time-lapse",
		"world-cup-cancun-mexico",
		"jazz-poster",
		"corporate-microsite",
		"customer-service-at-the-home-depot",
		"light-bridge-promo-illustration",
		"make-belief-branding",
		"kids-workshop-rebrand",
		"who-s-next-university-branding",
		"the-orange-experience",
		"home-depot-career-site-redesign",
	];

	protected $photography_items = [
		"the-road-less-travelled",
		"letterpress-blocks",
		"mexico-cenote",
		"waipio-valley",
		"walking-on-the-beach",
		"running-on-the-beach",
		"mountain-top-view",
		"walking-in-a-winter-wonderland",
		"super-a",
		"lifeguard-station-at-sunset",
		"home-depot-military-campaign",
		"helping-in-the-home-depot-garden",
		"the-night-before-christmas",
		"georgia-aquarium",
		"orange-magazine-fall-cover",
		"dia-de-los-muertos",
		"sunset-at-the-beach",
		"jean-home-depot-associate",
		"renee-s-headshot",
		"2014-las-vegas-orange-magazine-home-depot-cover",
		"paris-landscape",
		"vista-family",
		"home-depot-store-management",
		"contemplative",
		"playing-under-the-pier",
		"surfer-silhouette",
		"hawaii-oasis",
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