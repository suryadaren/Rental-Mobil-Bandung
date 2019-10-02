@extends('layouts.master')

@section('main')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="login-form" style="text-align: center;"><!--login form-->
                        <h2>Login to your account</h2>
                        
                        <form action="{{ url('/cekLogin')}}" method="post">
                            <input type="email" name="email" placeholder="Email Address" />
                            <input type="password" name="password" placeholder="Password" />

                            <button type="submit" class="btn btn-default">Login</button>
                            {{csrf_field()}}
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
