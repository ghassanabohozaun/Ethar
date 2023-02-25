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

    <div class="boxed_wrapper ltr">

        <div class="boxed_wrapper {!! Lang()=='ar' ? 'rtl':'' !!}">
            <!-- header -->
            @include('site.includes.header')
            <!-- header end -->
            @if (isset($about))
                <!-- Page Title -->
                <section class="page-title " style="background-image: url({!! asset('site/assets/images/background/12.jpg') !!});">

                    <div class="auto-container">
                        <div class="content-box">
                            <div class="title">
                                <h1>{{$about->type->{'name_'.Lang()} }}</h1>
                            </div>
                            <ul class="bread-crumb clearfix">
                                <li><a href="{!! route('index') !!}">Home</a></li>
                                {{-- <li>Pages</li> --}}
                                <li>{{$about->type->{'name_'.Lang()} }}</li>
                            </ul>
                            <!-- Page Title -->
                            <section class="page-title"
                                     style="background-image: url({!! asset('site/assets/images/background/12.jpg') !!});">

                                <div class="auto-container{!! Lang()=='ar' ? 'rtl':'' !!}">
                                    <div class="content-box">
                                        <div class="title">
                                            <h1>{{$about->type->{'name_'.Lang()} }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Page Title -->


                        </div>
                    </div>
                </section>

            @elseif (!isset($about))
                <!-- Page Title -->
                <section class="page-title"
                         style="background-image: url({!! asset('site/assets/images/background/12.jpg') !!});">

                    <div class="auto-container">
                        <div class="content-box">
                            <div class="title">
                                <h1>{{$about_type->{'name_'.Lang()} }}</h1>
                            </div>
                            <ul class="bread-crumb clearfix">
                                <li><a href="{!! route('index') !!}">Home</a></li>
                                {{-- <li>Pages</li> --}}
                                <li>{{$about_type->{'name_'.Lang()} }}</li>
                            </ul>
                        </div>
                    </div>
                </section>
                <!-- End Page Title -->
                <!-- Not Found  -->
                <section class="about-style-three">
                    <!-- Not Found  -->
                    <section class="about-style-three">
                        <div class="sec-title  text-center">
                            <h2>{{__('site.about_not_found')}}    </h2>
                        </div>
                    </section>
                </section>
                <!-- End  Not Found -->
            @endif


            <!-- main-footer -->
            @include('site.includes.footer')
            <!-- main-footer end -->


        </div>

@endsection
