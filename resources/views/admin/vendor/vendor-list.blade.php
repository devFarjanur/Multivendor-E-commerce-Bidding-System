@extends('admin.index')
@section('admin')
    <!-- sherah Dashboard -->
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Dashboard Inner -->
                        <div class="sherah-dsinner">
                            <div class="sherah-teams mg-top-40">
                                <div class="row">
                                    <div class="col-12 sherah-flex-between">
                                        <!-- Sherah Breadcrumb -->
                                        <div class="sherah-breadcrumb">
                                            <h2 class="sherah-breadcrumb__title">Vendors</h2>
                                            <ul class="sherah-breadcrumb__list">
                                                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                                <li class="active"><a href="{{ route('admin.vendor.list') }}">Vendor
                                                        List</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Sherah Breadcrumb -->
                                        {{-- <a href="#" class="sherah-btn sherah-gbcolor">Add Vendor</a> --}}
                                    </div>
                                </div>

                                <div class="row">
                                    @if (count($vendors) > 0)
                                        @foreach ($vendors as $vendor)
                                            <div class="col-xxl-3 col-lg-4 col-md-6 col-12">
                                                <!-- Sherah Vcard -->
                                                <div class="sherah-vcard sherah-default-bg sherah-border mg-top-30">
                                                    <!-- Sherah Card Body -->
                                                    <div class="sherah-vcard__body">
                                                        <div class="sherah-vcard__img">
                                                            <img src="{{ asset('backend/assets/img/vendor-1.png') }}"
                                                                alt="#">
                                                        </div>
                                                        <div class="sherah-vcard__content">
                                                            <h4 class="sherah-vcard__title">
                                                                {{ $vendor->user->name ?? '--' }}</h4>
                                                            <ul class="sherah-vcard__contact">
                                                                <li><a href="#">
                                                                        <svg class="sherah-color1__fill"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="13.983" height="13.981"
                                                                            viewBox="0 0 13.983 13.981">
                                                                            <path id="Path_468" data-name="Path 468"
                                                                                d="M243.018,85.567c0,.4,0,.8,0,1.2a1.111,1.111,0,0,1-1.184,1.18,12.682,12.682,0,0,1-11.3-6.853,12.1,12.1,0,0,1-1.5-5.83,1.144,1.144,0,0,1,1.262-1.3q1.16,0,2.32,0a1.129,1.129,0,0,1,1.227,1.2,8.25,8.25,0,0,0,.362,2.282,1.287,1.287,0,0,1-.255,1.32c-.358.423-.668.886-1.009,1.323a.281.281,0,0,0-.028.36,8.757,8.757,0,0,0,3.635,3.627.263.263,0,0,0,.337-.029c.474-.368.958-.724,1.432-1.091a1.118,1.118,0,0,1,1.052-.211,9.653,9.653,0,0,0,2.55.406,1.1,1.1,0,0,1,1.094,1.131C243.026,84.712,243.018,85.139,243.018,85.567Z"
                                                                                transform="translate(-229.038 -73.968)" />
                                                                        </svg>{{ $vendor->user->phone ?? '--' }}</a>
                                                                </li>
                                                                <li>
                                                                    <a href="mailto:infoyour@gmail.com">
                                                                        <svg class="sherah-color1__fill"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="13.98" height="14.033"
                                                                            viewBox="0 0 13.98 14.033">
                                                                            <g id="Group_131" data-name="Group 131"
                                                                                transform="translate(-219.859 -62.544)">
                                                                                <path id="Path_472" data-name="Path 472"
                                                                                    d="M271.363,95.475h3.71c.626,0,.7.079.7.716,0,1.447,0,2.894,0,4.342a.459.459,0,0,1-.2.413c-.844.645-1.677,1.3-2.522,1.948a.71.71,0,0,1-.393.137q-1.291.018-2.583,0a.664.664,0,0,1-.371-.122q-1.289-.983-2.558-1.991a.523.523,0,0,1-.172-.359c-.012-1.493-.008-2.986-.007-4.479,0-.486.116-.6.594-.605Zm.637,5.474a3.893,3.893,0,0,0,.7.341,1.257,1.257,0,0,0,1.345-.694,2.636,2.636,0,0,0,.269-1.913,3.02,3.02,0,1,0-3.112,3.8c.349.016.57-.177.522-.467-.044-.264-.23-.339-.476-.359a2.2,2.2,0,0,1-1.7-3.381,2.155,2.155,0,0,1,2.948-.685.478.478,0,0,0-.623.271,1.437,1.437,0,0,0-1.921.8A2.33,2.33,0,0,0,269.8,99.7,1.44,1.44,0,0,0,272,100.949Z"
                                                                                    transform="translate(-44.527 -31.12)" />
                                                                                <path id="Path_473" data-name="Path 473"
                                                                                    d="M243.053,251.784H230.261c.094-.08.151-.133.213-.181q2.254-1.754,4.512-3.5a.749.749,0,0,1,.418-.145c.86-.013,1.721-.01,2.582,0a.571.571,0,0,1,.325.1q2.348,1.812,4.686,3.636a.367.367,0,0,0,.1.038Z"
                                                                                    transform="translate(-9.83 -175.207)" />
                                                                                <path id="Path_474" data-name="Path 474"
                                                                                    d="M219.859,174.433l4.671,3.633-4.671,3.633Z"
                                                                                    transform="translate(0 -105.737)" />
                                                                                <path id="Path_475" data-name="Path 475"
                                                                                    d="M389.225,178.113l4.667-3.63v7.26Z"
                                                                                    transform="translate(-160.053 -105.784)" />
                                                                                <path id="Path_476" data-name="Path 476"
                                                                                    d="M325.243,63.516h-2.686c.416-.344.766-.661,1.148-.931a.487.487,0,0,1,.446.032C324.512,62.877,324.843,63.18,325.243,63.516Z"
                                                                                    transform="translate(-97.051 0)" />
                                                                                <path id="Path_477" data-name="Path 477"
                                                                                    d="M442.145,142.025v-2.23l1.378,1.157Z"
                                                                                    transform="translate(-210.063 -73.003)" />
                                                                                <path id="Path_478" data-name="Path 478"
                                                                                    d="M228.2,139.874v2.218l-1.369-1.064Z"
                                                                                    transform="translate(-6.59 -73.078)" />
                                                                                <path id="Path_479" data-name="Path 479"
                                                                                    d="M334.105,152.656a3.655,3.655,0,0,1-.262.637.469.469,0,0,1-.756.075,1.118,1.118,0,0,1-.1-1.389.55.55,0,0,1,.984.143A4.005,4.005,0,0,1,334.105,152.656Z"
                                                                                    transform="translate(-106.725 -84.286)" />
                                                                                <path id="Path_480" data-name="Path 480"
                                                                                    d="M370.08,135.548a1.9,1.9,0,0,1,.681,2.51.7.7,0,0,1-.225.232c-.245.152-.407.061-.408-.227,0-.649.006-1.3,0-1.947C370.128,135.922,370.1,135.727,370.08,135.548Z"
                                                                                    transform="translate(-141.961 -68.99)" />
                                                                            </g>
                                                                        </svg>{{ $vendor->user->email }}</a>
                                                                </li>
                                                            </ul>
                                                            {{-- <a href="{{ route('admin.vendor.profile') }}"
                                                                class="sherah-btn sherah-gbcolor d-flex justify-content-center align-items-center">
                                                                View Details
                                                            </a> --}}
                                                            <a class="btn fw-bold" href="{{ route('admin.vendor.profile') }}" style="background-color: #6176FE; color: white;">
                                                                View Details
                                                            </a>                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Sherah Card Body -->
                                                    <div class="sherah-vcard__meta sherah-border-top">
                                                        <ul class="sherah-vcard__meta--info">
                                                            <li>Items <span>120</span></li>
                                                            <li><svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="1" height="69" viewBox="0 0 1 69">
                                                                    <defs>
                                                                        <linearGradient id="linear-gradient" x1="0.5"
                                                                            x2="0.5" y2="1"
                                                                            gradientUnits="objectBoundingBox">
                                                                            <stop offset="0" stop-color="#fff" />
                                                                            <stop offset="0.506" stop-color="#e2e7f1" />
                                                                            <stop offset="1" stop-color="#fff" />
                                                                        </linearGradient>
                                                                    </defs>
                                                                    <path id="Path_1274" data-name="Path 1274"
                                                                        d="M0,0H1V69H0Z" fill="url(#linear-gradient)" />
                                                                </svg>
                                                            </li>
                                                            <li>Sells <span>11250</span></li>
                                                            <li><svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="1" height="69" viewBox="0 0 1 69">
                                                                    <defs>
                                                                        <linearGradient id="linear-gradient" x1="0.5"
                                                                            x2="0.5" y2="1"
                                                                            gradientUnits="objectBoundingBox">
                                                                            <stop offset="0" stop-color="#fff" />
                                                                            <stop offset="0.506" stop-color="#e2e7f1" />
                                                                            <stop offset="1" stop-color="#fff" />
                                                                        </linearGradient>
                                                                    </defs>
                                                                    <path id="Path_1274" data-name="Path 1274"
                                                                        d="M0,0H1V69H0Z" fill="url(#linear-gradient)" />
                                                                </svg>
                                                            </li>
                                                            <li>Earning <span>92852</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    @endif
                                </div>
                                {{-- <div class="row mg-top-40">
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
                                </div> --}}

                                <div class="row mg-top-40">
                                    <div class="sherah-pagination">
                                        <ul class="sherah-pagination__list">
                                            <!-- Previous Page Link -->
                                            @if ($vendors->onFirstPage())
                                                <li class="sherah-pagination__button"><a><i
                                                            class="fas fa-angle-left"></i></a></li>
                                            @else
                                                <li class="sherah-pagination__button"><a
                                                        href="{{ $vendors->previousPageUrl() }}"><i
                                                            class="fas fa-angle-left"></i></a></li>
                                            @endif

                                            <!-- Page Number Links -->
                                            @foreach ($vendors->links()->elements[0] as $page => $url)
                                                <li class="{{ $vendors->currentPage() == $page ? 'active' : '' }}">
                                                    <a href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            <!-- Next Page Link -->
                                            @if ($vendors->hasMorePages())
                                                <li class="sherah-pagination__button"><a
                                                        href="{{ $vendors->nextPageUrl() }}"><i
                                                            class="fas fa-angle-right"></i></a></li>
                                            @else
                                                <li class="sherah-pagination__button"><a><i
                                                            class="fas fa-angle-right"></i></a></li>
                                            @endif
                                        </ul>
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
