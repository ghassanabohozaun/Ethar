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
                        <h1>Our Photos Albums</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Our Photos Albums</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- portfolio-section -->
        <section class="portfolio-section centred">
            <div class="auto-container">
                <div class="sortable-masonry">
                    <div class="filters">
                        <ul class="filter-tabs filter-btns clearfix">
                            <li class="active filter" data-role="button" data-filter=".all">View All</li>
                            <li class="filter" data-role="button" data-filter=".activities">Activities</li>
                            <li class="filter" data-role="button" data-filter=".awareness">Awareness</li>
                            <li class="filter" data-role="button" data-filter=".education">Education</li>
                            <li class="filter" data-role="button" data-filter=".health">Health</li>
                            <li class="filter" data-role="button" data-filter=".helping">Helping</li>
                        </ul>
                    </div>

                    <div class="items-container row clearfix">
                        <div
                            class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all education activities awareness helping">
                            <div class="portfolio-block-one">
                                <div class="inner-box">
                                    <figure class="image"><img src="{!! asset('site/assets/images/gallery/portfolio-7.jpg') !!}" alt="">
                                    </figure>
                                    <div class="content-box">
                                        <ul class="links-list clearfix">
                                            <li><a href="#"><i class="fas fa-expand-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-file-alt"></i></a></li>
                                        </ul>
                                        <div class="text">
                                            <span>2022</span>
                                            <h3><a href="#">Album Name</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all education activities awareness helping">
                            <div class="portfolio-block-one">
                                <div class="inner-box">
                                    <figure class="image"><img src="{!! asset('site/assets/images/gallery/portfolio-7.jpg') !!}" alt="">
                                    </figure>
                                    <div class="content-box">
                                        <ul class="links-list clearfix">
                                            <li><a href="#"><i class="fas fa-expand-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-file-alt"></i></a></li>
                                        </ul>
                                        <div class="text">
                                            <span>2022</span>
                                            <h3><a href="#">Album Name</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all education activities awareness helping">
                            <div class="portfolio-block-one">
                                <div class="inner-box">
                                    <figure class="image"><img src="{!! asset('site/assets/images/gallery/portfolio-7.jpg') !!}" alt="">
                                    </figure>
                                    <div class="content-box">
                                        <ul class="links-list clearfix">
                                            <li><a href="#"><i class="fas fa-expand-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-file-alt"></i></a></li>
                                        </ul>
                                        <div class="text">
                                            <span>2022</span>
                                            <h3><a href="#">Album Name</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all education activities awareness helping">
                            <div class="portfolio-block-one">
                                <div class="inner-box">
                                    <figure class="image"><img src="{!! asset('site/assets/images/gallery/portfolio-7.jpg') !!}" alt="">
                                    </figure>
                                    <div class="content-box">
                                        <ul class="links-list clearfix">
                                            <li><a href="#"><i class="fas fa-expand-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-file-alt"></i></a></li>
                                        </ul>
                                        <div class="text">
                                            <span>2022</span>
                                            <h3><a href="#">Album Name</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all education activities awareness helping">
                            <div class="portfolio-block-one">
                                <div class="inner-box">
                                    <figure class="image"><img src="{!! asset('site/assets/images/gallery/portfolio-7.jpg') !!}" alt="">
                                    </figure>
                                    <div class="content-box">
                                        <ul class="links-list clearfix">
                                            <li><a href="#"><i class="fas fa-expand-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-file-alt"></i></a></li>
                                        </ul>
                                        <div class="text">
                                            <span>2022</span>
                                            <h3><a href="#">Album Name</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all education activities awareness helping">
                            <div class="portfolio-block-one">
                                <div class="inner-box">
                                    <figure class="image"><img src="{!! asset('site/assets/images/gallery/portfolio-7.jpg') !!}" alt="">
                                    </figure>
                                    <div class="content-box">
                                        <ul class="links-list clearfix">
                                            <li><a href="#"><i class="fas fa-expand-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-file-alt"></i></a></li>
                                        </ul>
                                        <div class="text">
                                            <span>2022</span>
                                            <h3><a href="#">Album Name</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- portfolio-section end -->


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
