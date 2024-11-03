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
                                        <h2 class="sherah-breadcrumb__title">Pages</h2>
                                        <ul class="sherah-breadcrumb__list">
                                            <li><a href="#">Home</a></li>
                                            <li class="active"><a href="{{ route('admin.language') }}">Language</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-border sherah-default-bg pt-0 mg-top-25">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">English</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-1.png') }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">Arabic</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-2.png') }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">Bengali</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-3.png') }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">Chinese</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-4.png') }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">Portuguese</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-5.png') }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">Spanish</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-6.png') }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">Russian</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-7.png') }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">German</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-8.png') }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">Romanian</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-9.png') }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="sherah-language-form mg-top-30">
                                                <div class="sherah-language-form__input">
                                                    <input class="sherah-language-form__check" id="checkbox"
                                                        name="checkbox" type="checkbox">
                                                    <label for="checkbox">French</label>
                                                </div>
                                                <div class="flag-icon"><img
                                                        src="{{ asset('backend/assets/img/flag-10.png') }}"></div>
                                            </div>
                                        </div>
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
@endsection
