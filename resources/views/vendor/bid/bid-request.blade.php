@extends('vendor.index')
@section('vendor')
    <!-- sherah Dashboard -->
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Dashboard Inner -->
                        <div class="sherah-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sherah-breadcrumb mg-top-30">
                                        <h2 class="sherah-breadcrumb__title">Bid Request</h2>
                                        <ul class="sherah-breadcrumb__list">
                                            <li><a href="{{ route('vendor.dashboard') }}">Home</a></li>
                                            <li class="active"><a href="{{ route('vendor.bid.request') }}">Bid List</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                                <div class="sherah-table p-0">
                                    <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                        <!-- sherah Table Head -->
                                        <thead class="sherah-table__head">
                                            <tr>
                                                <th class="sherah-table__column-7 sherah-table__h6">Created On</th>
                                                <th class="sherah-table__column-2 sherah-table__h2">Customer</th>
                                                <th class="sherah-table__column-1 sherah-table__h1">Image</th>
                                                <th class="sherah-table__column-3 sherah-table__h3">Product</th>
                                                <th class="sherah-table__column-4 sherah-table__h4">Bid Amount</th>
                                                <th class="sherah-table__column-5 sherah-table__h5">Status</th>
                                                <th class="sherah-table__column-8 sherah-table__h7">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sherah-table__body">
                                            @if (count($vendorbidrequests) > 0)
                                                @foreach ($vendorbidrequests as $bidRequest)
                                                    <tr>
                                                        <td class="sherah-table__column-7 sherah-table__data-7">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    {{ $bidRequest->created_at->format('d/m/Y') ?? '--' }}
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-2 sherah-table__data-2">
                                                            <div class="sherah-table__vendor">
                                                                <h4 class="sherah-table__vendor--title"><a
                                                                        href="#">{{ $bidRequest->customer->name ?? '--' }}</a>
                                                                </h4>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-1 sherah-table__data-1">
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="sherah-table__vendor-img">
                                                                    <img src="{{ asset('upload/admin_images/' . $bidRequest->image_path) }}"
                                                                        alt="Category Image" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-3 sherah-table__data-3">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    @if ($bidRequest->type == 'Selected Product')
                                                                        {{ $bidRequest->product->name ?? '--' }}
                                                                    @else
                                                                        {{ $bidRequest->description ?? '--' }}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-4 sherah-table__data-4">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    {{ number_format($bidRequest->target_price, 2) ?? '--' }}
                                                                    TK
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-5 sherah-table__data-5">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    {{ ucfirst($bidRequest->bid_status) ?? '--' }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-8 sherah-table__data-8">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center gap-2">
                                                                <a href="{{ route('vendor.bid.request.details', $bidRequest->id) }}"
                                                                    class="btn btn-outline-primary d-flex align-items-center gap-1">
                                                                    <i class="fas fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
