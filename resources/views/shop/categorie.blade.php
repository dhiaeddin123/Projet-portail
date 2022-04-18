@extends('shop')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if ($categorie->parent_id!==null)
        <li class="breadcrumb-item active" aria-current="page"><a href="/categorie/{{$categorie->parent->id}}">{{$categorie->parent->name}}</a></li> 
        @endif
        
        <li class="breadcrumb-item active" aria-current="page">{{$categorie->name}}</li>
        @foreach ($categorie->childrens as $children)
        <li class="breadcrumb-item"><a href="/categorie/{{$children->id}}">{{$children->name}}</a></li>
        @endforeach
   
    </ol>
</nav>
<main role="main">


    <div class="py-3">
        <div class="container-fluid">
            <div class="row">

                       
             
                @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img src="{{asset('storage/'.$product->image)}}" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <p class="card-text">{{$product->name}} <br>{{$product->description}} </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">{{number_format($product->prixTTC(),2)}} €</span>
                                <a href="/product/{{$product->id}}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
             



            </div>

            
        </div>
    </div>

</main>
@endsection