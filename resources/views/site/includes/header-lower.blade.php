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
                                    <li><a href="#">Our Videos</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Contact</a></li>

                        </ul>
                    </div>
                </nav>
            </div>

            <div class="nav-right-content clearfix">
                <div class="cart-box">
                    @if(Lang()=='ar')
                        <a href="/en">
                            en
                        </a>
                    @else
                        <a href="/ar">
                            ar
                        </a>
                    @endif
                </div>
                <div class="nav-btn nav-toggler navSidebar-button clearfix">
                    <i class="icon-menu"></i>
                </div>
            </div>
        </div>
    </div>
</div>
