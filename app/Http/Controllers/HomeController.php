<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
 

class HomeController extends Controller
{
    

    public function home(){

        $shop =Auth::user();
        $products = $shop->api()->rest('GET','/admin/api/2021-07/products.json',['limits='=>3]);
        $productss = $products['body']['container']['products'];

        $product_items = Products::all();

        // dd($productss);

        

        return view('welcome',compact('productss','product_items'));
    }


    public function store(Request $request){

        $products= new Products();

        $products->product_name = $request->input('product_name');
        $products->recycling_fee = $request->input('recycling_fee');
        $products->state = $request->input('state');

        $products->save();

        // dd($products);

        return redirect()->back();

    }

    public function delete($id){


        $product = Products::findOrFail($id);

        $product->delete();


        return redirect()->back();

    }
}
