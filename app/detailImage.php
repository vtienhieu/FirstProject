<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailImage extends Model
{
	protected $table = "vp_detailimage";
	

	public function detailImage_product(){
		return $this-> belongsto('App\Product','product_id','id');

	}

}
