@extends('layout.masterlayout')

@section('content')
<!-- Page Header -->
<section class="page_header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-uppercase">SignUp</h2>
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
                    <h3 class="text-center">Register An Account</h3>
                    <br>
                    @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    <form class="logregform" action="{{ route('user.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" value="{{old('name')}}" name="name" class="form-control">
                                    <span class="text-danger">
                                        @error('name')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>E-mail Address</label>
                                    <input type="text" value="{{old('email')}}" name="email" class="form-control">
                                    <span class="text-danger">
                                        @error('email')
                                        {{ $message}}
                                        @enderror
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix space20"></div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input type="password" value="{{old('password')}}" name="password" class="form-control">
                                    <span>
                                        @error('password')
                                        {{ $message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Phone No</label>
                                    <input type="text" value="{{ old('phone')}}" name="phone" class="form-control">
                                    <span>
                                        @error('phone')
                                        {{ $message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input type="text" value="{{ old('address')}}"  name="address" class="form-control">
                                    <span>
                                        @error('address')
                                        {{ $message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="space20"></div>
                                <button type="submit" class="btn btn-default pull-right">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


@endsection
