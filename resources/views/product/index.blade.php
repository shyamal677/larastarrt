@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="container pt-3">
        
        <div id="products" class="row view-group">
            @foreach ($products as $item)
            <div class="item col-xs-12 col-lg-3 col-sm-6">
                <div class="thumbnail card mb-4">
                    <div class="img-event">
                        <img class="group list-group-image img-fluid" style="max-height:4cm;" src="/images/{{$item->image_1}}" alt="" />
                    </div>
                    <div class="caption card-body">
                        <div class="row">
                            <h4 class="group card-title inner list-group-item-heading text-dark">
                                {{$item->product_name}}</h4>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead text-darker">
                                  Rs :  {{$item->price}}</p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success btn-sm pr-3" href="/product/{{$item->id}}">Show more..</a>
                            </div>
                        </div>
                       
                        <hr>
                        {{-- <div class="row">
                            
                             <div class="col-6">
                                <a class="btn btn-dark btn-sm ml-2" href="product/{{$item->id}}/edit">Edit</a>
                            </div>
                            <div class="col-6">
                            
                            </div>
                        </div>     --}}
                       
                        
                    </div>
                </div>
            </div>
            @endforeach
            <br>
                    


        </div>
        <div class="text-center">
            {{$products->links()}}
        </div>
    </div>
</div>
  
    @endsection
