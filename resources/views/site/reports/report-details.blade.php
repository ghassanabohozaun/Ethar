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
                        <h1>Report Details</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Report Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <br> <br> <br> <br> <br>
        <br> <br> <br> <br> <br>  <br> <br> <br> <br> <br>



        <!-- history-section -->
        <section class="history-section">
            <div class="pattern-layer"></div>
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 image-column">
                            <div class="tabs-box">
                                <div class="tab-btn-box">
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li class="tab-btn active-btn " style="margin-bottom: 20px" data-tab="#tab-1">
                                            <i class="far fa-calendar-alt"></i>Administrative report
                                        </li>
                                        <li class="tab-btn active-btn " style="margin-bottom: 20px" data-tab="#tab-1">
                                            <i class="far fa-calendar-alt"></i>Financial report
                                        </li>


                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- history-section end -->





        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
