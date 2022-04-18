<?php
$title=$product->name??'';
$description=$product->description??'';
$price=$product->price??'';
$image=$product->image??'';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.bootstrap')
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <?php if($image!=''):?>
        <img src="/<?=$image?>" class="update">
        <?php endif;?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Image</label>
    <br></br>

    <input type="file"   aria-describedby="emailHelp" name="image">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Title</label>
    <input type="text" class="form-control"  name="title" aria-describedby="emailHelp" value="<?=$title?>">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Description</label>
    <textarea  class="form-control"  name="description" aria-describedby="emailHelp" ><?=$description?></textarea>    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Price</label>
    <input type="number" step=".01" name="price" class="form-control"  aria-describedby="emailHelp" value="<?=$price?>">
    
  </div>
  

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   
</body>
</html>
    