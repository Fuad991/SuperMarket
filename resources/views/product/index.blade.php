@extends('product.layout')

@section('content')
<div class="jumbotron container">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('product.create')}}" role="button">create product</a>
    <a class="btn btn-primary btn-lg" href="{{ route('product.trash')}}" role="button">Trash product</a>
  </div>

  <div class="contrainer">
    @if ($message=Session::get('success'))
    <div class="alert alert-primary" role="alert">
        {{$message}}
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
            <td>{{$item->price}} JOD</td>
            <td>
                <div class="row">
                    <div class="col-sm">
                        <a class="btn btn-success" href="{{route('product.edit',$item->id)}}">Edit </a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-primary" href="{{route('product.show',$item->id)}}">Show </a>
                    </div>
                    <div class="col-sm">
                        <a class="btn btn-warning" href="{{route('soft.delete',$item->id)}}">Soft Delete </a>
                    </div>
                   <!-- <div class="col-sm">
                        <form action="{{ route('product.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete </button>
                        </form>
                    </div> -->
                  </div>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$model->links()}}<!-- ممكن ينكتب باطريقة هاي {!! $model->links() !!} -->
  </div>
  @endsection
