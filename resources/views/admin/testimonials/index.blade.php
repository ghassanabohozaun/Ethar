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
                                                        <th>{!! __('general.actions') !!}</th>
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
                                                                           {{$testimonial->status == '1' ? 'checked':''}}  data-id="{{$testimonial->id}}"
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
        //////////////////////////////////////////////////////
        // show  delete opinion notify
        $(document).on('click', '.delete_opinion_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#opinion_delete_id').val(id);

            $.notifyClose();
            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_opinion_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_opinion_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')

        });
        //////////////////////////////////////////////////////
        //  close delete opinion notify
        $('body').on('click', '#btn_opinion_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#opinion_delete_id').val('');
        })
        //////////////////////////////////////////////////////
        //  delete opinion
        $('body').on('click', '#btn_opinion_delete', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $('#opinion_delete_id').val();

            $.ajax({
                url: "{{route('admin.testimonials.destroy')}}",
                data: {id, id},
                dataType: 'json',
                type: 'POST',
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        $('#opinion_delete_id').val('');
                        updateDataTable();
                    }

                    if (data.status == false) {
                        notifySuccessOrError(data.msg, 'warning');
                    }
                },

                complete: function () {
                    KTApp.unblockPage();
                }
            });


        })

        /////////////////////////////////////////////////////////////////////////////////////
        // change opinion status
        $('body').on('click', '.change_status', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $(this).data('id');

            $.ajax({
                url: "{{route('admin.testimonials.change-status')}}",
                data: {id: id},
                type: 'post',
                dataType: 'JSON',
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        updateDataTable();
                    }
                },//end success

            })


        });

    </script>
@endpush

