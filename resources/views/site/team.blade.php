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
                        <h1>Directors</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Team</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- team-section -->
        <section class="team-section centred">
            <div class="pattern-layer" style="background-image: url({!! asset('site/assets/images/shape/shape-23.png') !!});"></div>
            <div class="fluid-container">
                <div class="sec-title centred">
                    <span class="top-text">Meet Our Team</span>
                    <h2>Most Passionate Team</h2>
                </div>
                <div class="five-item-carousel owl-carousel owl-theme owl-nav-none">

                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{!! asset('site/assets/images/team/team-5.jpg') !!}" alt=""></figure>
                            <div class="content-box">
                                <div class="info">
                                    <span class="designation">Team</span>
                                    <h3>Name</h3>
                                </div>
                                <figure class="thumb-box"><img src="{!! asset('site/assets/images/team/team-1.png') !!}" alt=""></figure>
                                <div class="text">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- team-section end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
