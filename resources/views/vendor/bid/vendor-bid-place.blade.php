@extends('vendor.index')
@section('vendor')
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
                                <li><a href="{{ route('vendor.dashboard') }}">Home</a></li>
                                <li class="active"><a href="{{ route('vendor.bid.request.details', $bidRequest->id) }}">Place
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

                        <!-- Vendor Bid Form -->
                        <div class="container my-5 p-4 bg-light border rounded shadow">
                            <h3 class="text-primary mb-4">Submit Your Bid</h3>
                            <form action="{{ route('vendor.submit.bid', $bidRequest->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="bid_price" class="form-label">Your Bid Price (TK):</label>
                                    <input type="number" step="0.01" name="bid_price" id="bid_price"
                                        class="form-control" placeholder="Enter your bid price" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Submit Bid</button>
                            </form>
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
                                            <th>Submitted At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bids as $bid)
                                            <tr>
                                                <td>{{ $bid->vendor->user->name ?? '--' }}</td>
                                                <td>{{ number_format($bid->bid_price, 2) ?? '--' }}</td>
                                                <td>{{ $bid->bid_status ?? '--' }}</td>
                                                <td>{{ $bid->created_at->format('d/m/Y H:i') ?? '--' }}</td>
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
