<!-- main header -->
<header class="main-header header-style-one">
    <!-- logo-box -->
    <div class="logo-box">
        <figure class="logo"><a href="{!! route('index') !!}"><img
                    src="{!! asset('site/assets/images/etharLogo.jpg') !!}" alt=""></a></figure>
    </div>
    <!-- header-top -->
    <div class="header-top">
        <div class="outer-container">
            <div class="top-inner clearfix">
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-container">
            <div class="outer-box">
                <div class="text">
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">

{{--                                class="{!! Request::url() == request()->getHost().'/'.Lang()  ? 'current': '' !!}"--}}
                                <li >
                                    <a href="{!! route('index') !!}">{!! __('index.home') !!}
                                    </a>
                                </li>

                                <li class="dropdown  {!! str_contains(url()->current(),'About')  ? 'current': '' !!}">
                                    <a href="#">{!! __('index.about') !!}</a>
                                    <ul>
                                        @foreach (abouts_type() as $type )
                                            <li>
                                                <a href="{!! route('about',slug($type->{'name_'.Lang()})) !!}">
                                                    {{ $type->{'name_'.Lang()} }}
                                                </a>
                                            </li>

                                        @endforeach
                                        <li>
                                            <a href="{!! route('faq') !!}">
                                                {!! __('index.faq') !!}
                                            </a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="#">{!! __('index.our_team') !!}</a>
                                            <ul>
                                                <li>
                                                    <a href="{!! route('founders') !!}">
                                                        {!! __('index.founders') !!}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{!! route('directors') !!}">
                                                        {!! __('index.directors') !!}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{!! route('team') !!}">
                                                        {!! __('index.team') !!}
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown  {!! str_contains(url()->current(),'projects')  ? 'current': '' !!}">
                                    <a href="#">{!! __('index.projects') !!}</a>
                                    <ul>
                                        <li>
                                            <a href="{!! route('projects','previous') !!}">
                                                {!! __('index.previous_projects') !!}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{!! route('projects','current') !!}">
                                                {!! __('index.current_projects') !!}
                                            </a>
                                        </li>
                                        @foreach (projects() as $project)
                                            <li>
                                                <a href="{!! route('project-details',slug($project->{'title_'.Lang()}) )!!}">
                                                    {{$project->{'title_'.Lang()} }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>

                                <li class="{!! str_contains(url()->current(),'news')  ? 'current': '' !!}">
                                    <a href="{!! route('news') !!}">
                                        {!! __('index.news') !!}
                                    </a>
                                </li>

                                <li class="dropdown  {!! str_contains(url()->current(),'publications')  ? 'current': '' !!}">
                                    <a href="#">{!! __('index.publications') !!}</a>
                                    <ul>
                                        <li>
                                            <a href="{!! route('advertisements','Advertisements') !!}">{!! __('index.advertisements') !!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('advertisements','Brochures') !!}">{!! __('index.brochures') !!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('advertisements','CaseStudy') !!}">{!! __('index.case_study') !!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('advertisements','ScientificArticles') !!}">{!! __('index.scientific_articles') !!}</a>

                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown {!! str_contains(url()->current(),'reports')  ? 'current': '' !!}">
                                    <a href="{!! route('reports') !!}">{!! __('index.reports') !!}</a>
                                </li>

                                <li class="dropdown {!! str_contains(url()->current(),'videos') || str_contains(url()->current(),'photos-albums')   ? 'current': '' !!}">
                                    <a href="#">
                                        {!! __('index.media') !!}
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{!! route('photos-albums') !!}">
                                                {!! __('index.our_photos') !!}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{!! route('videos') !!}">
                                                {!! __('index.our_videos') !!}
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="{!! str_contains(url()->current(),'contact')  ? 'current': '' !!}">
                                    <a href="{!! route('contact') !!}">
                                        {!! __('index.contact') !!}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="nav-right-content clearfix">
                    @if(Lang()=='ar')
                        <ul class="social-style-one clearfix social-facebook-icon">
                            <li style="color: #0c0e1a ; font-weight: bolder">
                                <a href="{{LaravelLocalization::getLocalizedURL('en')}}">EN</a>
                            </li>
                            <li>
                                <a href="{{setting()->site_youtube?setting()->site_youtube: 'javascript:void(0)'}}"
                                   id="social-youtube-icon"><i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li><a href="{{setting()->site_instagram?setting()->site_instagram: 'javascript:void(0)'}}"
                                   id="social-instagram-icon"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{setting()->site_twitter?setting()->site_twitter: 'javascript:void(0)'}}"
                                   id="social-twitter-icon"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{setting()->site_facebook ?setting()->site_facebook : 'javascript:void(0)'}}"
                                   id="social-facebook-icon"><i class="fab fa-facebook-f "></i></a></li>
                        </ul>
                    @else
                        <ul class="social-style-one clearfix social-facebook-icon">
                            <li><a href="{{setting()->site_facebook ?setting()->site_facebook : 'javascript:void(0)'}}"
                                   id="social-facebook-icon"><i class="fab fa-facebook-f "></i></a></li>
                            <li><a href="{{setting()->site_twitter?setting()->site_twitter: 'javascript:void(0)'}}"
                                   id="social-twitter-icon"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{setting()->site_instagram?setting()->site_instagram: 'javascript:void(0)'}}"
                                   id="social-instagram-icon"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{setting()->site_youtube?setting()->site_youtube: 'javascript:void(0)'}}"
                                   id="social-youtube-icon"><i class="fab fa-youtube"></i></a></li>
                            <li style="color: #0c0e1a ; font-weight: bolder"><a
                                    href="{{LaravelLocalization::getLocalizedURL('ar')}}"> ع</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="nav-right-content clearfix">
                    @if(Lang()=='ar')
                        <ul class="social-style-one clearfix social-facebook-icon">
                            <li style="color: #0c0e1a ; font-weight: bolder"><a href="/en">EN</a></li>
                            <li><a href="#" id="social-youtube-icon"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#" id="social-instagram-icon"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" id="social-twitter-icon"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" id="social-facebook-icon"><i class="fab fa-facebook-f "></i></a></li>
                        </ul>
                    @else
                        <ul class="social-style-one clearfix social-facebook-icon">
                            <li><a href="#" id="social-facebook-icon"><i class="fab fa-facebook-f "></i></a></li>
                            <li><a href="#" id="social-twitter-icon"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" id="social-instagram-icon"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" id="social-youtube-icon"><i class="fab fa-youtube"></i></a></li>
                            <li style="color: #0c0e1a ; font-weight: bolder"><a href="/ar"> ع</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>

        <nav class="menu-box">
            <div class="nav-logo {!! Lang() == 'ar' ? 'rtl' : 'ltr' !!}">
                <a href="{!! route('index') !!}">
                    <img src="{!! asset('site/assets/images/etharLogo.jpg') !!}" width="150" alt="" title="">
                </a>
            </div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>

            <div class="social-links">
                @if(Lang()=='ar')
                    <ul class="clearfix">
                        <li style="color: #0c0e1a ; font-weight: bolder"><a href="/en">EN</a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f "></i></a></li>
                    </ul>
                @else
                    <ul class="clearfix">
                        <li><a href="#"><i class="fab fa-facebook-f "></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li style="color: #0c0e1a ; font-weight: bolder"><a href="/ar"> ع</a></li>
                    </ul>
                @endif

            </div>
        </nav>
    </div><!-- End Mobile Menu -->


</header>
<!-- main-header end -->

