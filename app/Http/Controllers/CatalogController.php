<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ItemsRepository;
use App\Items;
use Image;

class CatalogController extends SiteController
{
    public function __construct(ItemsRepository $i_rep){
        parent::__construct(new \App\Repositories\MenuRepository(new \App\Menu));
        
        $this->i_rep=$i_rep;
        $this->template = env('THEME').'.catalog';

		

    }

	public function index ($sex=null,$brd=null)
	{
		
		
		$catalog = $this->getCatalog($sex,$brd);
		$content = view(env('THEME').'.catalog_items')->with('catalog',$catalog)->render();
		$this->vars=array_add($this->vars,'content',$content);

        return $this->renderOutput();
    		
	}

	public function getCatalog($sex,$brd) {
		$sex=strtolower($sex);
		$brd=strtolower($brd);
		
		if($brd != 'all'){
			$catalog=Items::select('*')->where('sex',$sex)->where('tag',$brd)->paginate(6);
		}
		else{
			$catalog=Items::select('*')->where('sex',$sex)->paginate(6);
		}
		foreach($catalog as $cat){
			$img=Image::make('shop/images/'.$cat->img)->resize(125,200)->save('shop/upload/'.$cat->img);
			//dd($img);
		}
		return $catalog;
	}

	public function show($sex=null, $brd=null, $id=false){
		//dd($id);
		$this->template = env('THEME').'.item';
		if($id){
			$item=Items::where('id',$id)->get();
			foreach ($item as $it) {
				$img=Image::make('shop/images/'.$it->img)->resize(100,150)->save('shop/upload/single/'.$it->img);
			}	
		}
		//dd($item);
		$item_content = view(env('THEME').'.item_show')->with('item',$item)->render();
		$this->vars=array_add($this->vars,'item_content',$item_content);

        return $this->renderOutput();
		
	}

}
