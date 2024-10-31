@extends('layout.masterlayout')

@section('content')
            <!-- Page Header -->
            <section class="page_header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="text-uppercase">Shop Listing</h2>
                            <p>Tomato is a delicious restaurant website template</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Shop Content -->

                <section class="product-detail">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-images">
                                    @php
                                    $images = json_decode($product->images);
                                @endphp
                                @foreach ($images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Product Image" style="width: 100px; height: auto; margin-right: 5px;">
                                @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $product->name }}</h2>
                                <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                <div class="product-description">
                                    <p>{{ $product->long_description }}</p>
                                </div>
                                {{-- <form action="{{ route('cart.add', $product->id) }}" method="POST"> --}}
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>

                </section>

            <!-- Footer-->
            @endsection
