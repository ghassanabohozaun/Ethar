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
                        <h1>Advertisements</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Advertisements</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->



        <section class="blog-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms"
                             style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="#">
                                        <img src="{!! asset('/site/assets/images/news/news-1.jpg') !!}" alt="">
                                    </a>
                                </figure>
                                <div class="content-box">
                                    <div class="text">
                                        <span class="post-date">03.03.2021</span>
                                        <div class="category"><a href="#"># National Day</a></div>
                                        <h3><a href="#">This is World Cancer Day, We Provide Care</a>
                                        </h3>
                                        <p>Our being able do what we like best pleasure is to welcomed. . .</p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box pull-left"><a href="{!! route('advertisement-details') !!}">More Details</a>
                                        </div>
                                        <div class="comment-box pull-right">
                                            <a href="#l"><i class="far fa-comment"></i>08 Cmts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms"
                             style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="#">
                                        <img src="{!! asset('/site/assets/images/news/news-1.jpg') !!}" alt="">
                                    </a>
                                </figure>
                                <div class="content-box">
                                    <div class="text">
                                        <span class="post-date">03.03.2021</span>
                                        <div class="category"><a href="#"># National Day</a></div>
                                        <h3><a href="#">This is World Cancer Day, We Provide Care</a>
                                        </h3>
                                        <p>Our being able do what we like best pleasure is to welcomed. . .</p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box pull-left"><a href="{!! route('advertisement-details') !!}">More Details</a>
                                        </div>
                                        <div class="comment-box pull-right">
                                            <a href="#l"><i class="far fa-comment"></i>08 Cmts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms"
                             style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="#">
                                        <img src="{!! asset('/site/assets/images/news/news-1.jpg') !!}" alt="">
                                    </a>
                                </figure>
                                <div class="content-box">
                                    <div class="text">
                                        <span class="post-date">03.03.2021</span>
                                        <div class="category"><a href="#"># National Day</a></div>
                                        <h3><a href="#">This is World Cancer Day, We Provide Care</a>
                                        </h3>
                                        <p>Our being able do what we like best pleasure is to welcomed. . .</p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box pull-left"><a href="{!! route('advertisement-details') !!}">More Details</a>
                                        </div>
                                        <div class="comment-box pull-right">
                                            <a href="#l"><i class="far fa-comment"></i>08 Cmts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms"
                             style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="#">
                                        <img src="{!! asset('/site/assets/images/news/news-1.jpg') !!}" alt="">
                                    </a>
                                </figure>
                                <div class="content-box">
                                    <div class="text">
                                        <span class="post-date">03.03.2021</span>
                                        <div class="category"><a href="#"># National Day</a></div>
                                        <h3><a href="#">This is World Cancer Day, We Provide Care</a>
                                        </h3>
                                        <p>Our being able do what we like best pleasure is to welcomed. . .</p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box pull-left"><a href="{!! route('advertisement-details') !!}">More Details</a>
                                        </div>
                                        <div class="comment-box pull-right">
                                            <a href="#l"><i class="far fa-comment"></i>08 Cmts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms"
                             style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="#">
                                        <img src="{!! asset('/site/assets/images/news/news-1.jpg') !!}" alt="">
                                    </a>
                                </figure>
                                <div class="content-box">
                                    <div class="text">
                                        <span class="post-date">03.03.2021</span>
                                        <div class="category"><a href="#"># National Day</a></div>
                                        <h3><a href="#">This is World Cancer Day, We Provide Care</a>
                                        </h3>
                                        <p>Our being able do what we like best pleasure is to welcomed. . .</p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box pull-left"><a href="{!! route('advertisement-details') !!}">More Details</a>
                                        </div>
                                        <div class="comment-box pull-right">
                                            <a href="#l"><i class="far fa-comment"></i>08 Cmts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms"
                             style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="#">
                                        <img src="{!! asset('/site/assets/images/news/news-1.jpg') !!}" alt="">
                                    </a>
                                </figure>
                                <div class="content-box">
                                    <div class="text">
                                        <span class="post-date">03.03.2021</span>
                                        <div class="category"><a href="#"># National Day</a></div>
                                        <h3><a href="#">This is World Cancer Day, We Provide Care</a>
                                        </h3>
                                        <p>Our being able do what we like best pleasure is to welcomed. . .</p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box pull-left"><a href="{!! route('advertisement-details') !!}">More Details</a>
                                        </div>
                                        <div class="comment-box pull-right">
                                            <a href="#l"><i class="far fa-comment"></i>08 Cmts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="more-btn centred"><a href="#" class="theme-btn btn-one">Load More</a></div>
            </div>
        </section>


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
