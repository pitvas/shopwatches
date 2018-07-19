<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Http\Requests;
use App\Repositories\SliderHomeRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\ItemsRepository;

class IndexController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     
     */
    
    public function __construct(SliderHomeRepository $sh_rep, ArticlesRepository $a_rep, ItemsRepository $i_rep){
        parent::__construct(new \App\Repositories\MenuRepository(new \App\Menu));
        
        $this->sh_rep=$sh_rep;
        $this->a_rep=$a_rep;
        $this->i_rep=$i_rep;
        $this->template = env('THEME').'.index';

    }
    
    
    public function index()
    {

        $sliderImage=$this->getSlider();
        $sliderHome=view(env('THEME').'.sliderHome')->with('sliderHome', $sliderImage)->render();
        $this->vars=array_add($this->vars,'sliderHome',$sliderHome);

        $aboutItems=$this->getAbout();
        $about=view(env('THEME').'.about')->with('about',$aboutItems)->render();
        $this->vars=array_add($this->vars,'about',$about);

        $discountHomeItems=$this->getDiscountHome();
        $discountHome=view(env('THEME').'.discountHome')->with('discountHome', $discountHomeItems)->render();
        $this->vars=array_add($this->vars,'discountHome',$discountHome);


        return $this->renderOutput();
    }

    public function getSlider()
    {
        $sliderHome=$this->sh_rep->get();
        return $sliderHome;
    }

    public function getAbout()
    {
        $about=$this->a_rep->get()->take(3);
        return $about;
    }

    public function getDiscountHome()
    {

        $discountHome=$this->i_rep->get();
        $discountHome=$discountHome->where('discount','50')->take(8);
        return $discountHome;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
