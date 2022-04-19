@extends('layout')

        @section('content')
        <section class="section"> 
            <div class="container">
               
                    <div class="card">
                        <article class="card-body">
                        
                        <h4 class="card-title mb-4 mt-1">Sign in</h4>
                        @if(Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
                        @endif
                        <form action="/loginsubmit" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Your email</label>
                                <input name="email" class="form-control" placeholder="Email" type="email" required>
                            </div> <!-- form-group// -->
                            <div class="form-group">
                        
                                <label>Your password</label>
                                <input class="form-control" name="password" placeholder="******" type="password" required>
                            </div> <!-- form-group// --> 
                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Login  </button>
                            </div> <!-- form-group// -->                                                           
                        </form>
                        </article>
                    </div> <!-- card.// -->
               
            </div>
        </section>
        @endsection
