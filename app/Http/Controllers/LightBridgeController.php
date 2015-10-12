<?php

namespace App\Http\Controllers;

class LightBridgeController extends SiteController{
    protected $portfolio_items = [
        "who-s-next-ui-redesign",
        "our-stories-the-fabric-of-the-home-depot",
        "the-orange-experience",
        "home-depot-career-site-redesign",
        "paris-landscape",
        "home-depot-store-management",
        "home-services",
        "home-services-microsite",
        "technology-microsite",
        "technology-video",
        "welcome-card",
        "who-s-next-video",
        "diversity-inclusion-microsite",
        "world-cup-cancun-mexico",
        "orange-magazine-fall-cover",
        "walking-on-the-beach",
        "sunset-at-the-beach",
        "waipio-valley",
        "jazz-poster",
        "running-on-the-beach",
        "corporate-microsite",
        "home-depot-military-campaign",
        "customer-service-at-the-home-depot",
        "helping-in-the-home-depot-garden",
        "light-bridge-promo-illustration",
        "jean-home-depot-associate",
        "make-belief-branding",
        "orange-experience",
        "kids-workshop-rebrand",
        "puerto-rico-time-lapse",
        "who-s-next-university-branding",
    ];

    protected $inspire_items = [
        "armageddon",
        "canvas",
        "give-video",
        "mix",
        "waipio",
        "moonshine",
        "we-run",
        "you-talking-to-me",
        "moment-vice",
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