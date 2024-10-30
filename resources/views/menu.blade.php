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
                    <span data-filter=".{{ $category->slug }}">{{ $category->name }}</span>
                @endforeach
            </div>

            <div class="row menu-items3">
                @foreach ($categories as $category)
                    @foreach ($category->products as $product)
                        <div class="menu-item3 col-sm-6 col-xs-12 {{ $category->slug }}">
                            <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" class="img-responsive" alt="{{ $product->name }}" />
                            <div class="menu-wrapper">
                                <div style="display: flex; justify-content: space-between;">
                                    <h4>{{ $product->name }}</h4>
                                    <span class="price">{{ number_format($product->price, 2) }}</span>
                                </div>
                                <div class="dotted-bg"></div>
                                <p>{{ $product->short_description }}</p>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <a href="{{ route('shop') }}" class="btn btn-default load-more">Load more</a>
    </div>
</section>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // When a category is clicked
        $('.menu-tags3 span').on('click', function() {
            var filterValue = $(this).data('filter');

            // Remove active class from all spans and add it to the clicked one
            $('.menu-tags3 span').removeClass('tagsort3-active');
            $(this).addClass('tagsort3-active');

            // Show all items if "All" is selected
            if (filterValue === '*') {
                $('.menu-item3').show(); // Show all items
            } else {
                $('.menu-item3').hide(); // Hide all items
                $('.menu-item3' + filterValue).show(); // Show only the filtered items
            }
        });
    });
</script>
