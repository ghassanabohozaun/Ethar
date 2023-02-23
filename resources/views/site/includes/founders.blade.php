<!-- team-section -->
<section class="team-section my-team-section centred"
         style="background-image: url(http://127.0.0.1:8000/site/assets/images/shape/shape-24.png);">
    <div class="pattern-layer "></div>
    <div class="fluid-container">
        <div class="sec-title centred">
            <span class="top-text">{!! __('index.meet_our_founders') !!}</span>
            <h2>{!! fixedTexts()->{'founders_title_'.Lang()} !!}</h2>
        </div>
        <div class="five-item-carousel owl-carousel owl-theme owl-nav-none">

            @forelse($founders as $founder)
                <div class="team-block-one">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{asset('adminBoard/uploadedImages/teams/'.$founder->photo)}}"
                                 alt="{!! $founder->{'name_'.Lang()} !!}">
                        </figure>
                        <div class="content-box">
                            <div class="info">
                                <span class="designation">{!! __('index.founder') !!}</span>
                                <h3>{!! $founder->{'name_'.Lang()} !!}</h3>
                            </div>
                            <figure class="thumb-box">
                                <img src="{!! asset('site/assets/images/team/team-1.png') !!}" alt="">
                            </figure>
                            <div class="text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                            </div>
                        </div>
                        <ul class="social-links clearfix">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
<!-- team-section end -->
