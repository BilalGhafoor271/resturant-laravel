@extends('layout.masterlayout')

@section('content')
            <!-- Page Header -->
            <section class="page_header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="text-uppercase">Gallery</h2>
                            <p>Tomato is a delicious restaurant website template</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Gallery -->
            <div class="gallery-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item" data-mfp-src="{{asset('assets/img/gallery/1.jpg')}}">
                                <img src="{{asset('assets/img/gallery/1.jpg')}}" class="img-responsive" alt="" />
                                <div class="gi-overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item" data-mfp-src="{{asset('assets/img/gallery/2.jpg')}}">
                                <img src="{{asset('assets/img/gallery/2.jpg')}}" class="img-responsive" alt="" />
                                <div class="gi-overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item" data-mfp-src="{{asset('assets/img/gallery/3.jpg')}}">
                                <img src="{{asset('assets/img/gallery/1.jpg')}}" class="img-responsive" alt="" />
                                <div class="gi-overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item" data-mfp-src="{{asset('assets/img/gallery/4.jpg')}}">
                                <img src="{{asset('assets/img/gallery/4.jpg')}}" class="img-responsive" alt="" />
                                <div class="gi-overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item" data-mfp-src="{{asset('assets/img/gallery/5.jpg')}}">
                                <img src="{{asset('assets/img/gallery/5.jpg')}}" class="img-responsive" alt="" />
                                <div class="gi-overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item" data-mfp-src="{{asset('assets/img/gallery/6.jpg')}}g">
                                <img src="{{asset('assets/img/gallery/6.jpg')}}" class="img-responsive" alt="" />
                                <div class="gi-overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item" data-mfp-src="{{asset('assets/img/gallery/7.jpg')}}">
                                <img src="{{asset('assets/img/gallery/1.jpg')}}" class="img-responsive" alt="" />
                                <div class="gi-overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item" data-mfp-src="{{asset('assets/img/gallery/8.jpg')}}">
                                <img src="{{asset('assets/img/gallery/2.jpg')}}" class="img-responsive" alt="" />
                                <div class="gi-overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item" data-mfp-src="{{asset('assets/img/gallery/9.jpg')}}">
                                <img src="{{asset('assets/img/gallery/3.jpg')}}" class="img-responsive" alt="" />
                                <div class="gi-overlay">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
@endsection
