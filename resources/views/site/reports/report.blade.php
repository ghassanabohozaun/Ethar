@extends('layouts.site')
@section('title')
    {!! Lang()=='ar' ? setting()->site_title_ar : setting()->site_title_en !!}
@endsection
@section('metaTags')
    <meta name="description"
          content="{!! Lang()=='ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords"
          content="{!! Lang()=='ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
    <meta name="application-name" content="{!! Lang()=='ar' ? setting()->site_name_ar : setting()->site_name_en !!}"/>
    <meta name="author" content="{!! Lang()=='ar' ? setting()->site_name_ar : setting()->site_name_en !!}"/>
@endsection

@push('css')
@endpush
@section('content')

    <div class="boxed_wrapper {!! Lang()=='ar' ? 'rtl':'' !!}">


        <!-- header -->
        @include('site.includes.header')
        <!-- header end -->


        <!-- Page Title -->
        <section class="page-title"
                 style="background-image: url({!! asset('site/assets/images/background/12.jpg') !!});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>Reports</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Reports</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- shop-details -->
        <section class="shop-details">
            <div class="auto-container">
                <div class="discription-inner">
                    <div class="row clearfix reports-section">

                        <div class="col-lg-3 col-md-3 col-sm-3 single-column">
                            <a href="{!! route('report-details') !!}">
                                <button type="button" class="theme-btn btn-one col-lg-12 col-md-12 col-sm-12">
                                    <img src="{!! asset('site/assets/images/pdf3.png') !!}" alt="" width="100">
                                    <h3>2022</h3>
                                </button>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 single-column">
                            <a href="{!! route('report-details') !!}">
                                <button type="button" class="theme-btn btn-one col-lg-12 col-md-12 col-sm-12">
                                    <img src="{!! asset('site/assets/images/pdf3.png') !!}" alt="" width="100">
                                    <h3>2021</h3>
                                </button>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 single-column">
                            <a href="{!! route('report-details') !!}">
                                <button type="button" class="theme-btn btn-one col-lg-12 col-md-12 col-sm-12">
                                    <img src="{!! asset('site/assets/images/pdf3.png') !!}" alt="" width="100">
                                    <h3>2020</h3>
                                </button>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 single-column">
                            <a href="{!! route('report-details') !!}">
                                <button type="button" class="theme-btn btn-one col-lg-12 col-md-12 col-sm-12">
                                    <img src="{!! asset('site/assets/images/pdf3.png') !!}" alt="" width="100">
                                    <h3>2019</h3>
                                </button>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 single-column">
                            <a href="{!! route('report-details') !!}">
                            <button type="button" class="theme-btn btn-one col-lg-12 col-md-12 col-sm-12">
                                <img src="{!! asset('site/assets/images/pdf3.png') !!}" alt="" width="100">
                                <h3>2018</h3>
                            </button>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 single-column">
                            <a href="{!! route('report-details') !!}">
                            <button type="button" class="theme-btn btn-one col-lg-12 col-md-12 col-sm-12">
                                <img src="{!! asset('site/assets/images/pdf3.png') !!}" alt="" width="100">
                                <h3>2017</h3>
                            </button>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 single-column">
                            <a href="{!! route('report-details') !!}">
                                <button type="button" class="theme-btn btn-one col-lg-12 col-md-12 col-sm-12">
                                    <img src="{!! asset('site/assets/images/pdf3.png') !!}" alt="" width="100">
                                    <h3>2016</h3>
                                </button>
                            </a>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-3 single-column">
                            <a href="{!! route('report-details') !!}">
                                <button type="button" class="theme-btn btn-one col-lg-12 col-md-12 col-sm-12">
                                    <img src="{!! asset('site/assets/images/pdf3.png') !!}" alt="" width="100">
                                    <h3>2015</h3>
                                </button>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- shop-details end -->


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
