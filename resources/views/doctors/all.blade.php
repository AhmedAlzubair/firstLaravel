@extends('layouts.app')
@section('content')
  <div class="container mt-3">

  <div id="btn-mes" class="alert alert-success" style="display:none">
    Delete a successful or positive action.
 </div>

    <table class="table table-bordered table-sm txt-align-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($doctors as $doctor)
        <tr class="offer{{$doctor->id}}">
          <td>{{$doctor->id}}</td>
          <td>{{$doctor->name}}</td>
          <td>{{$doctor->address}}</td>
          <td>
           
            <a class="btn btn-success"  href="{{route('getDoctorHospital',['id'=>$doctor->id])}}">Edit</a>
            <a class="btndelete btn btn-danger" offercsrf="{{ csrf_token() }}" offerid="{{$doctor->id}}" id="btnid"  url="{{route('deleteHospital')}}" href="{{route('deleteHospital')}}">Delete</a>
            {{-- <button type="submit" class="btndelete btn btn-danger" offerid="{{$offer->id}}" value="{{$offer->id}}"  >Delete</a> --}}
          </td>
         
        </tr>   
        @endforeach

      </tbody>
    </table>
  </div>
@stop
@section('scripts')
<script src="{{asset('js/offers/deletejs.js') }}" defer></script>
@stop
