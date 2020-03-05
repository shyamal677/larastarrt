@extends('layouts.app')

@section('content')
<div class="container">
    <h2> show page </h2>
    {{-- <a href="/back"><button type="button" class=" btn--border btn-read btn--animated">Go Back</button></a> --}}
</div><br>  
 
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
            <div class="well well-sm">
                <div class="row">
                    <div class=" col-12 col-lg-5 ">
                        <img src="/images/{{$product->image_1}}" alt="" class="img-rounded img-responsive show" />
                    </div>
                    <div class="col-12 col-lg-7 ">
                        <h1 class="font-weight-bold"> {{$product->name}} </h1>
                        <h2>Rs: {{$product->price}} </h2>
                        <p>Available Quntity:  {{$product->quntity}} </p>
                        <p> {{$product->description}} </p>
                        
                        <form action="/cart/{{$product->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="number" name="quntity" min="1" value="1" class="form-control text-center">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info form-control" value="Add To Cart">
                            </div>
                        </form>                       
                    </div>
                </div>
                
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <img src="/storage/cover_images/{{$product->image_1}}" alt="" class="img-rounded img-responsive show_smal" />
        </div>
        <div class="col-sm-6 col-md-3">
            <img src="/storage/cover_images/{{$product->image_2}}" alt="" class="img-rounded img-responsive show_smal" />
        </div>
        <div class="col-sm-6 col-md-3">
            <img src="/storage/cover_images/{{$product->image_3}}" alt="" class="img-rounded img-responsive show_smal" />
        </div>
        <div class="col-sm-6 col-md-3">
            <img src="/storage/cover_images/{{$product->image_4}}" alt="" class="img-rounded img-responsive show_smal" />
        </div>
    </div>
</div>

@endsection
