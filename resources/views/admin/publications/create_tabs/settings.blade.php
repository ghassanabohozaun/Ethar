<div class="tab-pane fade  show active" id="article_settings" role="tabpanel"
     aria-labelledby="article_settings_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9" style="height: 580px">

                    <!--begin::body-->
                    <div class="my-5">

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                            {{trans('publications.photo')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div
                                    class="image-input image-input-outline"
                                    id="kt_article_photo">

                                    <div class="image-input-wrapper"
                                    ></div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="{{trans('general.change_image')}}">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="photo" id="photo"
                                               class="table-responsive-sm">
                                        <input type="hidden" name="photo_remove"/>
                                    </label>

                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip"
                                        title="Cancel avatar"><i class="ki ki-bold-close icon-xs text-muted"></i>
                                     </span>
                                </div>
                                <span
                                    class="form-text text-muted">{{trans('general.image_format_allow')}}
                                                            </span>
                                <span class="form-text text-danger"
                                      id="photo_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{trans('publications.file')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <input
                                    class="form-control  form-control-lg"
                                    type="file" name="file" id="file"
                                    placeholder=""/>
                                    <span
                                    class="form-text text-muted">{{trans('general.file_format_allow')}}
                                                            </span>
                                <span class="form-text text-danger"
                                      id="course_details_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                              {{trans('publications.date')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="input-group date">
                                    <input type="text" class="form-control"
                                           id="date" name="date"
                                           readonly placeholder="{{trans('articles.enter_publish_date')}}"/>
                                    <div class="input-group-append">
							         <span class="input-group-text">
								        <i class="la la-calendar-check-o"></i>
							         </span>
                                    </div>
                                </div>
                                <span class="form-text text-danger"
                                      id="date_error"></span>
                            </div>
                            <!--end::Group-->
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{trans('publications.writer')}}
                            </label>

                            <div  class="col-lg-9 col-xl-9">
                                <input type="text" class="form-control form-control-solid form-control-lg"
                                       name="writer" id="writer"
                                       placeholder="{{trans('publications.writer')}}"
                                       autocomplete="off">
                                <span class="form-text text-danger"
                                      id="writer_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->

                         <!--begin::Group-->
                         <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                             {{trans('publications.type')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">

                                <select
                                    class="form-control  form-control-lg"
                                    name="type" id="type" type="text">

                                    <option value="Advertisements">
                                        @if(Lang() == 'ar')
                                        الإعلانات
                                        @elseif(Lang() == 'en')
                                        Advertisements
                                        @endif

                                    </option>

                                    <option value="Brochures">

                                        @if(Lang() == 'ar')
                                        نشرة
                                        @elseif(Lang() == 'en')
                                        Brochures
                                        @endif
                                    </option>

                                    <option value="CaseStudy">
                                        @if(Lang() == 'ar')
                                        دراسة الحالة
                                        @elseif(Lang() == 'en')
                                        Case Study
                                        @endif

                                    </option>

                                    <option value="ScientificArticles">

                                        @if(Lang() == 'ar')
                                        مقالات علمية
                                        @elseif(Lang() == 'en')
                                        Scientific Articles
                                        @endif
                                    </option>

                                </select>
                                
                                <span class="form-text text-danger"
                                      id="gender_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@push('js')


    <script type="text/javascript">

        /////////////////////////////////////////////////////////////
        var article_photo = new KTImageInput('kt_article_photo');
        ////////////////////////////////////////////////////////////
        ///////// Datepicker
        $('#date').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ LaravelLocalization::getCurrentLocale()}}",
            autoclose: true,
            todayHighlight: true,
        });
    </script>
@endpush
