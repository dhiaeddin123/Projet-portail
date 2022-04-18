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
  <script src="{{ asset('js/app.js') }}" defer></script>
  <title>Products Management</title>
</head>
<body>
  @include('layouts.header')
  <h1>Products_CRUD</h1>
    <p>
        <a href="/product/create" class="btn btn-success">Create Product</a>
    </p>
    <p>
      <a href="/admin/product/create_categorie" class="btn btn-success " >Create Category</a>
  </p>
  <div class="ml-10">
    <a href="{{route('create_promotion')}}" class="btn btn-success " >Create Promotion</a>
  </div>
 <form action="/product/search" method="get">
 <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="search for products" name="search" value="">
  <button class="btn btn-outline-secondary" type="submit" >Search</button>
</div>
 </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Create_Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php
 
        foreach ($products as $key=> $product){
            # code...
            ?>
      <th scope="row"><?=$key+1?></th>
      <td>
        <img style="width:100px; height:100px;" src="{{asset('storage/'.$product->image)}}"class="thumb-img">
      </td>
      <td>{{$product->name}}</td>
      <td>{{$product->prix}}</td>
      <td>{{$product->created_at}}</td>
      <td>
      <a href="/product/update/{{$product->id}}"type="button" class="btn btn-outline-primary">Edit</a>
      <form action="delete" method="POST"style="display:inline-block">
        <input type="hidden" name="id"value="">
        <a href="/product/delete/{{$product->id}}" type="button" class="btn btn-outline-danger">Delete</a>
        </form>
    </td>
    </tr>
    <?php }?>
    
  </tbody>
</table>
</body>
</html>
    
