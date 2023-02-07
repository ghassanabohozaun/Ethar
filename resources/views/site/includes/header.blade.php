<!-- main header -->
<header class="main-header header-style-one">
    <!-- logo-box -->
    <div class="logo-box">
        <figure class="logo"><a href="index.html"><img src="{!! asset('site/assets/images/etharLogo.jpg') !!}" alt=""></a></figure>
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
                                <li class="current dropdown">
                                    <a href="#">About</a>
                                    <ul>
                                        <li>
                                            <a href="{!! route('rationale') !!}">Rationale</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('what-we-do') !!}">What We Do</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('faq') !!}">FAQ's</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('mission') !!}">Mission</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('construction') !!}">Construction</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('work-ethics') !!}">Work Ethics</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('constitution') !!}">Constitution</a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="#">Our Team</a>
                                            <ul>
                                                <li><a href="{!! route('founders') !!}">Founders</a></li>
                                                <li><a href="{!! route('directors') !!}">Directors</a></li>
                                                <li><a href="{!! route('team') !!}">Team</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#">Projects</a>
                                    <ul>
                                        <li><a href="{!! route('projects') !!}">Previous Projects</a></li>
                                        <li><a href="{!! route('projects') !!}">Current Projects</a></li>
                                        <li><a href="{!! route('project-details') !!}">Current Project 1</a></li>
                                        <li><a href="{!! route('project-details') !!}">Current Project 2</a></li>
                                        <li><a href="{!! route('project-details') !!}">Current Project 3</a></li>
                                        <li><a href="{!! route('project-details') !!}">Current Project 4</a></li>
                                        <li><a href="{!! route('project-details') !!}">Current Project 4</a></li>
                                        <li><a href="{!! route('project-details') !!}">Current Project 5</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown"><a href="{!! route('news') !!}">News</a></li>

                                <li class="dropdown"><a href="#">Publications</a>
                                    <ul>
                                        <li>
                                            <a href="{!! route('advertisements') !!}">ِAdvertisements</a>
                                        </li>
                                        <li>
                                            <a href="#">Brochures</a>
                                        </li>
                                        <li>
                                            <a href="#">Case Study</a>
                                        </li>
                                        <li>
                                            <a href="#">Scientific Articles</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="{!! route('reports') !!}">Reports</a>
                                </li>

                                <li class="dropdown"><a href="#">Media</a>
                                    <ul>
                                        <li><a href="{!! route('our-photos') !!}">Our Photos</a></li>
                                        <li><a href="{!! route('videos') !!}">Our Videos</a></li>
                                    </ul>
                                </li>

                                <li><a href="{!! route('contact') !!}">Contact</a></li>

                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="nav-right-content clearfix">
                    <ul class="social-style-one clearfix">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>

                    <div class="search-box-outer">
                        <div class="dropdown">
                            <button class="search-box-btn" type="button">
                                @if(Lang()=='ar')
                                    <a href="/en">
                                        en
                                    </a>
                                @else
                                    <a href="/ar">
                                        ar
                                    </a>
                                @endif
                            </button>
                        </div>
                    </div>
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
                    <ul class="social-style-one clearfix">
                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="index.html"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                    <div class="search-box-outer">
                        <div class="dropdown">
                            <button class="search-box-btn" type="button">
                                @if(Lang()=='ar')
                                    <a href="/en">
                                        en
                                    </a>
                                @else
                                    <a href="/ar">
                                        ar
                                    </a>
                                @endif
                            </button>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

