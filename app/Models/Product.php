<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
protected $guarded=[];
public static $facteur_tva=1.2;
    public function categorie()

    {

        return $this->belongsTo(Categorie::class);

    }
    public function recommendations(){
        return $this->belongsToMany(Product::class,'product_recommendation','product_id','product_recommended_id');
    }
    public function  prixTTC(){
        $prix_ttc=$this->prix * self::$facteur_tva;
        return $prix_ttc;
    }
    public function users(){
        return $this->belongsToMany(User::class,'products_purshased','product_id','user_id')->withPivot('quantity');
    }
}
