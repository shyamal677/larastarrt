@extends('layouts.app')

@section('content')
<div class="container">
    <h3> shoping cart page </h3>
    @if (Session::has('cart'))
        <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $orderitem)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="row">
                            <div class="pl-2">
                            <a class="thumbnail pull-left" href="../product/{{$orderitem['item']['id']}}"> 
                                <img class="media-object" src="/images/{{$orderitem['item']['image_1']}}" style="width: 72px; height: 72px;"> </a>
                            </div>
                            <div class="media-body pl-3">
                                <h4 class="media-heading"><a href="#">{{$orderitem['item']['name']}}</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong> {{$orderitem['item']['quntity']}} In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$orderitem['qty']}}" disabled>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>Rs: {{$orderitem['item']['price']}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>Rs: {{$orderitem['price']}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href="/cart/remove/{{$orderitem['item']['id']}}" type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a></td>
                    </tr>
                    @endforeach
                    
                  
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>Rs: {{$totalPrice}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="/product" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></td>
                        <td>
                            <checkout-component></checkout-component>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<example-component :userID="{{$totalPrice}}"></example-component>
</div>
    @else
        <h4> No items in cart</h4>
    @endif
</div>
         <!-- start of modal -->

         
         <div class="modal fade" id="openModal">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content ">
    
                    <!-- Modal Header -->
                    <div class="modal-header justify-content-center bg-light">
                       
                        <h4 class="modal-title">Ready to Join? Create a New Account</h4>
                    </div>                 
                </div>
            </div>
        </div>
       
    <!-- end of modal -->  
    
    
     
@endsection

