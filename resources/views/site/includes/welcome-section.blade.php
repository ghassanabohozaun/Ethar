<!-- case-page-section -->
<section class="case-page-section">
    <div class="auto-container">
        <div class="sec-title style-two centred">
            <span class="top-text">About Our Projects</span>
            <h2>Current Projects</h2>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
        </div>
        <div class="row clearfix">

            @forelse($currentProjects as $currentProject)
                <div class="col-lg-3 col-md-6 col-sm-12 case-block">
                    <div class="case-block-one">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('adminBoard/uploadedImages/projects/'.$currentProject->photo)}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="shape"
                                     style="background-image: url('{!! asset('/site/assets/images/shape/shape-11.png') !!}');"></div>
                                <div class="inner">
                                    <div class="text">
                                        <div class="category"><a href="#"># Health & Food</a></div>
                                        <h3><a href="#">{!! Lang()=='ar'? $currentProject->title_ar:$currentProject->title_en !!}</a></h3>
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
