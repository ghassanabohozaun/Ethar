<div class="tab-pane fade" id="about_details_en" role="tabpanel" aria-labelledby="about_details_en_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{__('abouts.title_en')}}
                            </label>
                            <input type="text" class="form-control form-control-solid form-control-lg"
                                   name="title_en" id="title_en" value="{{$about->title_en}}"
                                   placeholder="{{__('abouts.title_en')}}"
                                   autocomplete="off">
                            <span class="form-text text-danger"
                                  id="title_en_error"></span>

                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{__('abouts.des_en')}}</label>
                            <textarea class="form-control summernote"
                                      placeholder="{{__('abouts.des_en')}}"
                                      name="details_en"
                                      id="details_en">{{$about->details_en}}</textarea>
                            <span class="form-text text-danger"
                                  id="abstract_en_error"></span>
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
