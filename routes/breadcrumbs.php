<?php

Breadcrumbs::for ( 'home' , function ( $breadcrumbs ) {
 $breadcrumbs->push( 'Home' , url('/'));
 });

 
 Breadcrumbs::for('brand', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    //dd($category);
    foreach ($category as $ancestor) {
    	$sex=$ancestor->sex;
    }
    if(isset($sex)){
        $breadcrumbs->push($sex, url('catalog/'.$sex.'/all/items'));
    }
    if(isset($ancestor->brand)){
        	$brand=$ancestor->brand;
            //dd($brand);
        	foreach ($category as $ancestor) {
        		if($ancestor->brand !== $brand){
        				$brand = 'all';
        		}
        	}       
    }
    if(isset($brand)){
    	$breadcrumbs->push($brand, url('catalog/'.$sex.'/'.$brand.'/items'));
	}
});

Breadcrumbs::for('item',function($breadcrumbs,$items){
    foreach ($items as $item) {
        $item=$item;
    }
     //dd($item->id);
    $breadcrumbs->parent('brand',$items);

   
    $breadcrumbs->push($item->title,url('catalog/'. $item->sex .'/{brd}/items/'.$item->id."'"));
});


Breadcrumbs :: for ( 'articles' , function ( $breadcrumbs ) {
$breadcrumbs->parent('home');
 $breadcrumbs->push( 'Articles' , url('/articles'));
 });




Breadcrumbs::for('tags',function($breadcrumbs,$articles){
$breadcrumbs->parent('articles');
foreach($articles as $a){
 $tag=$a->category->alias;
}
foreach ($articles as $a) {
   if($a->category->alias !== $tag){
    $tag = 'all';
    }
}
$breadcrumbs->push($tag, url('articles/cat/'.$tag));
});     

Breadcrumbs::for('blog',function($breadcrumbs,$blog){
     foreach ($blog as $bg) {
        $bg=$bg;
    }
    $breadcrumbs->parent('tags',$blog);

     $breadcrumbs->push($bg->title,url('articles/'.$bg->alias."'"));
});
  

    
Breadcrumbs :: for ( 'contact' , function ( $breadcrumbs ) {
$breadcrumbs->parent('home');
 $breadcrumbs->push( 'Contact' , url('/contact'));
 });

?>