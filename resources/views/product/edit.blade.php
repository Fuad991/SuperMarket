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
<form action="{{ route('product.update',$product->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="product name">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Price</label>
      <input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="product price">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Details</label>
    <textarea class="form-control" name="details" rows="3"> {!!$product->details!!}<!--حطينا علامتين تعجب عشان يسمح بوصول ال css اذا كان في كلمات بولد او ملونة -->
     </textarea>
      </div>
    <button type="submit" class="btn btn-primary">UPDATE</button>
  </form>
</div>
  @endsection
