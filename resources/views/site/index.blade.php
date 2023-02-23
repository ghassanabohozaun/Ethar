@extends('layouts.site')
@section('title')
    {{-- {!! $title  !!} --}}
    {{ $title !== null ?$title:'Home' }}
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


        <!-- main header -->
        @include('site.includes.header')
        <!-- main-header end -->

        <!-- mobile-menu -->
        @include('site.includes.mobile-menu')
        <!-- mobile-menu end-->

        <!-- banner-section -->
        @include('site.includes.banner-section')
        <!-- banner-section end -->

        <!-- welcome-section -->
        @include('site.includes.welcome-section')
        <!-- welcome-section end -->

        <!-- about-section -->
        @include('site.includes.about-section')
        <!-- about-section end -->

        <!-- welcome-section -->
        @include('site.includes.founders')
        <!-- welcome-section end -->

        <!-- news-section -->
        @include('site.includes.news-section')
        <!-- news-section end -->

        <!-- testimonial-section -->
        @include('site.includes.testimonial-section')
        <!-- testimonial-section -->

        <!-- funfact-section -->
        @include('site.includes.funfact-section')
        <!-- funfact-section end -->


        <!-- clients-section -->
        @include('site.includes.clients-section')
        <!-- clients-section end -->

        <!-- footer -->
        @include('site.includes.footer')
        <!-- footer end -->


    </div>

@endsection
