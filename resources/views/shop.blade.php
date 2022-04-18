<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Mon T-Shirt</title>
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
  @yield('content')
    <main role="main">


        

    

</main>
    @include('layouts.footer')
</body>