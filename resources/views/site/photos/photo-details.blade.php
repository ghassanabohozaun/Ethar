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
                        <h1>Photo Details</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Photo Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- portfolio-section -->
        <section class="portfolio-section centred">
            <div class="auto-container">
                <div class="sortable-masonry">

                    <div class="items-container row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-6 masonry-item small-column">
                            <figure class="image-box">
                                <a href="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}"
                                   class="lightbox-image"
                                   data-fancybox="gallery">
                                    <img src="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 masonry-item small-column">
                            <figure class="image-box">
                                <a href="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}"
                                   class="lightbox-image"
                                   data-fancybox="gallery">
                                    <img src="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 masonry-item small-column">
                            <figure class="image-box">
                                <a href="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}"
                                   class="lightbox-image"
                                   data-fancybox="gallery">
                                    <img src="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 masonry-item small-column">
                            <figure class="image-box">
                                <a href="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}"
                                   class="lightbox-image"
                                   data-fancybox="gallery">
                                    <img src="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 masonry-item small-column">
                            <figure class="image-box">
                                <a href="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}"
                                   class="lightbox-image"
                                   data-fancybox="gallery">
                                    <img src="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 masonry-item small-column">
                            <figure class="image-box">
                                <a href="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}"
                                   class="lightbox-image"
                                   data-fancybox="gallery">
                                    <img src="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 masonry-item small-column">
                            <figure class="image-box">
                                <a href="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}"
                                   class="lightbox-image"
                                   data-fancybox="gallery">
                                    <img src="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 masonry-item small-column">
                            <figure class="image-box">
                                <a href="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}"
                                   class="lightbox-image"
                                   data-fancybox="gallery">
                                    <img src="{!! asset('site/assets/images/gallery/portfolio-1.jpg') !!}" alt="">
                                </a>
                            </figure>
                        </div>


                    </div>
                </div>
                <div class="more-btn"><a href="#" class="theme-btn btn-one">Load More</a></div>
            </div>
        </section>
        <!-- portfolio-section end -->


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
