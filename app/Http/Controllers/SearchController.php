<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Items;
use App\Articles;
use App\Categores;

class SearchController extends SiteController
{


	public function __construct(){
        parent::__construct(new \App\Repositories\MenuRepository(new \App\Menu));
        $this->template = env('THEME').'.catalog';


    }



    
	public function search(Request $request)
	{
		$url=$request->url();
		//dd($url);
		$srh=$request->input('search');
		if(isset($srh) && $srh!='Search'){
				$search=Items::where('title', 'LIKE', '%'.$srh.'%')->orWhere('brand','LIKE','%'.$srh.'%')->paginate(6);
				if($search->total() == 0){
					$search=Articles::where('title','LIKE','%'.$srh.'%')->paginate(3);
					 $this->template = env('THEME').'.articles';
					$all_cat=Categores::select('*')->get();
    				$articles_content = view(env('THEME').'.articles_list')->with(['articles'=>$search,'all_cat'=>$all_cat])->render();
					$this->vars=array_add($this->vars,'articles_content',$articles_content);
    				return $this->renderOutput();
				}else{
					$content = view(env('THEME').'.catalog_items')->with('catalog',$search)->render();
					$this->vars=array_add($this->vars,'content',$content);
			    	return $this->renderOutput();
			    }
			}
			else if(true){
				//
			}

		

	}

	//public function store(){}


}
