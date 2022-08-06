@extends('layouts.site_base')
@section('content')
    <!-- page wrapper start -->
    @php
        $categories = App\Category::where('status','Active')->get();
        $brands = App\Brand::where('status','Active')->get();
    @endphp
    
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Search Results</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

    <div class="page-main-wrapper">
        <div class="container">
            <div class="row">
                <!-- sidebar start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                        <!-- sidebar categorie start -->
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-category">
                                <ul>
                                    <li class="title"><i class="fa fa-bars"></i> categories</li>
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('products-by-category',$category->name) }}">{{$category->name}}</a>({{ count($category->products) }})</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- sidebar categorie start -->

                        <!-- manufacturer start -->
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>Manufacturers</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul>
                                    @foreach ($brands as $brand)
                                        <li><a href="{{ route('products-by-brand',$brand->name) }}">{{$brand->name}}</a>({{ count($brand->products) }})</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- manufacturer end -->
                        

                        <!-- sidebar banner start -->
                        <div class="sidebar-widget mb-30">
                            <div class="img-container fix img-full">
                                <a href="#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a>
                            </div>
                        </div>
                        <!-- sidebar banner end -->
                    </div>
                </div>
                <!-- sidebar end -->

                <!-- product main wrap start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-banner img-full">
                        <img src="assets/img/banner/banner_static1.jpg" alt="">
                    </div>
                    <!-- product view wrapper area start -->
                    <div class="shop-product-wrapper pt-34">
                        <!-- shop product top wrap start -->
                        <div class="shop-top-bar">
                            <div class="row">
                                <div class="col-lg-7 col-md-6">
                                    <div class="top-bar-left">
                                        <div class="product-view-mode mr-70 mr-sm-0">
                                            <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                            <a href="#" data-target="list"><i class="fa fa-list"></i></a>
                                        </div>
                                        <div class="product-amount">
                                            <p>Search Results</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop product top wrap start -->

                        <!-- product item start -->
                        <div class="shop-product-wrap grid row">
                            @foreach ($products as $product)
                                @if (Session::get('shopping_type') == 'wholesale')
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <!-- product single grid item start -->
                                        <div class="product-item fix mb-30">
                                            <div class="product-thumb">
                                                <a href="{{ route('product-details', $product->name )}}">
                                                    <img src="{{ asset( 'public/uploads/'.$product->image )}}" class="img-pri" alt="">
                                                    <img style="transform: scale(1.5)" src="{{ asset( 'public/uploads/'.$product->image )}}" class="img-sec" alt="">
                                                </a>
                                                <div class="product-action-link">
                                                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="{{ route('product-details', $product->name )}}">{{$product->name}}</a></h4>
                                                <div class="pricebox">
                                                    <span class="regular-price">#{{$product->wholesale_price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product single grid item end -->
                                        <!-- product single list item start -->

                                        <div class="product-list-item mb-30">
                                            <div class="product-thumb">
                                                <a href="{{ route('product-details', $product->name )}}">
                                                    <img src="{{ asset( 'public/uploads/'.$product->image )}}" class="img-pri" alt="">
                                                    <img style="transform: scale(1.5)" src="{{ asset( 'public/uploads/'.$product->image )}}" class="img-sec" alt="">
                                                </a>
                                                <div class="product-label">
                                                    <span>hot</span>
                                                </div>
                                            </div>
                                            <div class="product-list-content">
                                                <h3><a href="{{ route('product-details', $product->name )}}">{{ $product->name}}</a></h3>
                                                <div class="pricebox">
                                                    <span class="regular-price">#{{ $product->wholesale_price}}</span>
                                                </div>
                                                {{-- <p>{{ $product->description}}</p> --}}
                                                <div>
                                                    @php
                                                        echo Substr($product->description, 100);
                                                    @endphp...
                                                </div>
                                                <div class="product-list-action-link">
                                                    <a class="buy-btn" href="#" data-toggle="tooltip" data-placement="top" title="Add to cart">go to buy <i class="fa fa-shopping-cart"></i> </a>
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product single list item start -->
                                    </div> 

                                    <!-- Quick view modal start -->
                                    <div class="modal" id="quick_view">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider slick-arrow-style_2 mb-20">
                                                                    <div class="pro-large-img">
                                                                        <img src="{{ asset('public/uploads/'.$product->image) }}" alt="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="product-details-des mt-md-34 mt-sm-34">
                                                                    <div class="availability mt-10">
                                                                        <h5>Availability:</h5>
                                                                        <span>{{$product->wholesale_stock}} in stock</span>
                                                                    </div>
                                                                    <div class="pricebox">
                                                                        <span class="regular-price">#{{$product->wholesale_price}}</span>
                                                                    </div>
                                                                    <div style="word-wrap: word-break">
                                                                        @php
                                                                            echo $product->description ;
                                                                        @endphp
                                                                    </div>
                                                                    
                                                                    <div class="quantity-cart-box d-flex align-items-center mt-20">
                                                                        <div class="quantity">
                                                                            <div class="pro-qty"><input type="text" value="1"></div>
                                                                        </div>
                                                                        <div class="action_link">
                                                                            <a class="buy-btn" href="{{route('add-to-cart')}}">add to cart<i class="fa fa-shopping-cart"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Quick view modal end -->
                                @else
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <!-- product single grid item start -->
                                        <div class="product-item fix mb-30">
                                            <div class="product-thumb">
                                                <a href="{{ route('product-details', $product->name )}}">
                                                    <img src="{{ asset( 'public/uploads/'.$product->image )}}" class="img-pri" alt="">
                                                    <img style="transform: scale(1.5)" src="{{ asset( 'public/uploads/'.$product->image )}}" class="img-sec" alt="">
                                                </a>
                                                <div class="product-action-link">
                                                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="{{ route('product-details', $product->name )}}">{{$product->name}}</a></h4>
                                                <div class="pricebox">
                                                    <span class="regular-price">#{{$product->price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product single grid item end -->
                                        <!-- product single list item start -->

                                        <div class="product-list-item mb-30">
                                            <div class="product-thumb">
                                                <a href="{{ route('product-details', $product->name )}}">
                                                    <img src="{{ asset( 'public/uploads/'.$product->image )}}" class="img-pri" alt="">
                                                    <img style="transform: scale(1.5)" src="{{ asset( 'public/uploads/'.$product->image )}}" class="img-sec" alt="">
                                                </a>
                                                <div class="product-label">
                                                    <span>hot</span>
                                                </div>
                                            </div>
                                            <div class="product-list-content">
                                                <h3><a href="{{ route('product-details', $product->name )}}">{{$product->name}}</a></h3>
                                                <div class="pricebox">
                                                    <span class="regular-price">#{{ $product->price}}</span>
                                                </div>
                                                {{-- <p>{{ $product->description}}</p> --}}
                                                <div>
                                                    @php
                                                        echo Substr($product->description, 100);
                                                    @endphp...
                                                </div>
                                                <div class="product-list-action-link">
                                                    <a class="buy-btn" href="#" data-toggle="tooltip" data-placement="top" title="Add to cart">go to buy <i class="fa fa-shopping-cart"></i> </a>
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product single list item start -->
                                    </div> 

                                    <!-- Quick view modal start -->
                                    <div class="modal" id="quick_view">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider slick-arrow-style_2 mb-20">
                                                                    <div class="pro-large-img">
                                                                        <img src="{{ asset('public/uploads/'.$product->image) }}" alt="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="product-details-des mt-md-34 mt-sm-34">
                                                                    <div class="availability mt-10">
                                                                        <h5>Availability:</h5>
                                                                        <span>{{$product->stock}} in stock</span>
                                                                    </div>
                                                                    <div class="pricebox">
                                                                        <span class="regular-price">#{{$product->price}}</span>
                                                                    </div>
                                                                    <div style="word-wrap: word-break">
                                                                        @php
                                                                            echo $product->description ;
                                                                        @endphp
                                                                    </div>
                                                                    
                                                                    <div class="quantity-cart-box d-flex align-items-center mt-20">
                                                                        <div class="quantity">
                                                                            <div class="pro-qty"><input type="text" value="1"></div>
                                                                        </div>
                                                                        <div class="action_link">
                                                                            <a class="buy-btn" href="{{route('add-to-cart')}}">add to cart<i class="fa fa-shopping-cart"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Quick view modal end -->
                                @endif
                            <!-- product single column end -->
                            @endforeach
                            
                        </div>
                        <!-- product item end -->
                    </div>
                    <!-- product view wrapper area end -->

                    <!-- start pagination area -->
                    <div class="paginatoin-area text-center pt-28">
                        <div class="row">
                            <div class="col-12">
                                <ul class="pagination-box">
                                    {{$products->links()}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end pagination area -->

                </div>
                <!-- product main wrap end -->
            </div>
        </div>
    </div>
    <!-- page wrapper end -->
@endsection