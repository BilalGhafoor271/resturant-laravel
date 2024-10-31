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
<section class="shop-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="shop-grid">
                    <select>
                        <option>Default Sorting</option>
                        <option>Cakes</option>
                        <option>Breads</option>
                        <option>Fries</option>
                        <option>Pizza</option>
                    </select>
                    <span>Showing {{ $products->count() }} of {{ $products->total() }} Results</span>
                </div>
                <div class="shop-products">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4 col-sm-6">
                                <div class="product-info">
                                    <div class="product-img ">
                                        <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" alt="{{ $product->name }}"  style="height: 290px; width:290px; border-radius:45px;" />
                                    </div>
                                    <h4><a href="{{ route('shop_detail', ['id' => $product->id]) }}">{{ $product->name }}</a></h4>
                                    <div class="rc-ratings">
                                        <!-- Add logic for displaying star ratings here if applicable -->
                                        @for ($i = 0; $i < 5; $i++)
                                            <span class="fa fa-star {{ $i < $product->rating ? 'active' : '' }}"></span>
                                        @endfor
                                    </div>
                                    <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                    <div class="shop-meta">
                                        <a href="" class="pull-left"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
