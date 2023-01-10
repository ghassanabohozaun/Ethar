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
                        <a href="javascript:void(0);" class="text-muted">
                            {{trans('menu.users')}}
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
                <a href="{!! route('users.trashed') !!}"
                   class="btn btn-light-danger trash_btn" title="{{trans('general.trash')}}">
                    <i class="fa fa-trash"></i>
                </a>
                &nbsp;
                <a href="{!! route('user.create') !!}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_new_user')}}
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
                                                        <th>Photo</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>role_id</th>
                                                        <th>status</th>
                                                        <th class="text-center" style="width: 100px;">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($users as $user)
                                                        <tr>
                                                            <td>
                                                                @if($user->photo == null)
                                                                    @if($user->gender == trans('general.male'))
                                                                        <img
                                                                            src="{{asset('adminBoard/images/male.jpeg')}}"
                                                                            width="70"
                                                                            class="img-fluid img-thumbnail"/>
                                                                    @else
                                                                        <img
                                                                            src="{{asset('adminBoard/images/female.jpeg')}}"
                                                                            width="70"
                                                                            class="img-fluid img-thumbnail"/>
                                                                    @endif

                                                                @else
                                                                    <img
                                                                        src="{{asset(Storage::url($user->photo))}}"
                                                                        width="70"
                                                                        style="border-radius: 10px"
                                                                        class="img-fluid img-thumbnail"/>
                                                                @endif
                                                            </td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>

                                                                @if(Lang()=='ar')
                                                                    <span class="text-info">
                                                                                      {!! $user->role->role_name_ar !!}
                                                                                    </span>
                                                                @else
                                                                    <span class="text-info">
                                                                                       {!! $user->role->role_name_en !!}
                                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="cst-switch switch-sm">
                                                                    <input type="checkbox"
                                                                           id="change_status"
                                                                           {{$user->status == 'on' ? 'checked':''}}  data-id="{{$user->id}}"
                                                                           class="change_status">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('user.edit',$user->id)}}"
                                                                   class="btn btn-hover-primary btn-icon btn-pill "
                                                                   title="{{trans('general.edit')}}">
                                                                    <i class="fa fa-edit fa-1x"></i>
                                                                </a>

                                                                <a href="#"
                                                                   class="btn btn-hover-danger btn-icon btn-pill delete_user_btn"
                                                                   data-id="{{$user->id}}"
                                                                   title="{{trans('general.delete')}}">
                                                                    <i class="fa fa-trash fa-1x"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                No Users found
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="float-right">
                                                                {!! $users->appends(request()->all())->links() !!}
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

                        <form class="d-none" id="form_user_delete">
                            <input type="text" id="user_delete_id">
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

        ///////////////////////////////////////////////////
        /// Show user Delete Notify
        $(document).on('click', '.delete_user_btn', function (e) {
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
                        url: '{!! route('user.destroy') !!}',
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
                                    customClass: {confirmButton: 'delete_user_button'}
                                });
                                $('.delete_user_button').click(function () {
                                    //updateDataTable
                                    $('#myTable').load(location.href + (' #myTable'));
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
                        customClass: {confirmButton: 'cancel_delete_user_button'}
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
                url: "{{route('user.change.status')}}",
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

