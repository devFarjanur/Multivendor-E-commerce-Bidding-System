@extends('customer.index')
@section('customer')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <div class="sherah-dsinner">
                            <div class="row mg-top-30">
                                <div class="col-12 sherah-flex-between">
                                    <div class="sherah-breadcrumb">
                                        <h2 class="sherah-breadcrumb__title">Products</h2>
                                        <ul class="sherah-breadcrumb__list">
                                            <li><a href="{{ route('customer.product.list') }}">Home</a></li>
                                            <li class="active"><a href="{{ route('customer.product.list') }}">Product
                                                    List</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xxl-2 col-lg-3 col-12">
                                    <div class="sherah-product-sidebar sherah-default-bg mg-top-30">
                                        <h4 class="sherah-product-sidebar__title sherah-border-btm">Product Categories</h4>

                                        <ul class="sherah-product-sidebar__list">
                                            @if (count($categories) > 0)
                                                @foreach ($categories as $category)
                                                    <li>
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                            data-bs-target="#category-{{ $category->id }}" role="button"
                                                            aria-expanded="false"
                                                            aria-controls="category-{{ $category->id }}"
                                                            data-category-id="{{ $category->id }}">
                                                            <span>
                                                                <i class="fa-solid fa-chevron-right"
                                                                    id="arrow-{{ $category->id }}"></i>
                                                                {{ $category->name }}
                                                            </span>
                                                            <span class="count">
                                                                @isset($categoryProductCount[$category->id])
                                                                    {{ $categoryProductCount[$category->id] }}
                                                                @else
                                                                    0
                                                                @endisset
                                                            </span>
                                                        </a>
                                                        @if (isset($subcategoriesGrouped[$category->id]) && count($subcategoriesGrouped[$category->id]) > 0)
                                                            <div class="collapse" id="category-{{ $category->id }}">
                                                                <ul class="pt-2 ps-4">
                                                                    @foreach ($subcategoriesGrouped[$category->id] as $subcategory)
                                                                        <li>
                                                                            <a href="#"
                                                                                class="d-flex justify-content-between pt-1">
                                                                                <span>{{ $subcategory->name }}</span>
                                                                                <span class="count">
                                                                                    @isset($subcategoryProductCount[$subcategory->id])
                                                                                        {{ $subcategoryProductCount[$subcategory->id] }}
                                                                                    @else
                                                                                        0
                                                                                    @endisset
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            @else
                                                <p>No categories found.</p>
                                            @endif
                                        </ul>
                                        <script>
                                            // Wait for the DOM to be fully loaded
                                            document.addEventListener('DOMContentLoaded', function() {
                                                // Listen for collapse events to toggle the icon
                                                var collapses = document.querySelectorAll('[data-bs-toggle="collapse"]');

                                                collapses.forEach(function(collapse) {
                                                    collapse.addEventListener('click', function() {
                                                        var targetId = this.getAttribute('data-bs-target');
                                                        var arrowIcon = document.querySelector('#arrow-' + targetId.split('-')[1]);

                                                        if (document.querySelector(targetId).classList.contains('show')) {
                                                            // If the collapse is open, change to right arrow
                                                            arrowIcon.classList.remove('fa-chevron-down');
                                                            arrowIcon.classList.add('fa-chevron-right');
                                                        } else {
                                                            // If the collapse is closed, change to down arrow
                                                            arrowIcon.classList.remove('fa-chevron-right');
                                                            arrowIcon.classList.add('fa-chevron-down');
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="col-xxl-10 col-lg-9 col-12">
                                    <div class="sherah-breadcrumb__right mg-top-30">
                                        <div class="sherah-breadcrumb__right--first">
                                            <div class="sherah-header__form sherah-header__form--product">
                                                <form class="sherah-header__form-inner" action="#">
                                                    <button class="search-btn" type="submit">
                                                        <svg width="24" height="25" viewBox="0 0 24 25"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.6888 18.2542C10.5721 22.0645 4.46185 20.044 1.80873 16.2993C-0.984169 12.3585 -0.508523 7.01726 2.99926 3.64497C6.41228 0.362739 11.833 0.112279 15.5865 3.01273C19.3683 5.93475 20.8252 11.8651 17.3212 16.5826C17.431 16.6998 17.5417 16.8246 17.6599 16.9437C19.6263 18.9117 21.5973 20.8751 23.56 22.8468C24.3105 23.601 24.0666 24.7033 23.104 24.9575C22.573 25.0972 22.1724 24.8646 21.8075 24.4988C19.9218 22.6048 18.0276 20.7194 16.1429 18.8245C15.9674 18.65 15.8314 18.4361 15.6888 18.2542ZM2.39508 10.6363C2.38758 14.6352 5.61109 17.8742 9.62079 17.8977C13.6502 17.9212 16.9018 14.6914 16.9093 10.6597C16.9169 6.64673 13.7046 3.41609 9.69115 3.39921C5.66457 3.38232 2.40259 6.61672 2.39508 10.6363Z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <input name="s" value="" type="text"
                                                        placeholder="Search">
                                                </form>
                                            </div>
                                            <p>Showing 1–8 of 60 results</p>
                                        </div>
                                        <div class="sherah-breadcrumb__right--second">
                                            <div class="sherah-product__nav list-group " id="list-tab" role="tablist">
                                                <a class="list-group-item active" data-bs-toggle="list" href="#tab_1"
                                                    role="tab" href="profile.html"><span>Top Rated</span></a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#tab_2"
                                                    role="tab"><span>Popular</span></a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#tab_1"
                                                    role="tab"><span>Newest</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="tab_1" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                @if (count($products) > 0)
                                                    @foreach ($products as $product)
                                                        <div class="col-xxl-4 col-lg-6 col-md-6 col-12">
                                                            <div
                                                                class="sherah-product-card sherah-product-card__v2  sherah-default-bg sherah-border mg-top-30">
<<<<<<< HEAD
                                                                {{-- <div class="card-img-top d-flex justify-content-center align-items-center"
                                                                    style="width: 100%; height: 430px;">
                                                                    <img src="{{ asset('upload/admin_images/' . $product->image) }}"
                                                                        class="img-fluid"
                                                                        style="max-width: 500px; height: 430px;">
                                                                </div> --}}
=======
>>>>>>> edaa50eb216b4ea1d8ac89f28f90a7083c62b570
                                                                <img src="{{ asset('upload/admin_images/' . $product->image) }}"
                                                                    class="card-img-top" alt="{{ $product->name }}"
                                                                    style="width: 100%; height: 350px; object-fit: cover;">
                                                                <div
                                                                    class="sherah-product-card__content sherah-dflex-column sherah-flex-gap-5">
                                                                    <h4 class="sherah-product-card__title">
                                                                        <a href="product-detail.html"
                                                                            class="sherah-pcolor">{{ $product->name }}</a>
                                                                    </h4>
                                                                    <div class="sherah-product__bottom">
                                                                        <div class="sherah-product__bottom--single">
                                                                            <h5 class="sherah-product-card__price">
                                                                                TK. {{ $product->price }}
                                                                            </h5>
                                                                            <div
                                                                                class="sherah-product-card__meta sherah-dflex sherah-flex-gap-30">
                                                                                <div
                                                                                    class="sherah-product-card__rating sherah-dflex sherah-flex-gap-5">
                                                                                    {{-- <span class="sherah-color4"><i
                                                                                            class="fa fa-star"></i></span>
                                                                                    <span class="sherah-color4"><i
                                                                                            class="fa fa-star"></i></span>
                                                                                    <span class="sherah-color4"><i
                                                                                            class="fa fa-star"></i></span>
                                                                                    <span class="sherah-color4"><i
                                                                                            class="fa fa-star"></i></span>
                                                                                    <span class="sherah-color4"><i
                                                                                            class="fa fa-star"></i></span>
                                                                                    (33) --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <form
                                                                            action="{{ route('customer.bid.store', $product->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="sherah-btn default">Bid Now</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Single Product -->
                                                        </div>
                                                    @endforeach
                                                @else
                                                @endif
                                            </div>
                                            <div class="row mg-top-40">
                                                <div class="sherah-pagination">
                                                    <ul class="sherah-pagination__list">
                                                        <!-- Previous Page Link -->
                                                        @if ($products->onFirstPage())
                                                            <li class="sherah-pagination__button"><a><i
                                                                        class="fas fa-angle-left"></i></a></li>
                                                        @else
                                                            <li class="sherah-pagination__button"><a
                                                                    href="{{ $products->previousPageUrl() }}"><i
                                                                        class="fas fa-angle-left"></i></a></li>
                                                        @endif

                                                        <!-- Page Number Links -->
                                                        @foreach ($products->links()->elements[0] as $page => $url)
                                                            <li
                                                                class="{{ $products->currentPage() == $page ? 'active' : '' }}">
                                                                <a href="{{ $url }}">{{ $page }}</a>
                                                            </li>
                                                        @endforeach

                                                        <!-- Next Page Link -->
                                                        @if ($products->hasMorePages())
                                                            <li class="sherah-pagination__button"><a
                                                                    href="{{ $products->nextPageUrl() }}"><i
                                                                        class="fas fa-angle-right"></i></a></li>
                                                        @else
                                                            <li class="sherah-pagination__button"><a><i
                                                                        class="fas fa-angle-right"></i></a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="tab_2" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <div class="row">

                                                <div class="col-xxl-4 col-lg-6 col-md-6 col-12">
                                                    <!-- Single Product -->
                                                    <div
                                                        class="sherah-product-card sherah-product-card__v2  sherah-default-bg sherah-border mg-top-30">
                                                        <!-- Card Image -->
                                                        <div class="sherah-product-card__img">
                                                            <img src="{{ asset('backend/assets/img/product-img7.png') }}">
                                                            <div class="sherah-product-card__buttons">
                                                                <a class="sherah-product-card__buttons--single sherah-default-bg sherah-border"
                                                                    href="#">
                                                                    <svg class="sherah-default__fill sherah-default__heart"
                                                                        xmlns="http://www.w3.org/2000/svg" width="21.559"
                                                                        height="19.349" viewBox="0 0 21.559 19.349">
                                                                        <path id="Path_533" data-name="Path 533"
                                                                            d="M111.852,15.093v.924a1.034,1.034,0,0,0-.03.135,7.2,7.2,0,0,1-1.211,3.339,14.326,14.326,0,0,1-2.5,2.868c-1.887,1.684-3.8,3.337-5.713,4.994a1.2,1.2,0,0,1-1.7-.04q-2.192-1.885-4.378-3.777a22.751,22.751,0,0,1-3.411-3.5,7.509,7.509,0,0,1-1.514-3.347,6.362,6.362,0,0,1,1.4-5.335,5.368,5.368,0,0,1,5.028-1.9,5.245,5.245,0,0,1,3.221,1.768c.184.2.352.414.539.635.092-.119.171-.225.255-.327s.18-.216.277-.318a5.235,5.235,0,0,1,5.72-1.543,5.583,5.583,0,0,1,3.813,4.222C111.746,14.284,111.784,14.692,111.852,15.093Z"
                                                                            transform="translate(-90.794 -8.871)"
                                                                            stroke-width="1" />
                                                                    </svg>
                                                                </a>
                                                                <a class="sherah-product-card__buttons--single sherah-default-bg sherah-border"
                                                                    href="#">
                                                                    <svg class="sherah-default__fill"
                                                                        xmlns="http://www.w3.org/2000/svg" width="15.671"
                                                                        height="15.67" viewBox="0 0 15.671 15.67">
                                                                        <g id="View_full" data-name="View full"
                                                                            transform="translate(0 -0.33)">
                                                                            <path id="Path_529" data-name="Path 529"
                                                                                d="M0,2.448V4.566H1.093V2.221L3.621,4.749,6.15,7.277l.4-.4.4-.4L4.419,3.952,1.89,1.423H4.236V.33H0Z" />
                                                                            <path id="Path_530" data-name="Path 530"
                                                                                d="M11.435.877v.547h2.346L11.253,3.952,8.725,6.48l.4.4.4.4L12.05,4.749l2.528-2.528V4.566h1.093V.33H11.435Z" />
                                                                            <path id="Path_531" data-name="Path 531"
                                                                                d="M3.608,11.59,1.093,14.11V11.764H0V16H4.236V14.907H1.89l2.528-2.528L6.947,9.85,6.56,9.463a4.274,4.274,0,0,0-.41-.387C6.136,9.076,4.993,10.21,3.608,11.59Z" />
                                                                            <path id="Path_532" data-name="Path 532"
                                                                                d="M9.112,9.463l-.387.387,2.528,2.528,2.528,2.528H11.435V16h4.236V11.764H14.578V14.11L12.059,11.59c-1.38-1.38-2.524-2.514-2.537-2.514A4.273,4.273,0,0,0,9.112,9.463Z" />
                                                                        </g>
                                                                    </svg>
                                                                </a>
                                                                <a class="sherah-product-card__buttons--single sherah-default-bg sherah-border"
                                                                    href="#">
                                                                    <svg class="sherah-default__fill"
                                                                        xmlns="http://www.w3.org/2000/svg" width="18"
                                                                        height="20" viewBox="0 0 18 20">
                                                                        <g id="Com" transform="translate(-0.268 0)">
                                                                            <path id="Path_527" data-name="Path 527"
                                                                                d="M7.895.663a4.9,4.9,0,0,1-.024.662c-.012,0-.206.035-.425.082A8.8,8.8,0,0,0,.334,8.8,9.839,9.839,0,0,0,.45,11.808a8.86,8.86,0,0,0,3.875,5.507l.226.14.56-.413a6.464,6.464,0,0,0,.56-.436.953.953,0,0,0-.218-.136,7.762,7.762,0,0,1-1.934-1.524,7.446,7.446,0,0,1-1.878-3.917,9.631,9.631,0,0,1,0-2.085,7.5,7.5,0,0,1,1.116-2.95A7.776,7.776,0,0,1,5.751,3.352a8.609,8.609,0,0,1,2.017-.678l.127-.023V3.2a3.624,3.624,0,0,0,.02.546c.04,0,2.521-1.843,2.521-1.871S7.954,0,7.915,0A5.311,5.311,0,0,0,7.895.663Z"
                                                                                transform="translate(0 0)" />
                                                                            <path id="Path_528" data-name="Path 528"
                                                                                d="M13.219,2.958a3.6,3.6,0,0,0-.54.44,1.467,1.467,0,0,0,.27.168,7.818,7.818,0,0,1,2.918,2.95,7.809,7.809,0,0,1,.842,2.615,8.959,8.959,0,0,1-.1,2.362,7.546,7.546,0,0,1-4.848,5.514,10.126,10.126,0,0,1-1.275.343c-.044,0-.056-.1-.056-.546a3.622,3.622,0,0,0-.02-.546c-.04,0-2.521,1.843-2.521,1.871S10.376,20,10.416,20a5.307,5.307,0,0,0,.02-.662v-.659l.151-.023a14,14,0,0,0,1.755-.468A8.765,8.765,0,0,0,18,11.154a9.922,9.922,0,0,0-.119-2.962,8.86,8.86,0,0,0-3.875-5.507l-.226-.14Z"
                                                                                transform="translate(0.206)" />
                                                                        </g>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- Card Content -->
                                                        <div
                                                            class="sherah-product-card__content sherah-dflex-column sherah-flex-gap-5">
                                                            <h4 class="sherah-product-card__title">
                                                                <a href="product-detail.html" class="sherah-pcolor">Luxury
                                                                    Woman Leather Hand Bag</a>
                                                            </h4>
                                                            <div class="sherah-product__bottom">
                                                                <div class="sherah-product__bottom--single">
                                                                    <h5 class="sherah-product-card__price">
                                                                        <del>$155</del>$135
                                                                    </h5>
                                                                    <div
                                                                        class="sherah-product-card__meta sherah-dflex sherah-flex-gap-30">
                                                                        <div
                                                                            class="sherah-product-card__rating sherah-dflex sherah-flex-gap-5">
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            (33)
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="product-detail.html"
                                                                    class="sherah-btn default">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Product -->
                                                </div>
                                                <div class="col-xxl-4 col-lg-6 col-md-6 col-12">
                                                    <!-- Single Product -->
                                                    <div
                                                        class="sherah-product-card sherah-product-card__v2  sherah-default-bg sherah-border mg-top-30">
                                                        <!-- Card Image -->
                                                        <div class="sherah-product-card__img">
                                                            <img src="{{ asset('backend/assets/img/product-img8.png') }}">
                                                            <div class="sherah-product-card__buttons">
                                                                <a class="sherah-product-card__buttons--single sherah-default-bg sherah-border"
                                                                    href="#">
                                                                    <svg class="sherah-default__fill sherah-default__heart"
                                                                        xmlns="http://www.w3.org/2000/svg" width="21.559"
                                                                        height="19.349" viewBox="0 0 21.559 19.349">
                                                                        <path id="Path_533" data-name="Path 533"
                                                                            d="M111.852,15.093v.924a1.034,1.034,0,0,0-.03.135,7.2,7.2,0,0,1-1.211,3.339,14.326,14.326,0,0,1-2.5,2.868c-1.887,1.684-3.8,3.337-5.713,4.994a1.2,1.2,0,0,1-1.7-.04q-2.192-1.885-4.378-3.777a22.751,22.751,0,0,1-3.411-3.5,7.509,7.509,0,0,1-1.514-3.347,6.362,6.362,0,0,1,1.4-5.335,5.368,5.368,0,0,1,5.028-1.9,5.245,5.245,0,0,1,3.221,1.768c.184.2.352.414.539.635.092-.119.171-.225.255-.327s.18-.216.277-.318a5.235,5.235,0,0,1,5.72-1.543,5.583,5.583,0,0,1,3.813,4.222C111.746,14.284,111.784,14.692,111.852,15.093Z"
                                                                            transform="translate(-90.794 -8.871)"
                                                                            stroke-width="1" />
                                                                    </svg>
                                                                </a>
                                                                <a class="sherah-product-card__buttons--single sherah-default-bg sherah-border"
                                                                    href="#">
                                                                    <svg class="sherah-default__fill"
                                                                        xmlns="http://www.w3.org/2000/svg" width="15.671"
                                                                        height="15.67" viewBox="0 0 15.671 15.67">
                                                                        <g id="View_full" data-name="View full"
                                                                            transform="translate(0 -0.33)">
                                                                            <path id="Path_529" data-name="Path 529"
                                                                                d="M0,2.448V4.566H1.093V2.221L3.621,4.749,6.15,7.277l.4-.4.4-.4L4.419,3.952,1.89,1.423H4.236V.33H0Z" />
                                                                            <path id="Path_530" data-name="Path 530"
                                                                                d="M11.435.877v.547h2.346L11.253,3.952,8.725,6.48l.4.4.4.4L12.05,4.749l2.528-2.528V4.566h1.093V.33H11.435Z" />
                                                                            <path id="Path_531" data-name="Path 531"
                                                                                d="M3.608,11.59,1.093,14.11V11.764H0V16H4.236V14.907H1.89l2.528-2.528L6.947,9.85,6.56,9.463a4.274,4.274,0,0,0-.41-.387C6.136,9.076,4.993,10.21,3.608,11.59Z" />
                                                                            <path id="Path_532" data-name="Path 532"
                                                                                d="M9.112,9.463l-.387.387,2.528,2.528,2.528,2.528H11.435V16h4.236V11.764H14.578V14.11L12.059,11.59c-1.38-1.38-2.524-2.514-2.537-2.514A4.273,4.273,0,0,0,9.112,9.463Z" />
                                                                        </g>
                                                                    </svg>
                                                                </a>
                                                                <a class="sherah-product-card__buttons--single sherah-default-bg sherah-border"
                                                                    href="#">
                                                                    <svg class="sherah-default__fill"
                                                                        xmlns="http://www.w3.org/2000/svg" width="18"
                                                                        height="20" viewBox="0 0 18 20">
                                                                        <g id="Com" transform="translate(-0.268 0)">
                                                                            <path id="Path_527" data-name="Path 527"
                                                                                d="M7.895.663a4.9,4.9,0,0,1-.024.662c-.012,0-.206.035-.425.082A8.8,8.8,0,0,0,.334,8.8,9.839,9.839,0,0,0,.45,11.808a8.86,8.86,0,0,0,3.875,5.507l.226.14.56-.413a6.464,6.464,0,0,0,.56-.436.953.953,0,0,0-.218-.136,7.762,7.762,0,0,1-1.934-1.524,7.446,7.446,0,0,1-1.878-3.917,9.631,9.631,0,0,1,0-2.085,7.5,7.5,0,0,1,1.116-2.95A7.776,7.776,0,0,1,5.751,3.352a8.609,8.609,0,0,1,2.017-.678l.127-.023V3.2a3.624,3.624,0,0,0,.02.546c.04,0,2.521-1.843,2.521-1.871S7.954,0,7.915,0A5.311,5.311,0,0,0,7.895.663Z"
                                                                                transform="translate(0 0)" />
                                                                            <path id="Path_528" data-name="Path 528"
                                                                                d="M13.219,2.958a3.6,3.6,0,0,0-.54.44,1.467,1.467,0,0,0,.27.168,7.818,7.818,0,0,1,2.918,2.95,7.809,7.809,0,0,1,.842,2.615,8.959,8.959,0,0,1-.1,2.362,7.546,7.546,0,0,1-4.848,5.514,10.126,10.126,0,0,1-1.275.343c-.044,0-.056-.1-.056-.546a3.622,3.622,0,0,0-.02-.546c-.04,0-2.521,1.843-2.521,1.871S10.376,20,10.416,20a5.307,5.307,0,0,0,.02-.662v-.659l.151-.023a14,14,0,0,0,1.755-.468A8.765,8.765,0,0,0,18,11.154a9.922,9.922,0,0,0-.119-2.962,8.86,8.86,0,0,0-3.875-5.507l-.226-.14Z"
                                                                                transform="translate(0.206)" />
                                                                        </g>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- Card Content -->
                                                        <div
                                                            class="sherah-product-card__content sherah-dflex-column sherah-flex-gap-5">
                                                            <h4 class="sherah-product-card__title">
                                                                <a href="product-detail.html" class="sherah-pcolor">Summer
                                                                    Tank Top Vest</a>
                                                            </h4>
                                                            <div class="sherah-product__bottom">
                                                                <div class="sherah-product__bottom--single">
                                                                    <h5 class="sherah-product-card__price">
                                                                        <del>$140</del>$120
                                                                    </h5>
                                                                    <div
                                                                        class="sherah-product-card__meta sherah-dflex sherah-flex-gap-30">
                                                                        <div
                                                                            class="sherah-product-card__rating sherah-dflex sherah-flex-gap-5">
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            (33)
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="product-detail.html"
                                                                    class="sherah-btn default">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Product -->
                                                </div>
                                                <div class="col-xxl-4 col-lg-6 col-md-6 col-12">
                                                    <!-- Single Product -->
                                                    <div
                                                        class="sherah-product-card sherah-product-card__v2  sherah-default-bg sherah-border mg-top-30">
                                                        <!-- Card Image -->
                                                        <div class="sherah-product-card__img">
                                                            <img src="{{ asset('backend/assets/img/product-img9.png') }}">
                                                            <div class="sherah-product-card__buttons">
                                                                <a class="sherah-product-card__buttons--single sherah-default-bg sherah-border"
                                                                    href="#">
                                                                    <svg class="sherah-default__fill sherah-default__heart"
                                                                        xmlns="http://www.w3.org/2000/svg" width="21.559"
                                                                        height="19.349" viewBox="0 0 21.559 19.349">
                                                                        <path id="Path_533" data-name="Path 533"
                                                                            d="M111.852,15.093v.924a1.034,1.034,0,0,0-.03.135,7.2,7.2,0,0,1-1.211,3.339,14.326,14.326,0,0,1-2.5,2.868c-1.887,1.684-3.8,3.337-5.713,4.994a1.2,1.2,0,0,1-1.7-.04q-2.192-1.885-4.378-3.777a22.751,22.751,0,0,1-3.411-3.5,7.509,7.509,0,0,1-1.514-3.347,6.362,6.362,0,0,1,1.4-5.335,5.368,5.368,0,0,1,5.028-1.9,5.245,5.245,0,0,1,3.221,1.768c.184.2.352.414.539.635.092-.119.171-.225.255-.327s.18-.216.277-.318a5.235,5.235,0,0,1,5.72-1.543,5.583,5.583,0,0,1,3.813,4.222C111.746,14.284,111.784,14.692,111.852,15.093Z"
                                                                            transform="translate(-90.794 -8.871)"
                                                                            stroke-width="1" />
                                                                    </svg>
                                                                </a>
                                                                <a class="sherah-product-card__buttons--single sherah-default-bg sherah-border"
                                                                    href="#">
                                                                    <svg class="sherah-default__fill"
                                                                        xmlns="http://www.w3.org/2000/svg" width="15.671"
                                                                        height="15.67" viewBox="0 0 15.671 15.67">
                                                                        <g id="View_full" data-name="View full"
                                                                            transform="translate(0 -0.33)">
                                                                            <path id="Path_529" data-name="Path 529"
                                                                                d="M0,2.448V4.566H1.093V2.221L3.621,4.749,6.15,7.277l.4-.4.4-.4L4.419,3.952,1.89,1.423H4.236V.33H0Z" />
                                                                            <path id="Path_530" data-name="Path 530"
                                                                                d="M11.435.877v.547h2.346L11.253,3.952,8.725,6.48l.4.4.4.4L12.05,4.749l2.528-2.528V4.566h1.093V.33H11.435Z" />
                                                                            <path id="Path_531" data-name="Path 531"
                                                                                d="M3.608,11.59,1.093,14.11V11.764H0V16H4.236V14.907H1.89l2.528-2.528L6.947,9.85,6.56,9.463a4.274,4.274,0,0,0-.41-.387C6.136,9.076,4.993,10.21,3.608,11.59Z" />
                                                                            <path id="Path_532" data-name="Path 532"
                                                                                d="M9.112,9.463l-.387.387,2.528,2.528,2.528,2.528H11.435V16h4.236V11.764H14.578V14.11L12.059,11.59c-1.38-1.38-2.524-2.514-2.537-2.514A4.273,4.273,0,0,0,9.112,9.463Z" />
                                                                        </g>
                                                                    </svg>
                                                                </a>
                                                                <a class="sherah-product-card__buttons--single sherah-default-bg sherah-border"
                                                                    href="#">
                                                                    <svg class="sherah-default__fill"
                                                                        xmlns="http://www.w3.org/2000/svg" width="18"
                                                                        height="20" viewBox="0 0 18 20">
                                                                        <g id="Com" transform="translate(-0.268 0)">
                                                                            <path id="Path_527" data-name="Path 527"
                                                                                d="M7.895.663a4.9,4.9,0,0,1-.024.662c-.012,0-.206.035-.425.082A8.8,8.8,0,0,0,.334,8.8,9.839,9.839,0,0,0,.45,11.808a8.86,8.86,0,0,0,3.875,5.507l.226.14.56-.413a6.464,6.464,0,0,0,.56-.436.953.953,0,0,0-.218-.136,7.762,7.762,0,0,1-1.934-1.524,7.446,7.446,0,0,1-1.878-3.917,9.631,9.631,0,0,1,0-2.085,7.5,7.5,0,0,1,1.116-2.95A7.776,7.776,0,0,1,5.751,3.352a8.609,8.609,0,0,1,2.017-.678l.127-.023V3.2a3.624,3.624,0,0,0,.02.546c.04,0,2.521-1.843,2.521-1.871S7.954,0,7.915,0A5.311,5.311,0,0,0,7.895.663Z"
                                                                                transform="translate(0 0)" />
                                                                            <path id="Path_528" data-name="Path 528"
                                                                                d="M13.219,2.958a3.6,3.6,0,0,0-.54.44,1.467,1.467,0,0,0,.27.168,7.818,7.818,0,0,1,2.918,2.95,7.809,7.809,0,0,1,.842,2.615,8.959,8.959,0,0,1-.1,2.362,7.546,7.546,0,0,1-4.848,5.514,10.126,10.126,0,0,1-1.275.343c-.044,0-.056-.1-.056-.546a3.622,3.622,0,0,0-.02-.546c-.04,0-2.521,1.843-2.521,1.871S10.376,20,10.416,20a5.307,5.307,0,0,0,.02-.662v-.659l.151-.023a14,14,0,0,0,1.755-.468A8.765,8.765,0,0,0,18,11.154a9.922,9.922,0,0,0-.119-2.962,8.86,8.86,0,0,0-3.875-5.507l-.226-.14Z"
                                                                                transform="translate(0.206)" />
                                                                        </g>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- Card Content -->
                                                        <div
                                                            class="sherah-product-card__content sherah-dflex-column sherah-flex-gap-5">
                                                            <h4 class="sherah-product-card__title">
                                                                <a href="product-detail.html" class="sherah-pcolor">Luxury
                                                                    T-shirt For men</a>
                                                            </h4>
                                                            <div class="sherah-product__bottom">
                                                                <div class="sherah-product__bottom--single">
                                                                    <h5 class="sherah-product-card__price">$120</h5>
                                                                    <div
                                                                        class="sherah-product-card__meta sherah-dflex sherah-flex-gap-30">
                                                                        <div
                                                                            class="sherah-product-card__rating sherah-dflex sherah-flex-gap-5">
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            <span class="sherah-color4"><i
                                                                                    class="fa fa-star"></i></span>
                                                                            (33)
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="product-detail.html"
                                                                    class="sherah-btn default">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Product -->
                                                </div>
                                            </div>
                                            <div class="row mg-top-40">
                                                <div class="sherah-pagination">
                                                    <ul class="sherah-pagination__list">
                                                        <li class="sherah-pagination__button"><a href="#"><i
                                                                    class="fas fa-angle-left"></i></a></li>
                                                        <li><a href="#">01</a></li>
                                                        <li class="active"><a href="#">02</a></li>
                                                        <li><a href="#">03</a></li>
                                                        <li><a href="#">04</a></li>
                                                        <li><a href="#">05</a></li>
                                                        <li class="sherah-pagination__button"><a href="#"><i
                                                                    class="fas fa-angle-right"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End sherah Dashboard -->
@endsection
