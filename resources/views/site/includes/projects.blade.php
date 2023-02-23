<!-- case-page-section -->
<section class="case-page-section">
    <div class="auto-container">
        <div class="sec-title style-two centred">
            <span class="top-text">About Our Projects</span>
            <h2>Our Projects</h2>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
        </div>
        <div class="row clearfix">

            @forelse($lastProjects as $project)
                <div class="col-lg-3 col-md-6 col-sm-12 case-block">
                    <div class="case-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('adminBoard/uploadedImages/projects/'.$project->photo)}}"
                                     alt=""></figure>
                            <div class="lower-content">
                                <div class="shape"
                                     style="background-image: url('{!! asset('/site/assets/images/shape/shape-11.png') !!}');"></div>
                                <div class="inner">
                                    <div class="text">
                                        <div class="category">
                                            <a href="#">#
                                                {!! $project->type =='current'  ? __('index.current_project'):  __('index.previous_project')!!}
                                            </a>
                                        </div>
                                        <h3>
                                            <a href="#">{!! Lang()=='ar'? $project->title_ar:$project->title_en !!}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse

        </div>
    </div>
</section>
<!-- case-page-section end -->
