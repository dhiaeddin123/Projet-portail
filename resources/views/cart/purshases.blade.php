@extends('shop')
@section('content')
<main role="main">

    <section class="py-5">
        <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Montant Payé</th>
                    <th scope="col">Quantity</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <?php
               
                      foreach ($content as $key=> $product){
                          # code...
                          ?>
                    <th scope="row"><?=$key?></th>
                    <td>
                      <img style="width:100px; height:100px;" src="{{asset('storage/'.$product->image)}}"class="thumb-img">
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{number_format($product->prixTTC()*$product->pivot->quantity,2)}} €</td>
                    <td>{{$product->pivot->quantity}}</td>
                  
                  </tr>
                  <?php }?>
                  
                </tbody>
              </table>
  
        </div>
    </section>



 

</main>
@endsection