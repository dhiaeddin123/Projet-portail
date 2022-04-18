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
<form action="/admin/users/search" method="get">
 <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="search for users" name="search" value="">
  <button class="btn btn-outline-secondary" type="submit" >Search</button>
</div>
 </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Create_Date</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php
 
        foreach ($users as $key=> $user){
            # code...
            ?>
      <th scope="row"><?=$key+1?></th>
      
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->created_at}}</td>
      @if($user->role_id!==null)
      <td>{{$user->role->name}}</td>
      
      @else
      <td>None</td>
      @endif
      <td>
      <a href="/admin/user/edit/{{$user->id}}"type="button" class="btn btn-outline-primary">Edit</a>
      <form action="delete" method="POST"style="display:inline-block">
        <input type="hidden" name="id"value="">
        <a href="/admin/user/delete/{{$user->id}}" type="button" class="btn btn-outline-danger">Delete</a>
        </form>
    </td>
    </tr>
    <?php }?>
    
  </tbody>
</table>
</body>
</html>