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


    <a href="/admin/user" class="btn btn-secondary">Go back to users</a>
    <h1>Update User <?=$user->name?></h1>
    
    <form action="/admin/user/edit/{{$user->id}}" method="post" enctype="multipart/form-data">
        @csrf
    
 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">user name</label>
    <input type="text" class="form-control"  name="name" aria-describedby="emailHelp" value="{{old('name')??$user->name}}">
    @if ($errors->has('name'))
        <strong>{{$errors->first('name')}}</strong>
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">user email</label>
    <input  class="form-control"  name="email" aria-describedby="emailHelp" value="{{old('email')??$user->email}}">    
    @if ($errors->has('email'))
    <strong>{{$errors->first('email')}}</strong>
@endif   
</div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">user role</label>
    <br>
    <select class="form-select" aria-label="Default select example" name="role">
       
        @foreach ($roles as $key => $role)
          @if ((old('role') == $role->id )|| ($user->role_id == $role->id))
        <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
  @else
        <option value="{{ $role->id }}">{{ $role->name }}</option>
  @endif
          
       @endforeach
        
       
      </select>  
    @if ($errors->has('role')):
    <strong>{{$errors->first('role')}}</strong>
@endif  
</div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  

</body>
</html>