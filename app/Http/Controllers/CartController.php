<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\DBStorage;
use Illuminate\Contracts\Session\Session;

class CartController extends Controller
{
    //Ajouter un produit au panier
    public function add($id){
        $product=Product::find($id);
        if(auth()->user()!==null){
            $userid=auth()->user()->id;
            \Cart::session($userid);
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->prix,
                'quantity' =>request('qty'),
                'attributes' => array(
                    'photo'=>$product->image,
                    'prix_ttc'=>(double)$product->prixTTC()
                ),
                
            ));
         
        $content = \Cart::getContent();
        $storage=new DBStorage();
        $storage->put($userid,$content);
            return redirect(route('cart_index'));
        }
        else {
            return redirect('/login');
        }
       
    }
    public function index(Request $request){
        $userid=auth()->user()->id;
        
        \Cart::session($userid);
        $storage=new DBStorage();
        
        $content = $storage->get($userid);
        
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 20%',
            'type' => 'tax',
            'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '20%',
            
        ));
        
        $total_ht_panier=0;
        $total_ttc=0;
        $tva=$total_ttc- $total_ht_panier;
        return view('cart.panier',compact('content','total_ttc','total_ht_panier','tva'));
    }
}
