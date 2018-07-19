<?php 
namespace App\Repositories;

use App\SliderHome;

class SliderHomeRepository extends Repository {
	
	public function __construct(SliderHome $sliderHome) {
		$this->model = $sliderHome;
	}
}

?>