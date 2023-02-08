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
                        <h1>Projects</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Projects</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- case-page-section -->
        <section class="case-page-section list-view">
            <div class="auto-container">


                <div class="case-block-four">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <img src="{!! asset('site/assets/images/case/case-16.jpg') !!}" alt="">
                            </figure>
                        </div>
                        <div class="content-box">
                            <div class="text">
                                <div class="category">
                                    <a href="#"># project </a>
                                </div>
                                <h3><a href="#">Lorem Ipsum is simply dummy text of the printing</a>
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                            </div>
                            <ul class="info-box clearfix">
                                <li class="share">
                                    <i class="far fa-file-word"></i>
                                    <h5>download</h5>
                                </li>
                                <li class="share">
                                    <i class="fas fa-file-pdf"></i>
                                    <h5>download</h5>
                                </li>
                                <li class="share">
                                    <i class="fas fa-book"></i>
                                    <h5>visit case studies</h5>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="case-block-four">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <img src="{!! asset('site/assets/images/case/case-16.jpg') !!}" alt="">
                            </figure>
                        </div>
                        <div class="content-box">
                            <div class="text">
                                <div class="category">
                                    <a href="#"># project </a>
                                </div>
                                <h3><a href="#">Lorem Ipsum is simply dummy text of the printing</a>
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                            </div>
                            <ul class="info-box clearfix">
                                <li class="share">
                                    <i class="far fa-file-word"></i>
                                    <h5>download</h5>
                                </li>
                                <li class="share">
                                    <i class="fas fa-file-pdf"></i>
                                    <h5>download</h5>
                                </li>
                                <li class="share">
                                    <i class="fas fa-book"></i>
                                    <h5>visit case studies</h5>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="case-block-four">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <img src="{!! asset('site/assets/images/case/case-16.jpg') !!}" alt="">
                            </figure>
                        </div>
                        <div class="content-box">
                            <div class="text">
                                <div class="category">
                                    <a href="#"># project </a>
                                </div>
                                <h3><a href="#">Lorem Ipsum is simply dummy text of the printing</a>
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                            </div>
                            <ul class="info-box clearfix">
                                <li class="share">
                                    <i class="far fa-file-word"></i>
                                    <h5>download</h5>
                                </li>
                                <li class="share">
                                    <i class="fas fa-file-pdf"></i>
                                    <h5>download</h5>
                                </li>
                                <li class="share">
                                    <i class="fas fa-book"></i>
                                    <h5>visit case studies</h5>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="pagination-wrapper centred">
                    <ul class="pagination clearfix">
                        <li><a href="#"><i class="fas fa-arrow-left"></i></a></li>
                        <li><a href="#" class="current">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- case-page-section end -->


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
