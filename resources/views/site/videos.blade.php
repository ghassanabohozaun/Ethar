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


        <!-- events-page-section -->
        <section class="events-page-section">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                        <div class="events-block-two">
                            <div class="inner-box">
                                <div class="post-date"><h3>31<span>2/2020</span></h3></div>
                                <figure class="image-box"><img
                                        src="{!! asset('site/assets/images/events/events-4.jpg') !!}" alt=""></figure>
                                <div class="content-box">

                                    <ul class="info clearfix">
                                        <li><i class="far fa-clock"></i>11.30 min</li>
                                        <li><i class="fab fa-youtube"></i>youtube</li>
                                    </ul>
                                    <h3><a href="#">Video Title</a></h3>
                                    <div class="links">
                                        <a href="https://www.youtube.com/watch?v=DzwIRzD7da4"
                                           class="lightbox-image" data-caption="">
                                            <i class="icon-play-arrow"></i>
                                            Play Video
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                        <div class="events-block-two">
                            <div class="inner-box">
                                <div class="post-date"><h3>31<span>2/2020</span></h3></div>
                                <figure class="image-box"><img
                                        src="{!! asset('site/assets/images/events/events-4.jpg') !!}" alt=""></figure>
                                <div class="content-box">

                                    <ul class="info clearfix">
                                        <li><i class="far fa-clock"></i>11.30 min</li>
                                        <li><i class="fab fa-youtube"></i>youtube</li>
                                    </ul>
                                    <h3><a href="#">Video Title</a></h3>
                                    <div class="links">
                                        <a href="https://www.youtube.com/watch?v=DzwIRzD7da4"
                                           class="lightbox-image" data-caption="">
                                            <i class="icon-play-arrow"></i>
                                            Play Video
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                        <div class="events-block-two">
                            <div class="inner-box">
                                <div class="post-date"><h3>31<span>2/2020</span></h3></div>
                                <figure class="image-box"><img
                                        src="{!! asset('site/assets/images/events/events-4.jpg') !!}" alt=""></figure>
                                <div class="content-box">

                                    <ul class="info clearfix">
                                        <li><i class="far fa-clock"></i>11.30 min</li>
                                        <li><i class="fab fa-youtube"></i>youtube</li>
                                    </ul>
                                    <h3><a href="#">Video Title</a></h3>
                                    <div class="links">
                                        <a href="https://www.youtube.com/watch?v=DzwIRzD7da4"
                                           class="lightbox-image" data-caption="">
                                            <i class="icon-play-arrow"></i>
                                            Play Video
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                        <div class="events-block-two">
                            <div class="inner-box">
                                <div class="post-date"><h3>31<span>2/2020</span></h3></div>
                                <figure class="image-box"><img
                                        src="{!! asset('site/assets/images/events/events-4.jpg') !!}" alt=""></figure>
                                <div class="content-box">

                                    <ul class="info clearfix">
                                        <li><i class="far fa-clock"></i>11.30 min</li>
                                        <li><i class="fab fa-youtube"></i>youtube</li>
                                    </ul>
                                    <h3><a href="#">Video Title</a></h3>
                                    <div class="links">
                                        <a href="https://www.youtube.com/watch?v=DzwIRzD7da4"
                                           class="lightbox-image" data-caption="">
                                            <i class="icon-play-arrow"></i>
                                            Play Video
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                        <div class="events-block-two">
                            <div class="inner-box">
                                <div class="post-date"><h3>31<span>2/2020</span></h3></div>
                                <figure class="image-box"><img
                                        src="{!! asset('site/assets/images/events/events-4.jpg') !!}" alt=""></figure>
                                <div class="content-box">

                                    <ul class="info clearfix">
                                        <li><i class="far fa-clock"></i>11.30 min</li>
                                        <li><i class="fab fa-youtube"></i>youtube</li>
                                    </ul>
                                    <h3><a href="#">Video Title</a></h3>
                                    <div class="links">
                                        <a href="https://www.youtube.com/watch?v=DzwIRzD7da4"
                                           class="lightbox-image" data-caption="">
                                            <i class="icon-play-arrow"></i>
                                            Play Video
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 events-block">
                        <div class="events-block-two">
                            <div class="inner-box">
                                <div class="post-date"><h3>31<span>2/2020</span></h3></div>
                                <figure class="image-box"><img
                                        src="{!! asset('site/assets/images/events/events-4.jpg') !!}" alt=""></figure>
                                <div class="content-box">

                                    <ul class="info clearfix">
                                        <li><i class="far fa-clock"></i>11.30 min</li>
                                        <li><i class="fab fa-youtube"></i>youtube</li>
                                    </ul>
                                    <h3><a href="#">Video Title</a></h3>
                                    <div class="links">
                                        <a href="https://www.youtube.com/watch?v=DzwIRzD7da4"
                                           class="lightbox-image" data-caption="">
                                            <i class="icon-play-arrow"></i>
                                            Play Video
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="more-btn centred"><a href="#" class="theme-btn btn-one">Load More</a></div>
            </div>
        </section>
        <!-- events-page-section -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
