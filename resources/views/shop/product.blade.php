@extends('shop')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Accueil</a></li>
        @if ($product->categorie->parent !==null)
        <li class="breadcrumb-item"><a href="/categorie/{{$product->categorie->parent->id}}">{{$product->categorie->parent->name}}</a></li> 
        @endif
        
        <li class="breadcrumb-item active" aria-current="page"><a href="/categorie/{{$product->categorie->id}}">{{$product->categorie->name}}</a></li>
    </ol>
</nav>
<div class="container">

   
    <div class="row justify-content-between">
        
        <div class="col-6">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{asset('storage/'.$product->image)}}" alt="Card image cap">

            </div>
        </div>
        <div class="col-6">

            <h1 class="jumbotron-heading">{{$product->name}}</h1>
            <h5>{{number_format($product->prixTTC(),2)}} €</h5>
            <p class="lead text-muted">{{$product->description}}</p>
            <hr>
            <form action="{{route('addtocart',['id' => $product->id])}}" id="panier_add" method="POST">
            @csrf
            
       
            <label for="qty">Quantité</label>
            <input class="form-control" type="number" name="qty" value="1" id="qty">
        </form>
        <button type="submit" form="panier_add" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i> Ajouter au Panier</button>
            

        </div>
    </div>
</div>

@endsection