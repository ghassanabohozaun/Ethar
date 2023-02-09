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
                        <h1>new</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>new</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- sidebar-page-container -->
        <section class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- left  -->
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">

                            <div class="content-one">
                                <div class="upper-box">
                                    <span># National Day</span>
                                    <h2>Aid for Country: The Charity for Orphans</h2>
                                    <ul class="post-info clearfix">
                                        <li><i class="far fa-user"></i>By Richardson</li>
                                        <li><i class="far fa-comment"></i>08 Cmts</li>
                                        <li><i class="far fa-eye"></i>25 Views</li>
                                    </ul>
                                </div>
                                <figure class="image-box">
                                    <img src="{!! asset('/site/assets/images/news/news-14.jpg') !!}" alt="">
                                    <span class="post-date">03.03.2021</span>
                                </figure>
                                <div class="text">
                                    <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure but because those who do not know how to pursue pleasure on the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain these cases are perfectly.</p>
                                    <p>When our power of choice is untrammelled and when nothing prevents our being able to dowhat we like best every pleasures  to be welcomed every pain avoided but in certain circumstances and owing to the claims of duty or the obligation.</p>
                                    <p>Indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the all moment, so blinded by desire, that they cannot foresee the pain and trouble.</p>
                                    <p>Untrammelled and when nothing prevents work being able to do what we like best every pleasure is to be  but in certain duty one who avoids a pain that produces.</p>
                                </div>
                            </div>

                            <div class="comment-box">
                                <div class="group-title">
                                    <h3>Comments (02)</h3>
                                </div>
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="{!! asset('/site/assets/images/news/comment-1.jpg') !!}" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h3>Isaac Herman</h3>
                                            <span class="post-date">05.03.2021 [11.00am]</span>
                                        </div>
                                        <p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
                                    </div>
                                </div>
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="{!! asset('site/assets/images/news/comment-2.jpg') !!}" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h3>William Cobus</h3>
                                            <span class="post-date">04.03.2021 [10.00am]</span>
                                        </div>
                                        <p>Undertakes laborious physical exercise, except to obtain some advantage from it but who has any right to find fault.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="comments-form-area">
                                <div class="group-title">
                                    <h3>Leave a Reply</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                </div>
                                <div class="form-inner">
                                    <form method="post" action="#" class="comment-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <textarea name="message" placeholder="Your Comment *"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="name" placeholder="Your Name *" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="email" name="email" placeholder="Email *" required="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                <button type="submit" class="theme-btn btn-one">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- left end -->

                    <!-- right  -->
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar default-sidebar">
                            <div class="sidebar-widget search-widget">
                                <form action="#" method="post" class="search-form">
                                    <div class="form-group">
                                        <input type="search" name="search-field" placeholder="Your Keyword . . ."
                                               required="">
                                        <button type="submit"><i class="icon-search"></i></button>
                                    </div>
                                </form>
                            </div>


                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h3>Categories</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list clearfix">
                                        <li><a href="#">Projects<span>06</span></a></li>
                                        <li><a href="#">News<span>08</span></a></li>
                                        <li><a href="#">ِAdvertisements<span>03</span></a></li>
                                        <li><a href="#">Brochures<span>14</span></a></li>
                                        <li><a href="#">Case Study<span>12</span></a></li>
                                        <li><a href="#">Scientific Articles<span>12</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h3>Latest Post</h3>
                                </div>
                                <div class="post-inner">

                                    <div class="post">
                                        <figure class="post-thumb">
                                            <a href="#">
                                                <img src="{!! asset('site/assets/images/news/post-4.jpg') !!}" alt="">
                                            </a>
                                        </figure>
                                        <h5><a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.</a></h5>
                                        <span class="post-date">03.03.2021</span>
                                    </div>

                                </div>
                            </div>

                            {{--                            <div class="sidebar-widget tags-widget">--}}
                            {{--                                <div class="widget-title">--}}
                            {{--                                    <h3>Tag Cloud</h3>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="widget-content">--}}
                            {{--                                    <ul class="tags-list clearfix">--}}
                            {{--                                        <li><a href="blog-details.html">activities</a></li>--}}
                            {{--                                        <li><a href="blog-details.html">awareness</a></li>--}}
                            {{--                                        <li><a href="blog-details.html">benefits</a></li>--}}
                            {{--                                        <li><a href="blog-details.html">education</a></li>--}}
                            {{--                                        <li><a href="blog-details.html">environment</a></li>--}}
                            {{--                                        <li><a href="blog-details.html">gift card</a></li>--}}
                            {{--                                        <li><a href="blog-details.html">heath</a></li>--}}
                            {{--                                        <li><a href="blog-details.html">protection</a></li>--}}
                            {{--                                        <li><a href="blog-details.html">women care</a></li>--}}
                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}


                            <div class="sidebar-widget gallery-widget">
                                <div class="widget-title">
                                    <h3>Gallery</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="image-list clearfix">
                                        <li>
                                            <figure class="image">
                                                <img src="{!! asset('site/assets/images/case/gallery-1.jpg') !!}"
                                                     alt="">
                                                <a href="{!! asset('site/assets/images/case/gallery-1.jpg') !!}"
                                                   class="lightbox-image" data-fancybox="gallery">
                                                    <i class="fas fa-expand-alt"></i>
                                                </a>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure class="image">
                                                <img src="{!! asset('site/assets/images/case/gallery-2.jpg') !!}"
                                                     alt="">
                                                <a href="{!! asset('site/assets/images/case/gallery-2.jpg') !!}"
                                                   class="lightbox-image" data-fancybox="gallery"><i
                                                        class="fas fa-expand-alt"></i></a>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure class="image">
                                                <img src="{!! asset('site/assets/images/case/gallery-3.jpg') !!}"
                                                     alt="">
                                                <a href="{!! asset('site/assets/images/case/gallery-3.jpg') !!}"
                                                   class="lightbox-image" data-fancybox="gallery"><i
                                                        class="fas fa-expand-alt"></i></a>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure class="image">
                                                <img src="{!! asset('site/assets/images/case/gallery-4.jpg') !!}"
                                                     alt="">
                                                <a href="{!! asset('site/assets/images/case/gallery-4.jpg') !!}"
                                                   class="lightbox-image" data-fancybox="gallery"><i
                                                        class="fas fa-expand-alt"></i></a>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure class="image">
                                                <img src="{!! asset('site/assets/images/case/gallery-5.jpg') !!}"
                                                     alt="">
                                                <a href="{!! asset('site/assets/images/case/gallery-5.jpg') !!}"
                                                   class="lightbox-image" data-fancybox="gallery"><i
                                                        class="fas fa-expand-alt"></i></a>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure class="image">
                                                <img src="{!! asset('site/assets/images/case/gallery-6.jpg') !!}"
                                                     alt="">
                                                <a href="{!! asset('site/assets/images/case/gallery-6.jpg') !!}"
                                                   class="lightbox-image" data-fancybox="gallery"><i
                                                        class="fas fa-expand-alt"></i></a>
                                            </figure>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            {{--                            <div class="sidebar-widget subscribe-widget centred">--}}
                            {{--                                <div class="widget-content">--}}
                            {{--                                    <div class="upper-content" style="background-image: url(assets/images/case/case-30.jpg);">--}}
                            {{--                                        <div class="icon-box"><i class="icon-email-open-sketched-envelope"></i></div>--}}
                            {{--                                        <h3>Subscribe Us</h3>--}}
                            {{--                                        <p>Subscribe us and get latest news and upcoming events.</p>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="lower-content">--}}
                            {{--                                        <form action="contact.html" method="post" class="subscribe-form">--}}
                            {{--                                            <div class="form-group">--}}
                            {{--                                                <input type="email" name="email" placeholder="Enter email address" required="">--}}
                            {{--                                                <button type="submit" class="theme-btn btn-one">Subscribe</button>--}}
                            {{--                                            </div>--}}
                            {{--                                        </form>--}}
                            {{--                                        <p><span>*</span>Never share your email with others.</p>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <!-- right end -->

                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->

    </div>

@endsection
