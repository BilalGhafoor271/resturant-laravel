@extends('layout.masterlayout')
@section('content')
    <section class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-uppercase">Admin LogIn</h2>
                    <p>Admin Login</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container mb-5">
        <div class="row" style="display: flex; justify-content:center;">
            <div class="col-md-6">
                <div class="box-content">
                    <h3 class="text-center">Admin Login</h3>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <br>
                    <form class="logregform" action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>E-mail Address</label>
                                    <input type="text" value="{{ old('email') }}" name="email" class="form-control">
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
                            <div class="col-md-7">
                                <button type="submit" class="btn btn-default pull-right">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
