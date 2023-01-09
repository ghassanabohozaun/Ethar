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
                 style="background-image: url({!! asset('site/assets/images/background/12.jpg') !!}); margin-top: 80px">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>Our Videos</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Our Videos</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- essentials-section -->
        <section class="essentials-section centred">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-6 single-column">
                            <div class="single-item">
                                <div class="bg-layer" style="background-image: url({!! asset('site/assets/images/resource/contact-1.jpg') !!});"></div>
                                <h3>Video Title</h3>
                                <p style="font-size: 16px">
                                    <span style="color: #9f3a38 ; font-weight: bolder ">Date </span> : 20-20-2022
                                    <span style="color: #9f3a38 ; font-weight: bolder">Duration </span> : 20 sec
                                </p>
                                <a href="#" class="theme-btn btn-one">
                                    <div style="float:left; display:flex;">
                                        <span class="fab fa-youtube fa-2x " style="color: #9f3a38 ; "></span>
                                        <span style="padding: 2px 10px">Play Now</span>
                                    </div>



                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 single-column">
                            <div class="single-item">
                                <div class="bg-layer" style="background-image: url({!! asset('site/assets/images/resource/contact-1.jpg') !!});"></div>
                                <h3>Video Title</h3>
                                <p style="font-size: 16px">
                                    <span style="color: #9f3a38 ; font-weight: bolder ">Date </span> : 20-20-2022
                                    <span style="color: #9f3a38 ; font-weight: bolder">Duration </span> : 20 sec
                                </p>
                                <a href="#" class="theme-btn btn-one">
                                    <div style="float:left; display:flex;">
                                        <span class="fab fa-youtube fa-2x " style="color: #9f3a38 ; "></span>
                                        <span style="padding: 2px 10px">Play Now</span>
                                    </div>



                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 single-column">
                            <div class="single-item">
                                <div class="bg-layer" style="background-image: url({!! asset('site/assets/images/resource/contact-1.jpg') !!});"></div>
                                <h3>Video Title</h3>
                                <p style="font-size: 16px">
                                    <span style="color: #9f3a38 ; font-weight: bolder ">Date </span> : 20-20-2022
                                    <span style="color: #9f3a38 ; font-weight: bolder">Duration </span> : 20 sec
                                </p>
                                <a href="#" class="theme-btn btn-one">
                                    <div style="float:left; display:flex;">
                                        <span class="fab fa-youtube fa-2x " style="color: #9f3a38 ; "></span>
                                        <span style="padding: 2px 10px">Play Now</span>
                                    </div>



                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 single-column">
                            <div class="single-item">
                                <div class="bg-layer" style="background-image: url({!! asset('site/assets/images/resource/contact-1.jpg') !!});"></div>
                                <h3>Video Title</h3>
                                <p style="font-size: 16px">
                                    <span style="color: #9f3a38 ; font-weight: bolder ">Date </span> : 20-20-2022
                                    <span style="color: #9f3a38 ; font-weight: bolder">Duration </span> : 20 sec
                                </p>
                                <a href="#" class="theme-btn btn-one">
                                    <div style="float:left; display:flex;">
                                        <span class="fab fa-youtube fa-2x " style="color: #9f3a38 ; "></span>
                                        <span style="padding: 2px 10px">Play Now</span>
                                    </div>



                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 single-column">
                            <div class="single-item">
                                <div class="bg-layer" style="background-image: url({!! asset('site/assets/images/resource/contact-1.jpg') !!});"></div>
                                <h3>Video Title</h3>
                                <p style="font-size: 16px">
                                    <span style="color: #9f3a38 ; font-weight: bolder ">Date </span> : 20-20-2022
                                    <span style="color: #9f3a38 ; font-weight: bolder">Duration </span> : 20 sec
                                </p>
                                <a href="#" class="theme-btn btn-one">
                                    <div style="float:left; display:flex;">
                                        <span class="fab fa-youtube fa-2x " style="color: #9f3a38 ; "></span>
                                        <span style="padding: 2px 10px">Play Now</span>
                                    </div>



                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 single-column">
                            <div class="single-item">
                                <div class="bg-layer" style="background-image: url({!! asset('site/assets/images/resource/contact-1.jpg') !!});"></div>
                                <h3>Video Title</h3>
                                <p style="font-size: 16px">
                                    <span style="color: #9f3a38 ; font-weight: bolder ">Date </span> : 20-20-2022
                                    <span style="color: #9f3a38 ; font-weight: bolder">Duration </span> : 20 sec
                                </p>
                                <a href="#" class="theme-btn btn-one">
                                    <div style="float:left; display:flex;">
                                        <span class="fab fa-youtube fa-2x " style="color: #9f3a38 ; "></span>
                                        <span style="padding: 2px 10px">Play Now</span>
                                    </div>



                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- essentials-section end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
