@extends('product.layout')

@section('content')
<div class="container" style="padding-top:2%">
    <a href="{{ route('product.index')}}">Back </a>
<div class="card">
    <div class="card-body">
      <h5 class="card-title">product edit</h5>
      <p class="card-text" style="color: blue">product name: {{$product->name}}</p>
    </div>
  </div>
</div>

<div class="container" style="padding-top:2%">
    <div class="form-group">
      <label for="exampleInputEmail1">{{$product->name}}</label>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">{{$product->price}}</label>
    </div>
    <div class="form-group">
    {!!$product->details!!}<!--حطينا علامتين تعجب عشان يسمح بوصول ال css اذا كان في كلمات بولد او ملونة -->
      </div>
</div>
  @endsection
