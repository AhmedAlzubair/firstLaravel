<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
 @include('layouts.header')

<body>
  @include('layouts.navbar')
<div class="container">
 
 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @csrf
                    <form  action="{{url('/store')}}"  class="was-validated">
                        <div class="mb-3 mt-3">
                          <label for="uname" class="form-label">{{__('messages.name')}}</label>
                          <input type="text" class="form-control" id="uname" placeholder="Enter Name" name="name" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="mb-3">
                          <label for="pwd" class="form-label">price:</label>
                          <input type="number" class="form-control" id="pwd" placeholder="Enter Price" name="price" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="mb-3">
                          <label for="pwd" class="form-label">Detail:</label>
                          <input type="text" class="form-control" id="pwd" placeholder="Enter Detail" name="detail" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>