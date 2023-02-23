<section class="testimonial-section">
    <div class="pattern-layer"
         style="background-image: url({{asset('site/assets/images/shape/shape-24.png')}});"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                <div class="content_block_3">
                    <div class="content-box">
                        <div class="sec-title">
                            <span class="top-text">{!! __('index.testimonials') !!}</span>
                            <h2>{!! fixedTexts()->{'testimonials_title_'.Lang()} !!}</h2>
                        </div>
                        <div class="text">
                            <p>{!! fixedTexts()->{'testimonials_details_'.Lang()} !!}</p>
                            <a href="#" class="theme-btn btn-one">{!! __('index.all_reviews') !!}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                <div class="inner-box">
                    <figure class="image-box"><img
                            src="{!! asset('site/assets/images/resource/testimonial-1.jpg') !!}" alt="">
                    </figure>
                    <div class="testimonial-inner">
                        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">

                            @forelse($testimonials as $testimonial)
                                <div class="testimonial-block-one">
                                    <div class="text">
                                        <div class="icon-box">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <p>{!! $testimonial->{'opinion_'.Lang()} !!}</p>
                                        <h4>{!! $testimonial->{'name_'.Lang()} !!}</h4>
                                        <span class="designation">{!! $testimonial->country !!}</span>
                                    </div>
                                    <figure class="testimonial-thumb">
                                        <img
                                            src="{{asset('adminBoard/uploadedImages/testimonials/'.$testimonial->photo)}}"
                                            alt="{!! $testimonial->{'opinion_'.Lang()} !!}">
                                    </figure>
                                </div>
                            @empty

                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
