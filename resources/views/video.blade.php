@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                Video Viewer {{$video->viewer}}
                <div class="card-body">
               
           
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/yp5JPAn52l0?si=wXbWTbJoyOlzmHrK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
