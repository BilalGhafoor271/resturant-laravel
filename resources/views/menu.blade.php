@extends('layout.masterlayout')

@section('content')

<section class="page_header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-uppercase">Menu</h2>
                <p>Tomato is a delicious restaurant website template</p>
            </div>
        </div>
    </div>
</section>

<section class="menu space60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header wow fadeInDown">
                    <h1>Tile Style<small>These fine folks trusted the award-winning restaurant.</small></h1>
                </div>
            </div>
        </div>

        <div class="food-menu wow fadeInUp">
            <div class="menu-tags3">
                <span data-filter="*" class="tagsort3-active">All</span>
                @foreach ($categories as $category)
                    <span data-filter="{{$category->slug}}">{{ $category->name }}</span>

                @endforeach
            </div>

            <div class="row menu-items3">
                    @foreach ($products as $product)
                    <div class="menu-item3 col-sm-6 col-xs-12 {{ $product->name }}">
                        <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" class="img-responsive" alt="{{ $product->name }}" />
                        <div class="menu-wrapper">
                            <div style="display: flex; justify-content: space-between;">
                                <h4>{{ $product->name }}</h4>
                            <span class="price">{{ number_format($product->price, 2) }}</span>

                            </div><div class="dotted-bg"></div>
                            <p>{{ $product->short_description }}</p>
                        </div>
                    </div>
                    @endforeach

            </div>
        </div>
        <a href="{{ route('shop')}}" class="btn btn-default load-more">Load more</a>
    </div>
</section>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
