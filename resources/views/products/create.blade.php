
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

  <a href="/admin/product" class="btn btn-secondary">Go back to Products</a>
    <h1>Create Product</h1>
    <form action="/product/create" method="post" enctype="multipart/form-data">
        @csrf
        
        <img src="/{{old('image')}}" class="update">
        
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Image</label>
    <br>

    <input type="file"   aria-describedby="emailHelp" name="image" value="{{old('image')}}">
    <br>
    @if ($errors->has('image'))
        <strong>{{$errors->first('image')}}</strong>
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Title</label>
    <input type="text" class="form-control"  name="title" aria-describedby="emailHelp" value="{{old('title')}}">
    @if ($errors->has('title'))
        <strong>{{$errors->first('title')}}</strong>
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Description</label>
    <textarea  class="form-control"  name="description" aria-describedby="emailHelp" >{{old('description')}}</textarea>    
    @if ($errors->has('description'))
    <strong>{{$errors->first('description')}}</strong>
@endif  
</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Price</label>
    <input type="number" step=".01" name="price" class="form-control"  aria-describedby="emailHelp" value="{{old('price')}}">
    @if ($errors->has('price'))
        <strong>{{$errors->first('price')}}</strong>
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product category</label>
    <br>
    <select class="form-select" aria-label="Default select example" name="categorie">
      <option selected>Open this select menu</option>
      @foreach ($categories as $key => $categorie)
        @if (old('categorie') == $categorie->id)
      <option value="{{ $categorie->id }}" selected>{{ $categorie->name }}</option>
@else
      <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
@endif
        
     @endforeach
      
     
    </select>
    @if ($errors->has('categorie'))
    <strong>{{$errors->first('categorie')}}</strong>
@endif  
</div>


  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>

    