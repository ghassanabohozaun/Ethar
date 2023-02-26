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

    <div class="boxed_wrapper {!! Lang()=='ar' ? 'rtl':'' !!}"
         style="background-image: url({!! asset('/site/assets/images/shape/shape-23.png') !!});">


        <!-- header -->
        @include('site.includes.header')
        <!-- header end -->


        <!-- Page Title -->
        <section class="page-title"
                 style="background-image: url({!! asset('site/assets/images/background/12.jpg') !!});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>{!! __('index.founders') !!}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- team-section -->
        <section class="team-section centred">
            <div class="pattern-layer"
                 style="background-image: url({!! asset('site/assets/images/shape/shape-23.png') !!});"></div>
            <div class="fluid-container">
                <div class="sec-title centred">
                    <span class="top-text">{!! __('index.meet_our_founders') !!}</span>
                    <h2>{!! fixedTexts()->{'founders_title_'.Lang()} !!}</h2>
                </div>
                <div class="five-item-carousel owl-carousel owl-theme owl-nav-none">

                    @forelse($founders as $founder)
                        <div class="team-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{asset('adminBoard/uploadedImages/teams/'.$founder->photo)}}"
                                         alt="{!! $founder->{'name_'.Lang()} !!}">
                                </figure>
                                <div class="content-box">
                                    <div class="info">
                                        <span class="designation">{!! __('index.founder') !!}</span>
                                        <h3>{!! $founder->{'name_'.Lang()} !!}</h3>
                                    </div>
                                    <figure class="thumb-box">
                                        <img src="{{asset('adminBoard/uploadedImages/teams/'.$founder->photo)}}"
                                             alt="{!! $founder->{'name_'.Lang()} !!}">
                                    </figure>
                                    <div class="text">
                                        <p>{!! $founder->{'description_'.Lang()} !!}</p>
                                    </div>
                                </div>
                                <ul class="social-links clearfix">
                                    <li>
                                        <a href="{!! $founder->facebook  ??  'javascript:void(0)' !!}">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li><a href="{!! $founder->twitter  ??  'javascript:void(0)' !!}">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! $founder->linkedIn  ??  'javascript:void(0)' !!}">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </section>
        <!-- team-section end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
