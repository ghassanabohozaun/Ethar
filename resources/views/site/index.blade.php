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

        <!-- main header -->
        @include('site.includes.header')
        <!-- main-header end -->

        <!-- mobile-menu -->
        @include('site.includes.mobile-menu')
        <!-- mobile-menu end-->

        <!-- sliders -->
        @include('site.includes.sliders')
        <!-- sliders end -->

        <!-- projects -->
        @include('site.includes.projects')
        <!-- projects end -->

        <!-- about-section -->
        @include('site.includes.about-association')
        <!-- about-section end -->

        <!-- founders -->
        @include('site.includes.founders')
        <!-- founders end -->

        <!-- last-articles -->
        @include('site.includes.last-articles')
        <!-- last-articles end -->

        <!-- testimonial-section -->
        @include('site.includes.testimonial-section')
        <!-- testimonial-section -->

        <!-- counters-section -->
        @include('site.includes.counters-section')
        <!-- counters-section end -->

        <!-- clients-section -->
        @include('site.includes.clients-section')
        <!-- clients-section end -->

        <!-- footer -->
        @include('site.includes.footer')
        <!-- footer end -->


    </div>

@endsection
