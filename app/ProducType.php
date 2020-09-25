<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProducType extends Model
{
    protected $table = 'vp_categories';
    protected $primaryKey = 'cate_id';

    public function product(){
    	return $this-> hasMany('App\Product','prod_cate','cate_id');
    }

    
}
