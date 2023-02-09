@extends('product.layout')

@section('content')
<div class="container" style="padding-top:2%">
    <a href="{{ route('product.index')}}">Back </a>
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
</div>

<div class="container" style="padding-top:2%">
<form action="{{ route('product.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" name="name" class="form-control" placeholder="product name">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Price</label>
      <input type="text" name="price" class="form-control" placeholder="product price">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Details</label>
    <textarea class="form-control" name="details" rows="3"> </textarea>
      </div>
    <button type="submit" class="btn btn-primary">save</button>
  </form>
</div>
  @endsection
