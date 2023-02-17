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
                        <h1>Contact</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- contact-section -->
        <section class="contact-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="contact-info-inner">
                            <div class="sec-title">
                                <span class="top-text">Connecting Always</span>
                                <h2>Hear by our association</h2>
                            </div>
                            <div class="info-box">

                                <div class="single-item">
                                    <h4>Contact</h4>
                                    <div class="text">
                                        <div class="icon-box"><i class="icon-phone-call"></i></div>
                                        <p>Phone<br /><a href="tel:00972592404940">00972592404940</a></p>
                                    </div>
                                </div>

                                <div class="single-item">
                                    <h4>Emergency contact</h4>
                                    <div class="text">
                                        <div class="icon-box"><i class="icon-phone-call"></i></div>
                                        <p>Phone<br /><a href="tel:00972592404940">00972592404940</a></p>
                                    </div>
                                </div>


                                <div class="single-item">
                                    <h4>Email Address</h4>
                                    <div class="text">
                                        <div class="icon-box"><i class="icon-letter"></i></div>
                                        <p>Mail to<br /><a href="mailto:info@example.com">info@example.com</a></p>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <h4>Mailing Address</h4>
                                    <div class="text">
                                        <div class="icon-box"><i class="icon-location"></i></div>
                                        <p>palestine , Gaza <br />Gaza</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="contact-form-inner">
                            <div class="sec-title">
                                <span class="top-text">Drop a Line</span>
                                <h2>Leave us Message</h2>
                            </div>
                            <div class="form-inner">
                                <form method="post" action="#" id="contact-form" class="default-form">
                                    <div class="form-group">
                                        <i class="far fa-user"></i>
                                        <input type="text" name="username" placeholder="Your Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <i class="far fa-envelope"></i>
                                        <input type="email" name="email" placeholder="Email Address" required="">
                                    </div>
                                    <div class="form-group">
                                        <i class="far fa-phone"></i>
                                        <input type="text" name="phone" required="" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <i class="far fa-sticky-note"></i>
                                        <input type="text" name="subject" required="" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <i class="far fa-text-height"></i>
                                        <textarea name="message" placeholder="Massage" rows="30"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button class="theme-btn btn-one" type="submit" name="submit-form">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
