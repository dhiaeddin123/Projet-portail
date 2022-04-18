


    

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Tunisia NET</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/album.css')}}" rel="stylesheet">
    <link href="{{asset('css/tshirt.css')}}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

  @include('layouts.header')

  <main role="main">

    <section class="py-5 text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Commandez  votre <br><span class="badge badge-light">nouveau</span> <br>Produit <span class="badge badge-primary ">préféré </span>!</h1>
            

        </div>
    </section>

    




      <div class="album py-5 bg-light">
        <div class="container">
    
          <div class="row">
            
           
           
           
           
    
            @foreach ($products as $product)
    <div class="col-md-4">
      <div class="card mb-4 box-shadow" >
        <img class="card-img-top" src="{{asset('storage/'.$product->image)}}" >
        <div class="card-body">
          <p class="card-text">{{$product->description}}<br>
            <span class="badge badge-info"><a class="text-white" href="/categorie/{{$product->categorie_id}}">{{$product->categorie->name}}</a></span>
            
          </p>
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

   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    @include('layouts.footer')
  </body>
</html>

