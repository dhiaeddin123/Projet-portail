@extends('shop')
@section('content')
<main role="main">

    <section class="py-5">
        <div class="container">
                <h1 class="jumbotron-heading"> <span class="badge badge-primary ">Votre panier </span></h1>
            <table class="table table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Qte</th>
                        <th>P.U</th>
                        <th>Total TTC</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $product)
                        
                    
                <tr>
                    <td>
                        <img width="110" class="rounded-circle img-thumbnail" src="{{asset('storage/'.$product->attributes->photo)}}" alt="">
                        {{$product->name}}
                    </td>
                    <td>

                                <input style="display: inline-block" id="qte" class="form-control col-sm-4" type="number" value="{{$product->quantity}}">


                                <a  class="pl-2" href=""><i class="fas fa-sync"></i> </a>
                    </td>
                    <td>
                        {{number_format($product->attributes->prix_ttc,2)}} €
                    </td>
                    <td>
                        {{number_format($product->attributes->prix_ttc * $product->quantity,2)}} €
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td>Total HT</td>
                    <td>{{number_format($total_ht_panier,2)}}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>TVA (20%)</td>
                    <td>{{number_format($tva,2)}}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Total TTC</td>
                    <td>{{number_format($total_ttc,2)}} €</td>
                </tr>
                </tfoot>
            </table>
            
            <a class="btn btn-block btn-outline-dark" href="{{route('commands')}}">Commander</a>
        </div>
    </section>



 

</main>
@endsection