<?php 
namespace App\Repositories;

use App\Items;

class ItemsRepository extends Repository {
	
	public function __construct(Items $discountHome) {
		$this->model = $discountHome;
	}
}

?>