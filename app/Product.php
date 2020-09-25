<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $table = "vp_products";
        protected $primaryKey = 'prod_id';

        public function product_categories(){
        	return $this-> belongsto('App\ProducType','prod_cate','prod_id');
        }

        public function product_detailImage(){
        	return $this-> hasMany('App\detailImage','product_id','prod_id');
        }

        public function bill_detail() {
        	return $this-> hasMany('App\BillDetail','id_product','prod_id');
        }

    

}
