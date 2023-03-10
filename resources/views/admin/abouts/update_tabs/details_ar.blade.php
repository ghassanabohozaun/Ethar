<div class="tab-pane fade" id="about_details_ar" role="tabpanel" aria-labelledby="about_details_ar_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{__('abouts.title_ar')}}
                            </label>

                            <input type="text" class="form-control form-control-solid form-control-lg"
                                   name="title_ar" id="title_ar" value="{{$about->title_ar}}"
                                   placeholder="{{__('abouts.title_ar')}}"
                                   autocomplete="off">
                            <span class="form-text text-danger"
                                  id="title_ar_error"></span>

                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{__('abouts.des_ar')}}</label>
                            <textarea class="form-control summernote"
                                      placeholder="{{__('abouts.des_ar')}}"
                                      name="details_ar"
                                      id="abstract_ar">{{$about->details_ar}}</textarea>
                            <span class="form-text text-danger"
                                  id="abstract_ar_error"></span>
                        </div>
                        <!--end::Group-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('js')
@endpush
