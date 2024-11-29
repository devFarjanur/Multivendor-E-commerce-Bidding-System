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
                                        <h2 class="sherah-breadcrumb__title">Upload Product</h2>
                                        <ul class="sherah-breadcrumb__list">
                                            <li><a href="{{ route('vendor.dashboard') }}">Home</a></li>
                                            <li class="active"><a href="{{ route('vendor.upload.product') }}">Upload
                                                    Product</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-border sherah-basic-page sherah-default-bg mg-top-25 p-0">
                                <form class="sherah-wc__form-main" action="{{ route('vendor.product.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Product Info -->
                                            <div class="product-form-box sherah-border mg-top-30">
                                                <h4 class="form-title m-0">Basic Information</h4>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Product Title</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input text-dark"
                                                                    placeholder="Type here" type="text" name="name">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Category</label>
                                                            <select class="form-group__input" name="category_id"
                                                                aria-label="Category select">
                                                                <option value="" selected disabled>Select Category
                                                                </option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Subcategory</label>
                                                            <select class="form-group__input" name="subcategory_id"
                                                                aria-label="Subcategory select" id="subcategory">
                                                                <option value="" selected disabled>Select Subcategory
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">Price</label>
                                                            <div class="form-group__input">
                                                                <input class="sherah-wc__form-input text-dark"
                                                                    placeholder="Type here" type="text" name="price">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="sherah-wc__form-label">About Description</label>
                                                            <div class="form-group__input">
                                                                <textarea class="sherah-wc__form-input text-dark" placeholder="Type here" type="text" name="description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product Info -->
                                        </div>
                                    </div>

                                    <div class="mg-top-40 sherah-dflex sherah-dflex-gap-30 justify-content-end">
                                        <button type="submit" class="sherah-btn sherah-btn__primary">Publish
                                            Product</button>
                                        <button type="reset" class="sherah-btn sherah-btn__third">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End sherah Dashboard -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').change(function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: '/vendor/get-subcategories/' + categoryId,
                        type: 'GET',
                        success: function(data) {
                            if (data.subcategories && Array.isArray(data.subcategories)) {
                                $('#subcategory').empty();
                                $('#subcategory').append(
                                    '<option value="" selected disabled>Select Subcategory</option>'
                                );
                                $.each(data.subcategories, function(key, value) {
                                    $('#subcategory').append('<option value="' + value
                                        .id + '">' + value.name + '</option>');
                                });
                            } else {
                                $('#subcategory').empty();
                                $('#subcategory').append(
                                    '<option value="" disabled>No subcategories available</option>'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('AJAX Error:', error);
                            $('#subcategory').empty();
                            $('#subcategory').append(
                                '<option value="" disabled>Error fetching subcategories</option>'
                            );
                        }
                    });
                } else {
                    $('#subcategory').empty();
                    $('#subcategory').append(
                        '<option value="" selected disabled>Select Subcategory</option>');
                }
            });
        });
    </script>
@endsection
