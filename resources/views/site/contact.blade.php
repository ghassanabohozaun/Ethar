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
                        <h1>Contact</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{!! route('index') !!}">Home</a></li>
                        <li>Pages</li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- contact-section -->
        <section class="contact-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="contact-info-inner">
                            <div class="sec-title">
                                <span class="top-text">Connecting Always</span>
                                <h2>Hear by our association</h2>
                            </div>
                            <div class="info-box">

                                <div class="single-item">
                                    <h4>Contact</h4>
                                    <div class="text">
                                        <div class="icon-box"><i class="icon-phone-call"></i></div>
                                        <p>Phone<br/><a href="tel:00972592404940">00972592404940</a></p>
                                    </div>
                                </div>

                                <div class="single-item">
                                    <h4>Emergency contact</h4>
                                    <div class="text">
                                        <div class="icon-box"><i class="icon-phone-call"></i></div>
                                        <p>Phone<br/><a href="tel:00972592404940">00972592404940</a></p>
                                    </div>
                                </div>


                                <div class="single-item">
                                    <h4>Email Address</h4>
                                    <div class="text">
                                        <div class="icon-box"><i class="icon-letter"></i></div>
                                        <p>Mail to<br/><a href="mailto:info@example.com">info@example.com</a></p>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <h4>Mailing Address</h4>
                                    <div class="text">
                                        <div class="icon-box"><i class="icon-location"></i></div>
                                        <p>palestine , Gaza <br/>Gaza</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="contact-form-inner">
                            <div class="sec-title">
                                <span class="top-text">Drop a Line</span>
                                <h2>Leave us Message</h2>
                            </div>
                            <div class="form-inner">

                                <form method="POST" enctype="multipart/form-data" action="{!! route('send.contact.message') !!}"
                                      id="form_contact_message_send" class="default-form">
                                    @csrf

                                    <div class="form-group">
                                        <i class="far fa-user"></i>
                                        <input type="text" name="customer_name" id="customer_name"
                                               autocomplete="off" placeholder="Your Name">
                                        <span id="customer_name_error" class="form-text text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                        <i class="far fa-envelope"></i>
                                        <input type="email" name="customer_email" id="customer_email"
                                               autocomplete="off" placeholder="Email Address">
                                        <span  class="form-text text-danger font-size-14">{!! __('index.email') !!} someone@someone.com</span>
                                    </div>


                                    <div class="form-group">
                                        <i class="far fa-sticky-note"></i>
                                        <input type="text" name="title" id="title" autocomplete="off"
                                               placeholder="title">
                                        <span id="title_error" class="form-text text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                        <i class="far fa-text-height"></i>
                                        <textarea name="message" id="message" autocomplete="off"
                                                  placeholder="Massage" rows="50"></textarea>
                                        <span id="message_error" class="form-text text-danger"></span>
                                    </div>
                                    <div class="form-group message-btn">

                                        <button class="theme-btn btn-one" type="submit">
                                            Send Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->

        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
@push('scripts')

    <script src="{{asset('adminBoard/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">

        // $('#reload').click(function () {
        //     $.ajax({
        //         type: 'GET',
        //         url: 'reload-captcha',
        //         success: function (data) {
        //             $(".captcha span").html(data.captcha);
        //         }
        //     });
        // });


        /////////////////////////////////////////////////////////////////////
        // Validation
        $('#form_contact_message_send').validate({
            rules: {
                customer_name: {
                    required: true,
                },
                customer_email: {
                    required: true,
                    email: true
                },
                title: {
                    required: true,
                },
                message: {
                    required: true,
                },
                captcha: {
                    required: true,
                },
            },
            messages: {
                customer_name: {
                    required: '{{trans('site.it_is_required')}}',
                },
                customer_email: {
                    required: '{{trans('site.it_is_required')}}',
                    email: '{{trans('site.email_email')}}',
                },
                title: {
                    required: '{{trans('site.it_is_required')}}',
                },
                message: {
                    required: '{{trans('site.it_is_required')}}',
                },
                captcha: {
                    required: '{{trans('site.it_is_required')}}',
                },
            },
        });

        ////////////////////////////////////////////////////
        $(document).on('submit', 'form', function (e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#customer_name').css('border-color', '');
            $('#customer_email').css('border-color', '');
            $('#title').css('border-color', '');
            $('#message').css('border-color', '');
            $('#captcha').css('border-color', '');
            $('#captcha').css('border-color', '');
            $('#captcha').css('border-color', '');


            $('#customer_name_error').text('');
            $('#customer_email_error').text('');
            $('#title_error').text('');
            $('#message_error').text('');
            $('#captcha_error').text('');
            /////////////////////////////////////////////////////////////
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: type,
                data: data,
                dataType: false,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {

                },

                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.msg
                        })
                    }
                    $('#form_contact_message_send')[0].reset();
                },

                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');
                    });
                },
                complete: function () {
                },
            })

        });//end submit
    </script>
@endpush
