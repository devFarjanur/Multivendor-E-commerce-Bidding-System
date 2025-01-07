@extends('vendor.index')
@section('vendor')
    <!-- Vendor Place Bid -->
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Breadcrumb -->
                        <div class="sherah-breadcrumb mg-top-30">
                            <h2 class="sherah-breadcrumb__title">Place Your Bid</h2>
                            <ul class="sherah-breadcrumb__list">
                                <li><a href="{{ route('vendor.dashboard') }}">Home</a></li>
                                <li class="active"><a href="{{ route('vendor.place.bid') }}">Place Bid</a></li>
                            </ul>
                        </div>

                        <!-- Bid Request Details -->
                        <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="sherah-page-title">Bid Request Details</h3>
                                    <div class="sherah-bid-request">
                                        <p><strong>Customer:</strong> {{ $bidRequest->customer->name ?? '--' }}</p>
                                        <p><strong>Type:</strong> {{ ucfirst($bidRequest->type) }}</p>
                                        @if ($bidRequest->type == 'Selected Product')
                                            <p><strong>Product:</strong> {{ $bidRequest->product->name ?? '--' }}</p>
                                            <p><strong>Price:</strong> {{ $bidRequest->target_price ?? '--' }} TK</p>
                                            <p><strong>Image:</strong>
                                                <img src="{{ asset('upload/admin_images/' . $bidRequest->product->image) }}"
                                                    alt="Request Image" class="img-fluid" style="max-width: 200px;">
                                            </p>
                                        @else
                                            <p><strong>Description:</strong> {{ $bidRequest->description ?? '--' }}</p>
                                            <p><strong>Category:</strong> {{ $bidRequest->category->name ?? '--' }}</p>
                                            <p><strong>Subcategory:</strong> {{ $bidRequest->subcategory->name ?? '--' }}
                                            </p>
                                            <p><strong>Target Price:</strong> {{ $bidRequest->target_price ?? '--' }} TK
                                            </p>
                                            <p><strong>Image:</strong>
                                                <img src="{{ asset('upload/admin_images/' . $bidRequest->image_path) }}"
                                                    alt="Request Image" class="img-fluid" style="max-width: 200px;">
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Vendor Bid Form -->
                        <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                            <h3 class="sherah-page-title">Submit Your Bid</h3>
                            <form action="{{ route('vendor.submit.bid', $bidRequest->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="bid_price">Your Bid Price (TK):</label>
                                    <input type="number" step="0.01" name="bid_price" id="bid_price"
                                        class="form-control" placeholder="Enter your bid price" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Bid</button>
                            </form>
                        </div>

                        <!-- All Vendors’ Bids -->
                        <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                            <h3 class="sherah-page-title">All Vendors’ Bids</h3>
                            <table class="sherah-table__main sherah-table__main-v3">
                                <thead>
                                    <tr>
                                        <th class="sherah-table__column-1">Vendor</th>
                                        <th class="sherah-table__column-2">Bid Price</th>
                                        <th class="sherah-table__column-3">Submitted At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bids as $bid)
                                        <tr>
                                            <td class="sherah-table__data-1">{{ $bid->vendor->name ?? '--' }}</td>
                                            <td class="sherah-table__data-2">
                                                {{ number_format($bid->bid_price, 2) ?? '--' }} TK
                                            </td>
                                            <td class="sherah-table__data-3">
                                                {{ $bid->created_at->format('d/m/Y H:i') ?? '--' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
