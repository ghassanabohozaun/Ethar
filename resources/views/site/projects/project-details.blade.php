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

    <div class="boxed_wrapper {!! Lang()=='ar' ? 'rtl':'' !!}"
         style="background-image: url({!! asset('/site/assets/images/shape/shape-23.png') !!});">


        <!-- header -->
        @include('site.includes.header')
        <!-- header end -->


        <!-- Page Title -->
        <section class="page-title"
                 style="background-image: url({!! asset('site/assets/images/background/12.jpg') !!});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>{{ $project->{'title_'.Lang()} }}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
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
                                    <span class="text-capitalize">
                                        # {!! $project->type !!}  {!!  __('index.project') !!}
                                    </span>
                                    <h2>{!! $project->{'title_'.Lang()} !!}</h2>
                                    <ul class="post-info clearfix">
                                        <li>
                                            <i class="far fa-eye"></i>
                                            {!! $project->views !!}
                                        </li>
                                    </ul>
                                </div>
                                <figure class="image-box">
                                    <img
                                        src="{!!  asset('adminBoard/uploadedImages/projects/'. $project->photo) !!}"
                                        alt="{!! $project->{'title_'.Lang()} !!}">
                                    <span class="post-date">{!! $project->date !!}</span>
                                </figure>
                                <div class="text">
                                    <p>{!! $project->{'details_'.Lang()} !!}</p>
                                </div>
                                <br/>
                                @if($project->file != null)
                                    <div class="font-weight-bold mt-5">
                                        <h5>
                                            <a class="font-weight-bold"
                                               href="{!! asset('adminBoard/uploadedFiles/project/'. $project->file) !!}"
                                               target="_blank">{!! __('general.download') !!}
                                                {!! __('index.pdf') !!}
                                            </a>
                                        </h5>
                                    </div>
                                @endif
                                <br/>

                                @if($project->word != null)
                                    <div class="font-weight-bold mt-1">
                                        <h5>
                                            <a class="font-weight-bold"
                                               href="{!! asset('adminBoard/uploadedFiles/project/'. $project->word) !!}"
                                               target="_blank">{!! __('general.download') !!}
                                                {!! __('index.word') !!}
                                            </a>
                                        </h5>
                                    </div>
                                @endif
                                <br/>


                                @if ( $project->publications()->first() !=null  )
                                    <li class="share">
                                        {{-- <i class="fas fa-book"></i> --}}
                                        <h5>
                                            <a class="font-weight-bold"
                                               href="{!! route('project-case-study',slug($project->{'title_'.Lang()}) )!!}">
                                                {!! __('index.visit_case_studies') !!}
                                            </a>
                                        </h5>
                                    </li>
                                @endif


                            </div>

                        </div>
                    </div>
                    <!-- left end -->

                    <!-- right  -->
                    <div class="col-lg-4 col-md-12 col-sm-12 ">
                        <div class="blog-sidebar default-sidebar">


                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h3>{{__('site.counter')}}</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list clearfix">
                                        <li><a href="#">{{__('site.projects')}}
                                                <span>{{App\Models\Projects::count()}}</span></a></li>
                                        <li><a href="#">{{__('site.News')}}
                                                <span>{{App\Models\Article::count()}}</span></a></li>
                                        <li><a href="#">{{__('site.Advertisements')}}
                                                <span>{{App\Models\Publications::where('type','Advertisements')->count()}}</span></a>
                                        </li>
                                        <li><a href="#">{{__('site.Brochures')}}
                                                <span>{{App\Models\Publications::where('type','Brochures')->count()}}</span></a>
                                        </li>
                                        <li><a href="#">{{__('site.CaseStudy')}}
                                                <span>{{App\Models\Publications::where('type','CaseStudy')->count()}}</span></a>
                                        </li>
                                        <li><a href="#">{{__('site.ScientificArticles')}}
                                                <span>{{App\Models\Publications::where('type','ScientificArticles')->count()}}</span></a>
                                        </li>

                                        <li><a href="#">{{__('site.Reports')}}
                                                <span>{{App\Models\Report::count()}}</span></a></li>

                                    </ul>
                                </div>
                            </div>


                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h3>{{__('site.Latest_News')}}</h3>
                                </div>
                                <div class="post-inner">
                                    @foreach ($news as $new)

                                        <div class="post">
                                            <figure class="post-thumb">
                                                <a href="{{route('new-details',slug($new->{'title_'.Lang()})) }}">
                                                    <img
                                                        src="{{asset('adminBoard\\uploadedImages\\articles\\'. $new->photo	)}}"
                                                        alt="">
                                                </a>
                                            </figure>
                                            <h5><a href="{{route('new-details',slug($new->{'title_'.Lang()})) }}">{{$new->{'title_'.Lang()} }}</a></h5>
                                            <span class="post-date">{{$new->created_at->format('d.m.Y')}}</span>
                                        </div>
                                    @endforeach


                                </div>
                            </div>

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
