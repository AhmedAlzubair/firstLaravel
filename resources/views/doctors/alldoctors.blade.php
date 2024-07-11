@extends('layouts.app')
@section('content')
  <div class="container mt-3">
    <h2>Small Table</h2>
    <p>The .table-sm class makes the table smaller by cutting cell padding in half:</p>
    <div id="btn-mes" class="alert alert-success" style="display:none">
      Delete a successful or positive action.
   </div>
    <table class="table table-bordered table-sm txt-align-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Title</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($doctors as $doctor)
        <tr class="doctor{{$doctor->id}}">
          <td>{{$doctor->id}}</td>
          <td>{{$doctor->name}}</td>
          <td>{{$doctor->title}}</td>
          <td>
            <a class="btn btn-success"  href="{{route('getDoctorServices',['id'=>$doctor->id])}}">Services</a>
            {{-- <a class="btndelete btn btn-danger" offercsrf="{{ csrf_token() }}" offerid="{{$doctor->id}}" id="btnid"  href="{{route('ajxFdelete')}}">Delete</a> --}}
            {{-- <button type="submit" class="btndelete btn btn-danger" offerid="{{$offer->id}}" value="{{$offer->id}}"  >Delete</a> --}}
          </td>
         
        </tr>   
        @endforeach

      </tbody>
    </table>
  </div>
 
@stop
