@extends('layouts.app')
@section('content')
  <div class="container mt-3">
    <h2>Small Table</h2>
    <p>The .table-sm class makes the table smaller by cutting cell padding in half:</p>
    <div id="btn-mes" class="alert alert-success" style="display:none">
      Add a successful .
   </div>
   <form action="{{ route('saveDoctorServices') }}" class= "dataForm" name= "dataForm"  urll= "saveDoctorServices"  method="POST">
    @csrf
    <table class="table table-bordered table-sm txt-align-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($services as $service)
        <tr class="offer{{$service->id}}">
          <td>{{$service->id}}</td>
          <td>{{$service->name}}</td>  
        </tr>   
        @endforeach
      </tbody>
    </table>

      <div class="mb-3 mt-3">
      <label for="browser" class="form-label">Choose your Doctor:</label>
      <select class="form-select" name="doctor_id" id="doctor_id">
        @foreach ($alldoctors as $doctor)
        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
        @endforeach
      </select>
    </div>
    <br>
    <div class="mb-3 mt-3">
      <label for="browser" class="form-label">Choose Services:</label>
      <select class="form-select" name="servicesid[]" id="servicesid[]" multiple>
        @foreach ($allservices as $service)
        <option value="{{$service->id}}">{{$service->name}}</option>
        @endforeach
      </select>   
    </div>
    <br>
    <button type="submit"  class="savebtn btn btn-success" value="" >Save</button> 
    </form>
  </div>
@stop
@section('scripts')
 <script src="{{ asset('js/todo.js') }}" defer></script>
@stop