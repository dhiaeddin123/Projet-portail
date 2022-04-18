<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function productsParent()

    {

        return $this->hasMany(Product::class);

    }
    public function parent()
    {
        return $this->belongsTo(Categorie::class,'parent_id');
    }
    public function childrens(){
        return $this->hasMany(Categorie::class,'parent_id');
    }
    public function productsChild(){
        return $this->hasManyThrough(Product::class,Categorie::class,'parent_id','categorie_id');
    }
    public function products(){
        
        $products=$this->productsParent()->get()->merge($this->productsChild()->get());
        return $products;
    }
}
