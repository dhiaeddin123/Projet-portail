<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function index()
    {
        $categories=Categorie::all();
        return view('categorie',compact('categories'));
    }
   
    public function create()
    {
        
        $data=request()->validate([
        'title'=>'required',
        'categorie_parent'=>'required'
        ]);
      
        
        
        
            if($data['categorie_parent']!=="Open this select menu")
            {
                Categorie::create([
                    'name'=>$data['title'],
                    'parent_id'=>$data['categorie_parent']
                ]);
            }
            else {
                Categorie::create([
                    'name'=>$data['title'],
                    'parent_id'=>null
                ]);
            }
            
            return redirect('/admin/product');
        
        
      
        
         
        
    }
}
