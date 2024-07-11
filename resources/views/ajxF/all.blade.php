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
          <th>name</th>
          <th>price</th>
          <th>detail</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($offers as $offer)
        <tr class="offer{{$offer->id}}">
          <td>{{$offer->id}}</td>
          <td>{{$offer->name}}</td>
          <td>{{$offer->price}}</td>
          <td>{{$offer->detail}}</td>
          <td>
            <a class="btn btn-success"  href="{{route('edit',['id'=>$offer->id])}}">Edit</a>
            <a class="btndelete btn btn-danger" offercsrf="{{ csrf_token() }}" url="ajxFdelete" offerid="{{$offer->id}}" id="btnid"  href="{{route('ajxFdelete')}}">Delete</a>
            {{-- <button type="submit" class="btndelete btn btn-danger" offerid="{{$offer->id}}" value="{{$offer->id}}"  >Delete</a> --}}
          </td>
         
        </tr>   
        @endforeach

      </tbody>
    </table>
  </div>
   <script src="{{asset('js/offers/deletejs.js') }}" defer></script>
@stop
{{-- @section('scripts')
<script type="text/javascript">

jQuery(document).ready(function($){

$('.btndelete').on('click',function (e){
    e.preventDefault();
    var type = "POST";
    var iddelete=$('.btndelete').attr('offerid');
    var iddelete2=$('.btndelete').val();
    $.ajax({
        type: type,
        enctype:"multipart/form-data",
        url: "{{route('ajxFdelete')}}" ,
        data: {
          '_token':"{{csrf_token()}}",
          'id':iddelete2,
        },
        dataType: 'json',
        success: function (data) {
          if(data.statuse==true)
          $('#btn-mes').show();
          $('.offer'+data.id).remove();
        },
        error: function (data) {
           // console.log(data);
        }
    });
});
});
</script>

@stop --}}