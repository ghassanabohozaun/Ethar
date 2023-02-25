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
                        <h1>FAQ's</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>FAQ's</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- faq-page-section -->
        <section class="faq-page-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_10">
                            <div class="content-box">
                                <figure class="image"><img src="{!! asset('site/assets/images/resource/faq-11.png') !!}" alt=""></figure>
                                <div class="text wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="icon-box"><i class="icon-search-1"></i></div>
                                    <h3>Don't See Your Question?</h3>
                                    <p>Send your question to our team, they’ll help you.</p>
                                    <a href="faq.html">Send Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <ul class="accordion-box">
                        @foreach ($qas as $index => $qa)
                        <li class="accordion block  {{$index == 0 ?'active-block' :''}}">
                            <div class="acc-btn {{$index == 0 ?'active' :''}}">
                                <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                <h5><i class="icon-question"></i>{{ $qa->{'title_'.Lang()} }}</h5>
                            </div>
                            <div class="acc-content {{$index == 0 ?'current' :''}}">
                                <div class="text">
                                    <p>{!!$qa->{'details_'.Lang()} !!}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                            

                          
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-page-section end -->



        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
