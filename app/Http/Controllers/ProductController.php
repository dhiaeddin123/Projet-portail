<?php

namespace App\Http\Controllers;

use App\DBStorage;
use App\Mail\PurshaseMail;
use App\Models\Categorie;
use App\Models\DatabaseStorageModel;
use App\Models\Product;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\Break_;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products=Product::get();
        return view('admin',compact('products'));
    }
    public function create()
    {
        $categories=Categorie::all();
        return view('products.create',compact('categories'));
    }
    public function store()
    {
        
        $data=request()->validate([
        'title'=>'required',
        'description'=>'required',
        'price'=>'required',
        'image'=>['required','image'],
        'categorie'=>'required'
        ]);
        $imagepath=request('image')->store('uploads','public');
      
        
        
        
            
            Product::create([
                'name'=>$data['title'],
                'description'=>$data['description'],
            'prix'=>$data['price'],
            'image'=>$imagepath,
            'categorie_id'=>$data['categorie']
            ]);
            return redirect('/admin/product');
        
        
      
        
         
        
    }
    public function update($product)
    {
        $product=Product::find($product);
        
        $categories=Categorie::all();
        return view('products.update',compact('product','categories'));
    }
    public function change($product)
    {
       
        $product=Product::find($product);

        
        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'',
            'categorie'=>'required'
            ]);
            
            $imagepath=$product->image;
          
            if(request('image')){
                $imagepath=request('image')->store('uploads','public');
                
            }
           
            
              $product->name=$data['title'];
              $product->description=$data['description'];
              $product->prix=$data['price'];
              $product->image=$imagepath;
              $product->categorie_id=$data['categorie'];
              $product->save();
                return redirect('/admin/product');
    
    }
    public function delete($product)
    {
        $product=Product::find($product);
        $product->delete();
        return redirect()->back();
    }
    public function search()
    {
        $search=request('search');
        $products=Product::query()->where('name', 'LIKE', "%{$search}%")->get();
        return view('admin',compact('products'));
    }
    public function show()
    {
        $products=Product::with('categorie')->get();
        return view('welcome',compact('products'));
    }
    public function product($product)
    {
        $product=Product::find($product);
        return view('shop.product',compact('product'));
    }
    public function viewbycategory($categorie){
       
        $categorie=Categorie::find($categorie);
        $products=$categorie->products();
        
        return view('shop.categorie',compact('products','categorie'));
    }
    public function purshase()
    {
        
        $storage=new DBStorage();
        
        $content = $storage->get(auth()->user()->id);
        $user=User::find(auth()->user()->id);
        $id=null;
       
        foreach ($content as  $product) {
            $nb=$product->quantity;
           foreach ($user->products as  $prod) {
               
               if($product->id==$prod->id){
                  $nb+=$prod->pivot->quantity;
                  
                  $id=$prod->id;
                  $prod->users()->updateExistingPivot($user, array('quantity' => $nb));
                   break;
               }
           }
            if($id!==null){
                break;
            }
            
                $user->products()->attach($product->id, ['quantity'=>$product->quantity]);
            }
            
            
        
        
       
        \Cart::session(auth()->user()->id);
        \Cart::clear();
        $storagemodel=DatabaseStorageModel::find(auth()->user()->id);
        $storagemodel->delete();
        
        
        Mail::to("dhiaeddine993@gmail.com" )->send(new PurshaseMail());
        return view('cart.command',compact('content'));
        
    }
    
}
