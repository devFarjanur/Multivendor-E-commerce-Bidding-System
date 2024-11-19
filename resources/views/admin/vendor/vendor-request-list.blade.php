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
                            <div class="row">
                                <div class="col-12">
                                    <div class="sherah-breadcrumb mg-top-30">
                                        <h2 class="sherah-breadcrumb__title">Vendors</h2>
                                        <ul class="sherah-breadcrumb__list">
                                            <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                            <li class="active"><a href="{{ route('admin.vendor.request.list') }}">Vendor
                                                    Request
                                                    List</a></li>
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
                                                <th class="sherah-table__column-1 sherah-table__h1">Profile</th>
                                                <th class="sherah-table__column-2 sherah-table__h2">Name</th>
                                                <th class="sherah-table__column-3 sherah-table__h3">Email</th>
                                                <th class="sherah-table__column-4 sherah-table__h4">Phone</th>
                                                <th class="sherah-table__column-8 sherah-table__h7">Join On</th>
                                                <th class="sherah-table__column-7 sherah-table__h6">Status</th>
                                                <th class="sherah-table__column-9 sherah-table__h8">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sherah-table__body">
                                            @if (count($vendorsRequest) > 0)
                                                @foreach ($vendorsRequest as $vendor)
                                                    <tr>
                                                        <td class="sherah-table__column-1 sherah-table__data-1">
                                                            <div
                                                                class="sherah-table__product d-flex justify-content-center">
                                                                <div class="sherah-table__vendor-img">
                                                                    <img src="{{ asset('backend/assets/img/vendor-1.png') }}"
                                                                        alt="#" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-2 sherah-table__data-2">
                                                            <div class="sherah-table__vendor">
                                                                <h4 class="sherah-table__vendor--title"><a
                                                                        href="vendor-profile.html">{{ $vendor->user->name ?? '--' }}</a>
                                                                </h4>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-3 sherah-table__data-3">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    {{ $vendor->user->email ?? '--' }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-4 sherah-table__data-4">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    {{ $vendor->user->phone ?? '--' }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-6 sherah-table__data-6">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    {{ $vendor->user->created_at ? date('d M, Y - h:i a', strtotime($vendor->user->created_at)) : '--' }}
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-5 sherah-table__data-5">
                                                            <div class="sherah-table__product-content">
                                                                {{-- <p class="sherah-table__product-desc">
                                                                    {{ $vendor->status ?? '--' }}</p> --}}
                                                                <div
                                                                    class="sherah-table__status sherah-color2 sherah-color2__bg--opactity text-capitalize">
                                                                    {{ $vendor->status ?? '--' }}</div>
                                                            </div>
                                                        </td>

                                                        <td class="sherah-table__column-8 sherah-table__data-8">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center gap-2">
                                                                <!-- Approve Button -->
                                                                <form method="POST"
                                                                    action="{{ route('vendor.approve.request', $vendor->user_id) }}"
                                                                    style="display:inline;">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-outline-success d-flex align-items-center gap-1">
                                                                        <i class="fas fa-check-circle"></i> Approve
                                                                    </button>
                                                                </form>
                                                                <!-- Reject Button -->
                                                                <form method="POST"
                                                                    action="{{ route('vendor.reject.request', $vendor->user_id) }}"
                                                                    style="display:inline;">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-outline-danger d-flex align-items-center gap-1">
                                                                        <i class="fas fa-times-circle"></i> Reject
                                                                    </button>
                                                                </form>
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
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        table th,
        table td {
            text-align: center !important;
        }
    </style>

    <!-- End sherah Dashboard -->
@endsection
