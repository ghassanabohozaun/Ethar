@extends('layouts.admin')
@section('content')
    <style>
        .card_name_span {
            font-size: 18px
        }
    </style>

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div
            class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <!--begin::Page Title-->
                <span class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    {{__('menu.dashboard')}}
                </span>
                <!--end::Page Title-->

                <!--begin::Actions-->

            </div>
            <!--end::Info-->

        </div>
    </div>
    <!--end::Subheader-->



    <!--begin::content-->
    <div class="d-flex flex-column-fluid" style="margin-bottom: 5px">


        <!--begin::Container-->
        <div class=" container-fluid ">

            <!--begin::Counters-->
            <div class="row">
                <!------------------------- start Teachers Count ---------------->
                <div class="col-xl-3">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-info-o-80 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span>
                                <!--begin::Svg Icon-->
                                <i class="fa fa-users fa-3x" style="color: #3699FF"></i>
                                <!--end::Svg Icon-->
                            </span>

                            <span
                                class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 text-hover-primary d-block">
                                  11
                                </span>
                            <span
                                class="font-weight-bold card_name_span">
                                   عداد
                                </span>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------- end Teachers Count ----------------->


                <!------------------------- start Mawhobs count ---------->
                <div class="col-xl-3">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-primary-o-50 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span>
                                <!--begin::Svg Icon-->
                            <span class="svg-icon menu-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path
                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path
                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                            fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                        </svg><!--end::Svg Icon--></span>
                    </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span
                                class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 text-hover-primary d-block">
                                   222
                                </span>
                            <span class="font-weight-bold card_name_span">
                                     عداد
                                </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------- end Mawhobs count ----------->


                <!------------------------ start Courses count----------->
                <div class="col-xl-3">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-warning-o-80 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span>
                                <!--begin::Svg Icon-->
                              <span class="svg-icon menu-icon">
                                    <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Duplicate.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M15.9956071,6 L9,6 C7.34314575,6 6,7.34314575 6,9 L6,15.9956071 C4.70185442,15.9316381 4,15.1706419 4,13.8181818 L4,6.18181818 C4,4.76751186 4.76751186,4 6.18181818,4 L13.8181818,4 C15.1706419,4 15.9316381,4.70185442 15.9956071,6 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path
                                        d="M10.1818182,8 L17.8181818,8 C19.2324881,8 20,8.76751186 20,10.1818182 L20,17.8181818 C20,19.2324881 19.2324881,20 17.8181818,20 L10.1818182,20 C8.76751186,20 8,19.2324881 8,17.8181818 L8,10.1818182 C8,8.76751186 8.76751186,8 10.1818182,8 Z"
                                        fill="#000000"></path>
                                    </g>
                                    </svg><!--end::Svg Icon--></span>
                                 </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span
                                class="card-title font-weight-bolder  font-size-h2 mb-0 mt-6 text-hover-primary d-block">
                                  333
                                </span>
                            <span class="font-weight-bold  card_name_span">
                                    عداد
                                </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------ end  Courses count ----------->


                <!------------------------ start programs count----------->
                <div class="col-xl-3">
                    <!--begin::Stats Widget 32-->
                    <div class="card card-custom bg-dark-o-80 card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span>
                                    <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                    <rect fill="#000000" opacity="0.3"
                                          transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                          x="3"
                                          y="3" width="18" height="7" rx="1"/>
                                    <path
                                        d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                        fill="#000000"/>
                                    </g>
                                    </svg><!--end::Svg Icon--></span>
                            </span>
                            <span
                                class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 text-hover-primary d-block">
                                   444
                                  </span>
                            <span class="font-weight-bold  card_name_span">
                                   عداد
                                </span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 32-->
                </div>
                <!------------------------ end programs count ----------->


            </div>
            <!--end::Counters-->


            <!--begin::Flow Charts-->
            <div class="card card-custom gutter-b">

                <div class="card-body py-2" style="">
                    <div class="container-fluid">
                        <div class="row">

                            <!--begin::Registration-->
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <div style="width: 100% ; margin: auto">
                                        <canvas id="barChart" width="1100" height="500"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!--end::Registration-->


                            <!--begin::Registration-->
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <div style="width: 100% ; margin: auto">
                                        <canvas id="barChart2" width="1100" height="500"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!--end::Registration-->

                        </div>
                    </div>
                </div>

                <!--end::Body-->
            </div>
            <!--end::Last Courses-->

            <div class="row ">

                <!--begin::-->
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">
                            {{__('site.Latest_comments')}}
                            </span>
                        </h3>
                    </div>
                    <!--end::Header-->


                    <!--begin::Body-->
                    <div class="card-body py-2" style="overflow:auto; height: 350px">
                        <div class="container-fluid">
                            <div class="row">


                                <div class="col-6">
                                    <div class="table-responsive ">
                                        <table class="table" style="text-align: center;vertical-align: middle;">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{!! __('articles.photo') !!}</th>
                                                <th scope="col">{!! __('articles.title') !!}</th>
                                                <th scope="col">{!! __('index.views_count') !!}</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($articles as $key=>$article)
                                                <tr>
                                                    <td>{!! $key+1 !!}</td>
                                                    <td>
                                                        <img
                                                            src="{{ asset('adminBoard/uploadedImages/articles/'.$article->photo) }}"
                                                            class="img-fluid img-thumbnail table-image "/>
                                                    </td>
                                                    <td>{!!  $article->{'title_'.Lang()}!!}</td>
                                                    <td>{!!  $article->views!!}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                    <div class="col-6">
                                        <div class="table-responsive ">
                                            <table class="table" style="text-align: center;vertical-align: middle;">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{!! __('articles.person_name') !!}</th>
                                                    <th scope="col">{!! __('articles.commentary') !!}</th>
                                                    <th scope="col">{!! __('articles.date') !!}</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($comments as $key=>$comment)
                                                    <tr>
                                                        <td>{!! $key+1 !!}</td>
                                                        <td>{!!  $comment->person_name!!}    </td>
                                                        <td>{!!  $comment->commentary!!}</td>
                                                        <td>{!!  $comment->created_at->format('Y-m-d')!!}</td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>



                            </div>
                        </div>
                    </div>
                    <!--end::Body-->


                </div>
                <!--end::Last Commint-->
            </div>


        </div>
        <!--end::Container-->

    </div>
    <!--end::content-->

@endsection


@push('js')

    <script type="text/javascript" src="{!! asset('adminBoard/assets/js/Chart.bundle.min.js') !!}"></script>
    <script type="text/javascript">

        $(function () {
            var ArticleData = <?php echo json_encode($ArticleData); ?>;
            var barCanvas = $("#barChart");
            var barChart = new Chart(barCanvas, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: '{!! trans('dashboard.chart_article') !!}',
                            data: ArticleData,
                            backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'violet', 'purple', 'pink', 'indigo', 'silver', 'gold', 'brown']
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxis: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        });


        $(function () {
            var ProjectData = <?php echo json_encode($ProjectData); ?>;
            var barCanvas = $("#barChart2");
            var barChart = new Chart(barCanvas, {
                type: 'line',
                data: {
                    labels: ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
                    datasets: [
                        {
                            label: '{!! trans('dashboard.chart_projects') !!}',
                            data: ProjectData,
                            backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'violet', 'purple', 'pink', 'indigo', 'silver', 'gold', 'brown']
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxis: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            })
        });

    </script>
@endpush
