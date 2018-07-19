<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use App\Items;
use App\Articles;
use App\Categores;

class FilterController extends SiteController
{

	public function __construct(){
        parent::__construct(new \App\Repositories\MenuRepository(new \App\Menu));
        $this->template = env('THEME').'.catalog';
    }

	public function filter(Request $request)
	{
		$url = $request->url();
		$sex = $request->input('sex');
		$brand=$request->input('brand');
		$price=$request->input('price');
		$disc=$request->input('discount');
		$tags=$request->input('tags');

		if(isset($tags)){
			//dd($tags);
			$this->template = env('THEME').'.articles';
			$filter=$this->filterForTag($tags);
			
			$all_cat=Categores::select('*')->get();
			$articles_content = view(env('THEME').'.articles_list')->with(['articles'=>$filter,'all_cat'=>$all_cat])->render();
			//dd($articles_content);
			$this->vars=array_add($this->vars,'articles_content',$articles_content);
    		return $this->renderOutput();



		}
		else if(isset($sex) || isset($brand) || isset($price) || isset($disc)){
			$filter=Items::select('*');
			if(isset($sex)){
				if(count($sex)>0){
				$filter=$filter->whereIn('sex',$sex);
				//dd($filter);
				}
			}

			if(isset($brand)){
				if(count($brand)>0){
					$filter=$filter->whereIn('brand',$brand);
					//dd($filter);
				}
			}
			 if(isset($price)){
			 	$price=(int)$price;
			 	$filter=$filter->orderBy('price','DESC')->where('price','<=', $price);
			 	//dd($filter);
			 }

			 if(isset($disc)){
			 	$disc=(int)$disc;
			 	$filter=$filter->where('discount','<=', $disc);
			 	//dd($filter);
			 }

			 if(isset($sex) || isset($brand) || isset($price) || isset($disc)){
			 	$filter=$filter->paginate(6);
			 	//dd($filter)
			 }

			$content = view(env('THEME').'.catalog_items')->with('catalog',$filter)->render();
			$this->vars=array_add($this->vars,'content',$content);

	        return $this->renderOutput();
	    }
	    else{

	    }
	}


	public function filterForTag($tags)
	{
 		if(count($tags)>0){
			$filter=Articles::select('*')->whereIn('tag_id',$tags)->paginate(3);
			//dd($filter);

			return $filter;
		}

	}


}
