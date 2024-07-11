@extends('layouts.app')

@section('content')
  <div class="container mt-3">
    <h2>Small Table</h2>
    <p>The .table-sm class makes the table smaller by cutting cell padding in half:</p>
    <table class="table table-bordered table-sm txt-align-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>name</th>
          <th>price</th>
          <th>detail</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($offers as $offer)
        <tr>
          <td>{{$offer->id}}</td>
          <td>{{$offer->name}}</td>
          <td>{{$offer->price}}</td>
          <td>{{$offer->detail}}</td>
          <td><a class="btn btn-success" href="{{route('edit',['id'=>$offer->id])}}">Edit</a></td>
        </tr>   
        @endforeach

      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {{-- {!! $offers->links() !!} --}}
    {{ $offers->links() }}
  </div>
  </div>
@stop