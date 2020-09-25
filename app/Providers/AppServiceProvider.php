<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProducType;
use App\Product;
use DB;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['catelist'] = ProducType::all();
        view()->share($data);

        // $data1['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
        // view()->share($data1);

        $data['items'] = Cart::content();
        view()->share($data);


        $data['total'] = Cart::total();
        view()->share($data);

        $data['product'] = Product::all();
        view()->share($data);

    }
}
