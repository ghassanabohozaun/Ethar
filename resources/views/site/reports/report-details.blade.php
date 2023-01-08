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
                 style="background-image: url({!! asset('site/assets/images/background/12.jpg') !!}); margin-top: 80px">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>Report Details</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Report Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <div class="discription-inner">
            <div class="tabs-box">
                <div class="tab-btn-box centred">
                    <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn" data-tab="#tab-1">Description</li>
                        <li class="tab-btn active-btn" data-tab="#tab-2">Reviews - 3</li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab" id="tab-1">
                        <div class="text">
                            <p>Nor again is there anyone who loves or pursues or desires to pain of itself, because it is pain, but because occasionally circumstances occur in which toil and paincan procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious except to obtain some advantage from it? But who has any right to find fault with a man who chooses.</p>
                            <p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a completed great the great explorer of the truth, the master-builder of human happiness except to obtain some advantage.</p>
                        </div>
                    </div>
                    <div class="tab active-tab" id="tab-2">
                        <div class="customer-review">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item">
                                        <figure class="thumb-box"><img src="assets/images/resource/shop/review-1.jpg" alt=""></figure>
                                        <div class="content-box">
                                            <ul class="rating clearfix">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <h4>Steven Rich, <span>Mar 28, 2021</span></h4>
                                            <p>Indignation and dislike men who are so beguiled and demoralized by the charms of pleasure.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                    <div class="single-item">
                                        <figure class="thumb-box"><img src="assets/images/resource/shop/review-1.jpg" alt=""></figure>
                                        <div class="content-box">
                                            <ul class="rating clearfix">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <h4>Steven Rich, <span>Mar 28, 2021</span></h4>
                                            <p>Indignation and dislike men who are so beguiled and demoralized by the charms of pleasure.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customer-comments">
                            <div class="text">
                                <h3>Add Your Comments</h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>
                            <div class="form-inner">
                                <form action="product-details.html" method="post" class="review-form">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <label>Comments</label>
                                                <textarea name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 column">
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input type="text" name="name" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 column">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input type="email" name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" name="website" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="rating clearfix">
                                                <p>Your Review</p>
                                                <ul>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group clearfix">
                                                <button type="submit" class="theme-btn btn-one">Submit</button>
                                                <label class="custom-control material-checkbox">
                                                    <input type="checkbox" class="material-control-input">
                                                    <span class="material-control-indicator"></span>
                                                    <span class="description">Save my name, email, and website in this browser for the next time I comment.</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
