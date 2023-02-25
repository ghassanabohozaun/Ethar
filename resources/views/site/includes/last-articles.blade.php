<section class="news-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <span class="top-text">{!! __('index.blog_and_article') !!}</span>
            <h2>{!! fixedTexts()->{'blog_title_'.Lang()} !!}</h2>
        </div>
        <div class="row clearfix">

            @forelse($lastArticles as $lastArticle)
                <div class="col-lg-3 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                         data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <a href="#">
                                    <img src="{{asset('adminBoard/uploadedImages/articles/'.$lastArticle->photo)}}"
                                         alt="{!! $lastArticle->{'title_'.Lang()}!!}">
                                </a>
                            </figure>
                            <div class="content-box">
                                <div class="text">
                                    <span class="post-date">{!! $lastArticle->publish_date !!}</span>
                                    <div class="category"><a href="#"># {!! __('index.articles') !!}</a></div>
                                    <h3>
                                        <a href="#">{!! $lastArticle->{'title_'.Lang()} !!}</a>
                                    </h3>
                                    <p>
                                        {!! \Illuminate\Support\Str::limit(strip_tags($lastArticle->{'abstract_'.Lang()}),$limit = 70, $end = ' ...')!!}
                                    </p>
                                </div>
                                <div class="info clearfix">
                                    <div class="link-box pull-left">
                                        <a href="javascript:void(0)">{!! __('index.more_details') !!}</a>
                                    </div>
                                    <div class="comment-box pull-right">
                                        <a href="javascript:void(0)">
                                            <i class="far fa-comment"></i>
                                            {!! \App\Models\Comment::where('status','on')->where('post_id',$lastArticle->id)->count() !!}
                                            {!! __('index.comments') !!}
                                        </a>
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
