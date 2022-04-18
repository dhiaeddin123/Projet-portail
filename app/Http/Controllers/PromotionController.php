<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
public function index()
{
    return view('products.promotion');
}
public function start_promotion()
{
    
    $products=Product::all();
    foreach ($products as  $product) {
        $product->prix=$product->prix-($product->prix*(intval(request('promotion'))/100));
        $product->save();
    }
    return redirect('/admin/product');
}
}
