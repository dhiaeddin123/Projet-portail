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
  <title>Products Promotion</title>
</head>
<body>
  @include('layouts.header')
  <form action="{{route('promotion_started')}}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Promotion Percent</label>
    <br>
  <select class="form-select" aria-label="Default select example" name="promotion">
    <option selected>Open this select menu</option>
    
    @for ($i = 1; $i <= 50; $i++)
    <option value="{{$i}}">{{$i}} %</option>
    @endfor
    
    
   
    
  
  </select>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>