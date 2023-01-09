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
                        <a href="{!! route('users') !!}" class="text-muted">
                            {{trans('menu.users')}}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript(avoid);" class="text-muted">
                            {{trans('menu.trashed_users')}}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{!! route('users.trashed') !!}" class="text-muted">
                            {{trans('menu.show_all')}}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->


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
                                                <table class="table table-hover" id="myTable">
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
                                                    @forelse($trashedUsers as $user)
                                                        <tr>
                                                            <td>
                                                                @if($user->photo == null)
                                                                    @if($user->gender == trans('general.male'))
                                                                        <img
                                                                            src="{{asset('adminBoard/images/male.jpeg')}}"
                                                                            width="50" height="50"
                                                                            class=" img-thumbnail"/>
                                                                    @else
                                                                        <img
                                                                            src="{{asset('adminBoard/images/female.jpeg')}}"
                                                                            width="50" height="50"
                                                                            class="img-thumbnail"/>
                                                                    @endif

                                                                @else
                                                                    <img
                                                                        src="{{asset(Storage::url($user->photo))}}"
                                                                        width="70" height="70"
                                                                        style="border-radius: 10px"
                                                                        class=""/>
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
                                                                <a class="btn btn-hover-warning btn-icon btn-pill restore_user_btn"
                                                                   data-id="{{$user->id}}"
                                                                   title="{{trans('general.restore')}}">
                                                                    <i class="fa fa-trash-restore fa-1x"></i>
                                                                </a>


                                                                <a href="#"
                                                                   class="btn btn-hover-danger btn-icon btn-pill force_delete_user_btn"
                                                                   data-id="{{$user->id}}"
                                                                   title="{{trans('general.force_delete')}}">
                                                                    <i class="fa fa-trash-alt fa-1x"></i>
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
                                                                {!! $trashedUsers->appends(request()->all())->links() !!}
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
        /// Delete user
        $(document).on('click', '.force_delete_user_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "{{trans('general.ask_permanent_delete_record')}}",
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
                        url: '{!! route('user.force.delete') !!}',
                        data: {id, id},
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data.status == true) {
                                Swal.fire({
                                    title: "{!! trans('general.deleted') !!}",
                                    text: "{!! trans('general.delete_success_message') !!}",
                                    icon: "success",
                                    allowOutsideClick: false,
                                    customClass: {confirmButton: 'delete_user_button'}
                                });
                                $('.delete_user_button').click(function () {
                                    $('#myTable').load(location.href+(' #myTable'));
                                });
                            }
                        },//end success
                    });

                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        title: "{!! trans('general.cancelled') !!}",
                        text: "{!! trans('general.error_message') !!}",
                        icon: "error",
                        allowOutsideClick: false,
                        customClass: {confirmButton: 'cancel_delete_user_button'}
                    })
                }
            });
        })


        ////////////////////////////////////////////////////
        // restore user
        $(document).on('click', '.restore_user_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: "{{route('user.restore')}}",
                data: {id, id},
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
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'restore_user_button'}
                        });
                        $('.restore_user_button').click(function () {
                            $('#myTable').load(location.href+(' #myTable'));
                        });
                    }
                },//end success
            })
        })


    </script>
@endpush

