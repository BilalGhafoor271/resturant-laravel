@extends('layout.masterlayout')

@section('content')
            <!-- Page Header -->
            <section class="page_header vertical-padding">

            </section>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="giant-space">
                            <h2 class="text-giant">404</h2>
                            <p class="wow fadeInUp">Sorry. The page you are looking for is not found</p>
                            <p class="top-space-lg"><a href="{{ route('index')}}" class="btn btn-default btn-lg">Back to home</a></p>
                        </div>
                    </div>
                </div>
            </div>

            @endsection
