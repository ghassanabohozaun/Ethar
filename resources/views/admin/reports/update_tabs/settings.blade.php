<div class="tab-pane fade  show active" id="article_settings" role="tabpanel"
     aria-labelledby="article_settings_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9" style="height: 400px">

                     <!--begin::body-->
                     <div class="my-5">

                          <!--begin::Group-->
                          <div class=" form-group row d-none">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                ID
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <input value="{{$report->id}}"
                                       class="form-control form-control-solid form-control-lg"
                                       name="id" id="id" type="hidden"
                                       autocomplete="off"/>
                                       <input type="hidden" name="hidden_file" value="hidden_file">
                            </div>
                        </div>
                        <!--end::Group-->

                        {{-- Type --}}
                        <!--begin::Group-->
                        <div class="form-group row">
                          <label class="col-xl-3 col-lg-3 col-form-label">
                           {{trans('reports.type')}}
                          </label>
                          <div class="col-lg-9 col-xl-9">

                              <select
                                  class="form-control  form-control-lg"
                                  name="type" id="type" type="text">

                                  <option value="Financial" {{$report->type=='Financial' ? 'selected' : '' }}>
                                      @if(Lang() == 'ar')
                                      مالي
                                      @elseif(Lang() == 'en')
                                      Financial
                                      @endif

                                  </option>

                                  <option value="Administrative" {{$report->type=='Administrative'? 'selected' : '' }}>

                                      @if(Lang() == 'ar')
                                      اداري
                                      @elseif(Lang() == 'en')
                                      Administrative
                                      @endif
                                  </option>

                              </select>
                              <span class="form-text text-danger"
                                    id="gender_error"></span>
                          </div>
                        </div>
                      <!--end::Group-->

                       {{-- Year --}}
                        <!--begin::Group-->
                        <div class="form-group row">
                          <label class="col-xl-3 col-lg-3 col-form-label">
                           {{trans('reports.year')}}
                          </label>
                          <div class="col-lg-9 col-xl-9">
                              {{-- {{ $planMaster->end_fin_year == $year ? 'selected' : '' }} --}}
                              <select
                                  class="form-control  form-control-lg"
                                  name="year" id="year" type="text">
                                  <?php
                                  $firstYear = (int)date('Y') - 2;
                                  $lastYear = $firstYear + 6;
                                  ?>
                                  @for ($year= $firstYear; $year<= $lastYear; $year++)
                                      <option value="{{$year}}" {{ $report->year == $year ? 'selected' : '' }} >{{ $year }}</option>
                                  @endfor
                              </select>
                              <span class="form-text text-danger"
                                    id="gender_error"></span>
                          </div>

                        </div>
                      <!--end::Group-->



                       {{-- File --}}
                      <!--begin::Group-->
                      <div class="form-group row">
                          <label class="col-xl-3 col-lg-3 col-form-label">
                              {{trans('reports.file')}}
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
        $('#publish_date').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ LaravelLocalization::getCurrentLocale()}}",
            autoclose: true,
            todayHighlight: true,
        });

        $("input:file").change(function () {
            if ($(this).val() != "") {
                $(".file_section").addClass('d-none');
            } else {
                $(".file_section").removeClass('d-none');

            }
        });
    </script>
@endpush

