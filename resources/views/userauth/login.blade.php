@extends('layout.masterlayout')

@section('content')
    <!-- Page Header -->
    <section class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-uppercase">LogIn</h2>
                    <p>Please login or signup to continue with your purchase</p>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-content">
        <div class="container">
            <div class="row" style="display: flex; justify-content:center;">
                <div class="col-md-6">
                    <div class="box-content">
                        <h3 class="text-center">LogIn to your Account</h3>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <br>
                        <form class="logregform" action="{{ route('user.login') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>E-mail Address</label>
                                        <input type="text" value="{{ old('email') }}" name="email"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">

                                        <label>Password</label>
                                        <input type="password" value="" name="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="remember-box checkbox">
                                        <label for="rememberme">
                                            <input type="checkbox" id="rememberme" name="rememberme">Remember Me
                                        </label>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-default pull-right">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
