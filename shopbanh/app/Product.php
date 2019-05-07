<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function product_type(){
    	return $this->belongsTo(App\ProductType, 'id_type', 'id');
    }

    public function bill_detail(){
    	return $this->hasMany(App\BillDetail, 'id_product', 'id');
    }

    // public function getAllProduct(){
    // 	return Product::all();
    // }

    public function getNewProduct(){
    	return Product::where('new',1);
    }

    public function getAllProduct(){
    	return Product::all();
    }

    public function getSaleProduct(){
    	return Product::where('promotion_price', '<>', 0);
    }
}