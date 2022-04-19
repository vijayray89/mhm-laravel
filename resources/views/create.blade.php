@extends('layout')

@section('content')
  <section class="section"> 
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body">
            <!-- enctype="multipart/form-data" -->
            <form action="/register"  method="POST" enctype="multipart/form-data">
              @csrf

                  <div class="container">
                    
                    <div class="row justify-content-center">
                      <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                        <div class="row">
                          <div class="col text-center">
                            <h1>Register</h1>
                            @if(Session::has('message'))
                              <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
                            @endif
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col mt-4">
                            <input type="text" class="form-control" name="admin_name" placeholder=" Name">
                            @if ($errors->has('admin_name'))
                                <span class="text-danger">{{ $errors->first('admin_name') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col">
                            <input type="email" class="form-control" name="admin_email" placeholder="Email">
                            @if ($errors->has('admin_email'))
                                <span class="text-danger">{{ $errors->first('admin_email') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col">
                            <input type="number" class="form-control" name="admin_mobile" placeholder="Mobile">
                            @if ($errors->has('admin_mobile'))
                                <span class="text-danger">{{ $errors->first('admin_mobile') }}</span>
                            @endif
                          </div>
                          <div class="col">
                            <input type="password" class="form-control" name="admin_password" placeholder="Password">
                            @if ($errors->has('admin_password'))
                                <span class="text-danger">{{ $errors->first('admin_password') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="row justify-content-start mt-4">
                          <div class="col">
                            <button class="btn btn-primary mt-4">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection