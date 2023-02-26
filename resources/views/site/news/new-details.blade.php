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
                        <h1>{{__('index.news')}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        
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
                                   
                                    <h2>{{$new->{'title_'.Lang()} }}</h2>
                                    <ul class="post-info clearfix">
                                      
                                        <li><i class="far fa-comment"></i>{{$new->comments()->count()}} Cmts</li>
                                        <li><i class="far fa-eye"></i>{{$new->views}} Views</li>
                                    </ul>
                                </div>
                                <figure class="image-box">
                                    <img src="{{asset('adminBoard\\uploadedImages\\articles\\'. $new->photo)}}" alt="">
                                    <span class="post-date">{{$new->publish_date}}</span>
                                </figure>
                                <div class="text">
                                    <p>{!! $new->{'abstract_'.Lang()} !!}</p>

                                </div>
                            </div>

                            <div class="comment-box">
                                <div class="group-title">
                                    <h3>Comments ({{$new->comments()->count()}} )</h3>
                                </div>
                                @foreach ($new->comments as $comment)
                                    
                                <div class="comment">
                                    <figure class="thumb-box">
                                        @if ($comment->photo)
                                        <img src="{{asset('adminBoard\\uploadedImages\\articles\\comments\\'. $comment->photo)}}" alt="">
                                        @else
                                        <img src="{!! asset('/site/assets/images/news/comment-1.jpg') !!}" alt="">
                                        @endif
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h3>{{$comment->person_name}}</h3>
                                            <span class="post-date"> {{$comment->created_at->format('d.m.Y')}} [{{$comment->created_at->format('H.i A')}} ]</span>
                                        </div>
                                        <p>{!! $comment->commentary !!}</p>
                                    </div>
                                </div>
                                @endforeach

                             
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

                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->

    </div>

@endsection
