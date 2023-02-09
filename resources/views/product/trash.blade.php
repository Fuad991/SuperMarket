@extends('product.layout')

@section('content')
<div class="jumbotron container">
        <p>trash product</p>
    <a class="btn btn-primary btn-lg" href="{{ route('product.index')}}" role="button">HOME</a>
  </div>

    @endif
  </div>

  <div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col" style="width: 300px">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($model as $item)
          <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->price}} </td>
            <td>
                <div class="row">
                    <div class="col-sm">
                        <a class="btn btn-success" href="{{route('product.back',$item->id)}}">return </a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-danger" href="{{route('product.delete.ever',$item->id)}}">Delete </a>
                    </div>
                  </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!!$model->links()!!}
  </div>
  @endsection
