{{-- <!doctype html>
<html> --}}
@extends('layouts.app')
@section('content')
{{-- @include('layouts.header')
<body>
  @include('layouts.navbar') --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('messages.username') }}</div> --}}
                {{-- @if(session('success'))
                <div class="alert alert-success">
                 <strong>{{session('success')}}</strong> Indicates a successful or positive action.
               </div>
                @endif
                @if(session('photo'))
                <div class="alert alert-success">
                 <strong>{{session('photo')}}</strong> Indicates a successful or positive action.
               </div>
                @endif --}}
                <div id="btn-mes" class="alert alert-success" style="display:none">
                   Indicates a successful or positive action.
                </div>
            
                {{-- @elseif(session('Errors'))
                <div class="alert alert-success">
                 <strong>{{session('Errors')}}</strong> Indicates a successful or positive action.
               </div>
                @e --}}
              
                <div class="card-body">
                   
                    <form action="{{ route('ajxFstore') }}" urll="ajxFstore" offercsrf="{{ csrf_token() }}" id="dataForm" name="dataForm" class="was-validated" method="POST">
                      @csrf
                      <div class="mb-3 mt-3">
                          <label for="uname" class="form-label">{{__('messages.name_ar')}}</label>
                          <input type="text" class="form-control" id="name_ar" placeholder="Enter Name" name="name_ar" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                          @error('name_ar')
                          <small class="form-text text-danger">{{$messages}}  </small>  
                          {{-- <small class="form-text text-danger">{{__('messages.username')}}  </small>   --}}
                          @enderror
                        </div>
                        <div class="mb-3 mt-3">
                          <label for="uname" class="form-label">{{__('messages.name_en')}}</label>
                          <input type="text" class="form-control" id="name_en" placeholder="Enter Name" name="name_en" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                          @error('name_en')
                          <small class="form-text text-danger">{{$messages}}  </small>  
                          {{-- <small class="form-text text-danger">{{__('messages.username')}}  </small>   --}}
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="price" class="form-label">{{__('messages.price')}}</label>
                          <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                          @error('price')
                          <small class="form-text text-danger">{{$messages}}  </small>  
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="pwd" class="form-label">Detail:</label>
                          <input type="text" class="form-control" id="detail_ar" placeholder="Enter Detail" name="detail_ar" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                          @error('detail_ar')
                          <small class="form-text text-danger">{{$messages}}  </small>  
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="pwd" class="form-label">Detail:</label>
                          <input type="text" class="form-control" id="detail_en" placeholder="Enter Detail" name="detail_en" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                          @error('detail_en')
                          <small class="form-text text-danger">{{$messages}}  </small>  
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="pwd" class="form-label">photo:</label>
                          <input type="file" class="form-control" id="photo" name="photo" >
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                          @error('photo')
                          <small class="form-text text-danger">{{$messages}} </small>  
                          @enderror
                        </div>
                       
                        <button type="submit" id="saveData" name="saveData"  class="btn btn-primary" value="">Submit</button>
                      
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
 <script src="{{ asset('js/todo.js') }}" defer></script>
@stop
