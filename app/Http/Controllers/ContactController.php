<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class ContactController extends SiteController
{
    //
     public function __construct(){
        parent::__construct(new \App\Repositories\MenuRepository(new \App\Menu));
        
        $this->template = env('THEME').'.contact';

    }

	public function index ()
	{
		$contacts=Contacts::select('*')->get();
		
		$contact_content = view(env('THEME').'.contact_show')->with('contacts',$contacts)->render();
		$this->vars=array_add($this->vars,'contact_content',$contact_content);

        return $this->renderOutput();
    		
	}
}
