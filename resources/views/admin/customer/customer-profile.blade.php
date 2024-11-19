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
                            <div class="row mg-top-30">
                                <div class="col-12 sherah-flex-between">
                                    <!-- Sherah Breadcrumb -->
                                    <div class="sherah-breadcrumb">
                                        <h2 class="sherah-breadcrumb__title">Customers</h2>
                                        <ul class="sherah-breadcrumb__list">
                                            <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                            <li class="active"><a href="{{ route('admin.customer.profile') }}">Customer
                                                    Profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Sherah Breadcrumb -->
                                    {{-- <a href="#" class="sherah-btn sherah-gbcolor">Add customer</a> --}}
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-border sherah-default-bg mg-top-25 pt-0">
                                <div class="row d-flex align-items-stretch">
                                    <div class="col-lg-6 col-md-6 col-12 mg-top-30">
                                        <div class="sherah-upcard">
                                            <div class="sherah-upcard__thumb">
                                                <img src="{{ asset('backend/assets/img/customer-profile.png') }}"
                                                    alt="#">
                                            </div>
                                            <div class="sherah-upcard__heading">
                                                <h3 class="sherah-upcard__title">Margaret Raw</h3>
                                                <p class="sherah-upcard__phone">+38 (094) 730-24-25</p>
                                                <p class="sherah-upcard__email"><a
                                                        href="mailto:margaretraw@gmail.com">margaretraw@gmail.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mg-top-30">
                                        <div class="sherah-accounts-card">
                                            <!-- Sherah Card Header-->
                                            <div class="sherah-accounts-card__header sherah-border-btm mg-btm-30 pd-btm-30">
                                                <h3 class="sherah-accounts-card__title">Account Details</h3>
                                                <a href="#" class="sherah-accounts-card__button">
                                                    <svg class="sherah-color3__fill" xmlns="http://www.w3.org/2000/svg"
                                                        width="21" height="21.031" viewBox="0 0 21 21.031">
                                                        <g id="Icon" transform="translate(-234.958 -37.876)">
                                                            <!-- SVG content here -->
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                            <!-- Sherah Card Body -->
                                            <div class="sherah-accounts-card__body">
                                                <ul class="sherah-accounts-card__list">
                                                    <li>First Name: <span>Margaret</span></li>
                                                    <li>Last Name: <span>Raw</span></li>
                                                    <li>Date of Birth: <span>15 July 1997</span></li>
                                                    <li>Gender: <span>Male</span></li>
                                                </ul>
                                            </div>
                                            <!-- End Sherah Card Body -->
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 mg-top-30">
                                    <div class="sherah-table__head sherah-table__main">
                                        <h4 class="sherah-order-title">Orders</h4>
                                        <p class="sherah-order-text">Total spent $85,560.00 on 7 orders</p>
                                    </div>
                                    <div class="sherah-table p-0">
                                        <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                            <tbody class="sherah-table__body">
                                                <tr>
                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product--id">
                                                            <p class="crany-table__product--number"><a href="#"
                                                                    class="sherah-color1">#Kz025417</a></p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Today at 4:55 pm</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Pending</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">6 items</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-5 sherah-table__data-5">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">$520.00</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product--id">
                                                            <p class="crany-table__product--number"><a href="#"
                                                                    class="sherah-color1">#80293</a></p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Today at 4:50 pm</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Pending</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">6 items</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-5 sherah-table__data-5">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">$985.00</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product--id">
                                                            <p class="crany-table__product--number"><a href="#"
                                                                    class="sherah-color1">#78621</a></p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">November 20, 2021</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Completed</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">10 items</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-5 sherah-table__data-5">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">$623.00</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product--id">
                                                            <p class="crany-table__product--number"><a href="#"
                                                                    class="sherah-color1">#Kz025417</a></p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Today at 4:55 pm</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Pending</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">6 items</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-5 sherah-table__data-5">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">$520.00</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product--id">
                                                            <p class="crany-table__product--number"><a href="#"
                                                                    class="sherah-color1">#80293</a></p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Today at 4:50 pm</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Pending</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">6 items</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-5 sherah-table__data-5">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">$985.00</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product--id">
                                                            <p class="crany-table__product--number"><a href="#"
                                                                    class="sherah-color1">#78621</a></p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">November 20, 2021</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Completed</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">10 items</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-5 sherah-table__data-5">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">$623.00</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product--id">
                                                            <p class="crany-table__product--number"><a href="#"
                                                                    class="sherah-color1">#Kz025417</a></p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Today at 4:55 pm</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Pending</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">6 items</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-5 sherah-table__data-5">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">$520.00</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="sherah-table__column-1 sherah-table__data-1">
                                                        <div class="sherah-table__product--id">
                                                            <p class="crany-table__product--number"><a href="#"
                                                                    class="sherah-color1">#80293</a></p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-2 sherah-table__data-2">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Today at 4:50 pm</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-3 sherah-table__data-3">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">Pending</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-4 sherah-table__data-4">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">6 items</p>
                                                        </div>
                                                    </td>
                                                    <td class="sherah-table__column-5 sherah-table__data-5">
                                                        <div class="sherah-table__product-content">
                                                            <p class="sherah-table__product-desc">$985.00</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="#" class="sherah-dropdown-card__sell-all">View All Orders</a>
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
    </section>
    <!-- End sherah Dashboard -->
@endsection
