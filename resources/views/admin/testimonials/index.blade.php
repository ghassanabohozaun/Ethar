@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <!--begin::Actions-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">
                            {{trans('menu.clients_opinions')}}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">
                            {{trans('menu.show_all')}}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a href="{{route('admin.testimonials.create')}}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_new_testimonial')}}
                </a>
                &nbsp;
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::content-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom" id="card_posts">
                        <div class="card-body">

                            <!--begin: Datatable-->
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="scroll">
                                            <div class="table-responsive">
                                                <table class="table myTable table-hover" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{!! __('testimonials.photo') !!}</th>
                                                        <th>{!! __('testimonials.opinion_ar') !!}</th>
                                                        <th>{!! __('testimonials.opinion_en') !!}</th>
                                                        <th>{!! __('testimonials.name_ar') !!}</th>
                                                        <th>{!! __('testimonials.name_en') !!}</th>
                                                        <th>{!! __('testimonials.rating') !!}</th>
                                                        <th>{!! __('testimonials.status') !!}</th>
                                                        <th  class="text-center" style="width: 100px;">{!! __('general.actions') !!}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($testimonials as $testimonial)
                                                        <tr>
                                                            <td>{!! $loop->iteration !!}</td>
                                                            <td>@include('admin.testimonials.parts.photo')</td>
                                                            <td>{{ $testimonial->opinion_ar }}</td>
                                                            <td>{{ $testimonial->opinion_en }}</td>
                                                            <td>{{ $testimonial->name_ar }}</td>
                                                            <td>{{ $testimonial->name_en }}</td>
                                                            <td>{{ $testimonial->rating }}</td>
                                                            <td>
                                                                <div class="cst-switch switch-sm">
                                                                    <input type="checkbox"
                                                                           {{$testimonial->status == 'on' ? 'checked':''}}  data-id="{{$testimonial->id}}"
                                                                           class="change_status">
                                                                </div>
                                                            </td>
                                                            <td>@include('admin.testimonials.parts.options')</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="9" class="text-center">
                                                                {!! __('testimonials.no_testimonials_found') !!}
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="9">
                                                            <div class="float-right">
                                                                {!! $testimonials->appends(request()->all())->links() !!}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Datatable-->

                        </div>

                        <form class="d-none" id="form_opinion_delete">
                            <input type="hidden" id="opinion_delete_id">
                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->

        <!--begin::Form-->
    </div>
    <!--end::content-->



@endsection
@push('js')

    <script type="text/javascript">
        //Show user Delete Notify
        $(document).on('click', '.delete_testimonial_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "{{trans('general.ask_delete_record')}}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{trans('general.yes')}}",
                cancelButtonText: "{{trans('general.no')}}",
                reverseButtons: false,
                allowOutsideClick: false,
            }).then(function (result) {
                if (result.value) {
                    //////////////////////////////////////
                    // Delete User
                    $.ajax({
                        url: '{!! route('admin.testimonials.destroy') !!}',
                        data: {id, id},
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data.status == true) {
                                Swal.fire({
                                    title: "{!! trans('general.deleted') !!}",
                                    text: data.msg,
                                    icon: "success",
                                    allowOutsideClick: false,
                                    customClass: {confirmButton: 'delete_testimonial_button'}
                                });
                                $('.delete_testimonial_button').click(function () {
                                    $('#myTable').load(location.href+(' #myTable'));
                                });
                            }
                        },//end success
                    });

                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        title: "{!! trans('general.cancelled') !!}",
                        text: "{!! trans('general.cancelled_message') !!}",
                        icon: "error",
                        allowOutsideClick: false,
                        customClass: {confirmButton: 'cancel_delete_testimonial_button'}
                    })
                }
            });

        })


        // switch english language
        var switchStatus = false;
        $('body').on('change', '.change_status', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                switchStatus = $(this).is(':checked');
            } else {
                switchStatus = $(this).is(':checked');
            }

            $.ajax({
                url: "{{route('admin.testimonials.change-status')}}",
                data: {switchStatus: switchStatus, id: id},
                type: 'post',
                dataType: 'JSON',
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },//end beforeSend
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'switch_status_toggle'}
                        });
                        $('.switch_status_toggle').click(function () {
                        });
                    }
                },//end success
            })
        });

    </script>
@endpush

