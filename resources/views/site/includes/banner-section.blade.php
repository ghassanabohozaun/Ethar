<section class="banner-section style-two centred">
    <div class="banner-carousel">
        <div class="swiper-container banner-content">
            <div class="swiper-wrapper">



                @forelse($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="image-layer"
                             style="background-image: url({{asset('adminBoard/uploadedImages/sliders/'.$slider->photo)}});">
                        </div>
                        <div class="auto-container">
                            <div class="content-box">
{{--                                <figure class="icon-layer">--}}
{{--                                    <img src="{!! asset('site/assets/images/icons/heart-5.png') !!}" alt="">--}}
{{--                                </figure>--}}
{{--                                <div class="shape"--}}
{{--                                     style="background-image: url({{asset('site/assets/images/shape/shape-31.png')}});">--}}
{{--                                </div>--}}
                                <span></span>
                                <h2> {!! Lang()=='ar'? $slider->title_ar:$slider->title_en !!}</h2>
                                <p>  {!! Lang()=='ar'? $slider->details_ar:$slider->details_en !!}</p>
                                {{--                                <div class="btn-box">--}}
                                {{--                                    <a href="#" class="banner-btn">Read More</a>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>
            <div class="swiper-nav-button">
                <!-- Add Arrows -->
                <div class="swiper-button-next"><i class="far fa-arrow-right"></i></div>
                <div class="swiper-button-prev"><i class="far fa-arrow-left"></i></div>
            </div>
        </div>
    </div>
</section>
