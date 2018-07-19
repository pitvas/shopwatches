<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallbackController extends SiteController
{
    //
    public function __construct()
	 {
        parent::__construct(new \App\Repositories\MenuRepository(new \App\Menu));
        
        $this->template = env('THEME').'.callback';
       
    }


    public function index()
    {

    	
    	$callback = view(env('THEME').'.contact_callback')->render();
		$this->vars=array_add($this->vars,'callback',$callback);
    	return $this->renderOutput();
    }
}
