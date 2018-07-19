<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Articles;
use App\Categores;
use Image;

class ArticlesController extends SiteController
{
    


	 public function __construct()
	 {
        parent::__construct(new \App\Repositories\MenuRepository(new \App\Menu));
        
        //$this->a_rep=$a_rep;
        $this->template = env('THEME').'.articles';
       
    }


    public function index($cat_alias=FALSE)
    {

    	$articles=$this->getArticles($cat_alias);
    	//dd($articles);
    	 $all_cat=Categores::select('*')->get();
    	$articles_content = view(env('THEME').'.articles_list')->with(['articles'=>$articles,'all_cat'=>$all_cat])->render();
		$this->vars=array_add($this->vars,'articles_content',$articles_content);
    	return $this->renderOutput();
    }

    public function getArticles($cat_alias=FALSE)
    {
		
		if($cat_alias){
			//dd($cat_alias);
			$id=Categores::select('id')->where('alias',$cat_alias)->first()->id;
			$articles=Articles::select('*')->where('tag_id',$id)->paginate(3);
            foreach($articles as $a){
                $img=Image::make('shop/images/'.$a->img)->resize(200,200)->save('shop/upload/'.$a->img);
            //dd($img);
            }
			return $articles;
		}

    	$articles=Articles::select('*')->paginate(3);

    	if($articles){
    		$articles->load('category');
    	}
    	foreach($articles as $a){
                $img=Image::make('shop/images/'.$a->img)->resize(350,250)->save('shop/upload/'.$a->img);
            //dd($img);
            }
    	return $articles;
    }

    public function show($alias=FALSE)
    {
    	$all_cat=Categores::select('*')->get();
    	$this->template = env('THEME').'.blog';
		if($alias){
			$blog=Articles::where('alias',$alias)->get();
		}
		foreach($blog as $b){
                $img=Image::make('shop/images/'.$b->img)->resize(400,400)->save('shop/upload/single/'.$b->img);
            //dd($img);
            }
		$blog_content = view(env('THEME').'.blog_show')->with(['blog'=>$blog,'all_cat'=>$all_cat])->render();
		$this->vars=array_add($this->vars,'blog_content',$blog_content);

        return $this->renderOutput();

    }



}
