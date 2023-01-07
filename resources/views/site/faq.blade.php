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
                            <li class="accordion block active-block">
                                <div class="acc-btn active">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h5><i class="icon-question"></i>What is Save the Pure Hearts?</h5>
                                </div>
                                <div class="acc-content current">
                                    <div class="text">
                                        <p>There are many variations of passages of lorem ipsum available, but the majority have suffered alterationform injected humours randomises don't look even slightly.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h5><i class="icon-question"></i>How do I make a matching gift?</h5>
                                </div>
                                <div class="acc-content">
                                    <div class="text">
                                        <p>There are many variations of passages of lorem ipsum available, but the majority have suffered alterationform injected humours randomises don't look even slightly.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h5><i class="icon-question"></i>What is Save the Tax ID Number?</h5>
                                </div>
                                <div class="acc-content">
                                    <div class="text">
                                        <p>There are many variations of passages of lorem ipsum available, but the majority have suffered alterationform injected humours randomises don't look even slightly.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h5><i class="icon-question"></i>What is an Anti-Charity?</h5>
                                </div>
                                <div class="acc-content">
                                    <div class="text">
                                        <p>There are many variations of passages of lorem ipsum available, but the majority have suffered alterationform injected humours randomises don't look even slightly.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h5><i class="icon-question"></i>Who can access Pure Hearts's research?</h5>
                                </div>
                                <div class="acc-content">
                                    <div class="text">
                                        <p>There are many variations of passages of lorem ipsum available, but the majority have suffered alterationform injected humours randomises don't look even slightly.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-right-arrow"></i></div>
                                    <h5><i class="icon-question"></i>How is Pure Hearts different from others?</h5>
                                </div>
                                <div class="acc-content">
                                    <div class="text">
                                        <p>There are many variations of passages of lorem ipsum available, but the majority have suffered alterationform injected humours randomises don't look even slightly.</p>
                                    </div>
                                </div>
                            </li>
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
