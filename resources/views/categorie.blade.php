<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/album.css')}}" rel="stylesheet">
  <link href="{{asset('css/tshirt.css')}}" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

  <title>Create categorie</title>
</head>
<body>
    @include('layouts.header')

  <a href="/admin/product" class="btn btn-secondary">Go back to Products</a>
    <h1>Create Product</h1>
    <form action="/admin/product/create_categorie" method="post" enctype="multipart/form-data">
        @csrf
     
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Title</label>
    <input type="text" class="form-control"  name="title" aria-describedby="emailHelp" value="{{old('title')}}">
    @if ($errors->has('title'))
        <strong>{{$errors->first('title')}}</strong>
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Parent</label>
    <br>
  <select class="form-select" aria-label="Default select example" name="categorie_parent">
    <option selected>Open this select menu</option>
    @if (count($categories)>0)
    @foreach ($categories as $categorie)
    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
    @endforeach  
    @endif
   
    
  
  </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>

    