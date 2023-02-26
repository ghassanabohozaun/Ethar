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
                        @if (Lang() == 'ar')
                        <h1>{{ __('site.details') .' ' . __('site.'.$publication->type)  }} </h1>
                            
                        @else
                        <h1>{{ __('site.'.$publication->type) .' '. __('site.details')}} </h1>
                            
                        @endif
                       
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">{{__('index.home')}}</a></li>
                        <li>
                            @if (Lang() == 'ar')
                           {{ __('site.details') .' ' . __('site.'.$publication->type)  }} 
                                
                            @else
                            {{ __('site.'.$publication->type) .' '. __('site.details')}} 
                                
                            @endif
                        </li>
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
                                    <span># Advertisements #</span>
                                    <h2>{{$publication->{'title_'.Lang()} }}</h2>
                                    <ul class="post-info clearfix">
                                        <li><i class="far fa-user"></i>{{$publication->writer}}</li>
                                        <li><i class="far fa-eye"></i>{{$publication->views}}</li>
                                    </ul>
                                </div>
                                <figure class="image-box">
                                    <img src="{!! asset('adminBoard\\uploadedImages\\publications\\'. $publication->photo) !!}" alt="">
                                    <span class="post-date">{{$publication->date}}</span>
                                </figure>
                                <div class="text">
                                    <p>{!! $publication->{'details_'.Lang()} !!}</p>
                                </div>

                                <br/>
                                @if($publication->file != null)
                                <div class="font-weight-bold mt-5"><h5> <a class="font-weight-bold"
                                    href="{{asset('adminBoard\\uploadedFiles\\publications\\'. $publication->file)}}"
                                    target="_blank">{!! __('general.download') !!} PDF</a></h5>
                                </div>
                                @endif
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
