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
                        <h1>Project Detail</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Project Detail</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- left  -->
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="content-one">
                                <div class="upper-box">
                                    <span># project #</span>
                                    <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
                                    <ul class="post-info clearfix">
                                        <li><i class="far fa-user"></i>By Name of writer</li>
                                        <li><i class="far fa-eye"></i>25 Views</li>
                                    </ul>
                                </div>
                                <figure class="image-box">
                                    <img src="{!! asset('site/assets/images/news/news-14.jpg') !!}" alt="">
                                    <span class="post-date">03.03.2021</span>
                                </figure>
                                <div class="text">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently with desktop publishing software like Aldus PageMaker including
                                        versions of Lorem Ipsum remaining essentially unchanged. It was popularised in the 1960s
                                        with the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently with desktop publishing software like Aldus PageMaker including
                                        versions of Lorem Ipsum remaining essentially unchanged. It was popularised in the 1960s
                                        with the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently with desktop publishing software like Aldus PageMaker including
                                        versions of Lorem Ipsum</p>
                                </div>

                                <div class="font-weight-bold mt-5"><h5> <a href="#"> Download PDF</a></h5></div>
                                <div class="font-weight-bold mt-1"> <h5><a href="#"> Download WORD</a></h5></div>

                            </div>

                        </div>
                    </div>
                    <!-- left end -->

                    <!-- right  -->
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar default-sidebar">
                            <div class="sidebar-widget search-widget">
                                <form action="#" method="post" class="search-form">
                                    <div class="form-group">
                                        <input type="search" name="search-field" placeholder="Your Keyword . . ."
                                               required="">
                                        <button type="submit"><i class="icon-search"></i></button>
                                    </div>
                                </form>
                            </div>


                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h3>Categories</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list clearfix">
                                        <li><a href="#">Projects<span>06</span></a></li>
                                        <li><a href="#">News<span>08</span></a></li>
                                        <li><a href="#">ِAdvertisements<span>03</span></a></li>
                                        <li><a href="#">Brochures<span>14</span></a></li>
                                        <li><a href="#">Case Study<span>12</span></a></li>
                                        <li><a href="#">Scientific Articles<span>12</span></a></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h3>Latest Post</h3>
                                </div>
                                <div class="post-inner">

                                    <div class="post">
                                        <figure class="post-thumb">
                                            <a href="#">
                                                <img src="{!! asset('site/assets/images/news/post-4.jpg') !!}" alt="">
                                            </a>
                                        </figure>
                                        <h5><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.</a></h5>
                                        <span class="post-date">03.03.2021</span>
                                    </div>

                                    <div class="post">
                                        <figure class="post-thumb">
                                            <a href="#">
                                                <img src="{!! asset('site/assets/images/news/post-4.jpg') !!}" alt="">
                                            </a>
                                        </figure>
                                        <h5><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.</a></h5>
                                        <span class="post-date">03.03.2021</span>
                                    </div>

                                    <div class="post">
                                        <figure class="post-thumb">
                                            <a href="#">
                                                <img src="{!! asset('site/assets/images/news/post-4.jpg') !!}" alt="">
                                            </a>
                                        </figure>
                                        <h5><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.</a></h5>
                                        <span class="post-date">03.03.2021</span>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- right end -->

                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
