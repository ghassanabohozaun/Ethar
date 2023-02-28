<!-- main-footer -->
<section class="main-footer">
    <div class="footer-top">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="title-box">
                            <h3>{{__('menu.abouts')}}</h3>
                        </div>
                        <div class="text">
                            <p>{!! \Illuminate\Support\Str::limit(strip_tags(fixedTexts()->{'about_association_details_'.Lang()}),$limit = 280, $end = ' ...')!!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-30">
                        <div class="widget-title">
                            <h3>Related Pages</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-30">
                        <div class="widget-title">
                            <h3>&nbsp;</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                                <li><a href="#">Related Page Link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget ml-30">
                        <div class="title-box">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="widget-content">
                            <div class="single-item">
                                <h5>00972592454545</h5>
                            </div>
                            <div class="single-item">
                                <h5>example@info.com</h5>
                                <p></p>
                            </div>

                            <div class="single-item">
                                <h5>Palestine , Gaza</h5>
                            </div>

                            <div class="single-item my-social-style">
                                <ul class="my-social-style-one clearfix  my-2">
                                    <li>
                                        <a href="{{setting()->site_facebook ? setting()->site_facebook : 'javascript:void(0)'}}"
                                           id="social-facebook-icon"><i class="fab fa-facebook-f "></i></a></li>
                                    <li>
                                        <a href="{{setting()->site_twitter?setting()->site_twitter: 'javascript:void(0)'}}"
                                           id="social-twitter-icon"><i class="fab fa-twitter"></i></a></li>
                                    <li>
                                        <a href="{{setting()->site_instagram?setting()->site_instagram: 'javascript:void(0)'}}"
                                           id="social-instagram-icon"><i class="fab fa-instagram"></i></a></li>
                                    <li>
                                        <a href="{{setting()->site_youtube?setting()->site_youtube: 'javascript:void(0)'}}"
                                           id="social-youtube-icon"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="single-item">
                                &nbsp;
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <div class="copyright text-center">
                    @if(Lang()=='ar')
                        <p> &copy; جميع الحقوق محفوظة ,  <a href="{!! route('index') !!}"> جمعية ايثار</a> 2023.</p>
                    @else
                        <p>Copyrights &copy; 2023 <a href="{!! route('index') !!}">Ethar,</a> All rights reserved .</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main-footer end -->

