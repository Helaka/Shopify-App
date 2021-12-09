<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    

    public function products(){

        $products =  Products::all();

        foreach($products as $product){
             
            $name = $product->product_name;
            $state = $product->state;
            $recycling_fee = $product->recycling_fee;
        }


        return response()->json([
            'success'=> true,
            'products'=>$products
        ]);
    }
}
