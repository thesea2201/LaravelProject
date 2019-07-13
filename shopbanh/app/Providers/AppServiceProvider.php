<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use Session;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header', function($view){
            $productTypes = ProductType::all();
            
            $oldCart = Session('cart');
            $cart = new Cart($oldCart);
            $view->with(['productTypes'=>$productTypes,'cart'=>Session::get('cart'),'productCart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
