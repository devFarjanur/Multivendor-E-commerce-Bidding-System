@extends('customer.index')
@section('customer')
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Bootstrap Bundle with JavaScript -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> --}}

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
                                <li><a href="{{ route('customer.product.list') }}">Home</a></li>
                                <li class="active"><a
                                        href="{{ route('customer.bid.request.details', $bidRequest->id) }}">Place
                                        Bid</a></li>
                            </ul>
                        </div>

                        <!-- Bid Request Details -->
                        <div class="container my-5 p-4 bg-light border rounded shadow">
                            <h3 class="text-primary mb-4">Bid Request Details</h3>
                            <div>
                                <p><strong>Customer:</strong> {{ $bidRequest->customer->name ?? '--' }}</p>
                                <p><strong>Type:</strong> {{ ucfirst($bidRequest->type) }}</p>
                                @if ($bidRequest->type == 'Selected Product')
                                    <p><strong>Product:</strong> {{ $bidRequest->product->name ?? '--' }}</p>
                                    <p><strong>Price:</strong> {{ $bidRequest->target_price ?? '--' }} TK</p>
                                    <p><strong>Image:</strong></p>
                                    <img src="{{ asset('upload/admin_images/' . $bidRequest->product->image) }}"
                                        alt="Request Image" class="img-thumbnail" style="max-width: 250px;">
                                @else
                                    <p><strong>Description:</strong> {{ $bidRequest->description ?? '--' }}</p>
                                    <p><strong>Category:</strong> {{ $bidRequest->category->name ?? '--' }}</p>
                                    <p><strong>Subcategory:</strong> {{ $bidRequest->subcategory->name ?? '--' }}</p>
                                    <p><strong>Target Price:</strong> {{ $bidRequest->target_price ?? '--' }} TK</p>
                                    <p><strong>Image:</strong></p>
                                    <img src="{{ asset('upload/admin_images/' . $bidRequest->image_path) }}"
                                        alt="Request Image" class="img-thumbnail" style="max-width: 250px;">
                                @endif
                            </div>
                        </div>
                        <!-- All Vendors’ Bids -->
                        <div class="container my-5 p-4 bg-light border rounded shadow">
                            <h3 class="text-primary mb-4">All Vendors’ Bids</h3>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Vendor</th>
                                            <th>Bid Price (TK)</th>
                                            <th>Bid Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bids as $bid)
                                            <tr>
                                                <td>{{ $bid->vendor->user->name ?? '--' }}</td>
                                                <td>{{ number_format($bid->bid_price, 2) }}</td>
                                                <td>{{ ucfirst($bid->bid_status) }}</td>
                                                <td>
                                                    @if ($bid->bid_status == 'pending')
                                                        <!-- Display Accept button if the bid is not accepted -->
                                                        <form
                                                            action="{{ route('customer.accept.bid', ['bidRequestId' => $bidRequest->id, 'bidId' => $bid->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Accept</button>
                                                        </form>
                                                    @elseif($bid->bid_status != 'accepted')
                                                        <!-- Display Rejected button if the bid is accepted -->
                                                        <button type="button" class="btn btn-danger"
                                                            disabled>Rejected</button>
                                                    @elseif($bid->bid_status == 'accepted')
                                                        <!-- Display Rejected button if the bid is accepted -->
                                                        <button type="button" class="btn btn-success"
                                                            disabled>Accepted</button>
                                                    @endif
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
        </div>
    </section>
@endsection
