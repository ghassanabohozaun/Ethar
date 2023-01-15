@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.testimonials.update')}}" method="POST" id="form_opinions_update">
        @csrf
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div
                class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">


                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.testimonials')}}" class="text-muted">
                                {{trans('menu.testimonials')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('testimonials.update_testimonial')}}
                            </a>
                        </li>
                    </ul>

                    <!--end::Actions-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">

                    <button type="submit"
                            class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                        <i class="fa fa-save"></i>
                        {{trans('general.save')}}
                    </button>

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
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_languages_add">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">

                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">

                                                <!--begin::body-->
                                                <div class="my-5">

                                                    <!--begin::Group-->
                                                    <div class="d-none form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            ID
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="id" id="id" type="hidden"
                                                                value="{{$testimonial->id}}"/>

                                                            <input type="hidden" name="hidden_photo"
                                                                   value="hidden_photo">
                                                        </div>

                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.photo')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div
                                                                class="image-input image-input-outline"
                                                                id="kt_testimonial_photo">

                                                                <div class="image-input-wrapper"
                                                                     style="background-image: url({{asset('adminBoard/uploadedImages/testimonials/'.$testimonial->photo)}})"></div>
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
                                                                    title="Cancel avatar">
                                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
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
                                                            {{trans('testimonials.name_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="name_ar" id="name_ar" type="text"
                                                                placeholder=" {{trans('testimonials.enter_name_ar')}}"
                                                                autocomplete="off"
                                                                value="{{$testimonial->name_ar}}"/>
                                                            <span class="form-text text-danger"
                                                                  id="name_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.name_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="name_en" id="name_en" type="text"
                                                                placeholder=" {{trans('testimonials.enter_name_en')}}"
                                                                autocomplete="off"
                                                                value="{{$testimonial->name_en}}"/>

                                                            <span class="form-text text-danger"
                                                                  id="name_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.age')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="age" id="age" type="text"
                                                                value="{{$testimonial->age}}"
                                                                placeholder=" {{trans('testimonials.enter_age')}}"
                                                                autocomplete="off"/>

                                                            <span class="form-text text-danger" id="age_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.country')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="country" id="country" type="text">
                                                                <option value='ad'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ad" data-title="Andorra"
                                                                    {{$testimonial->country == 'ad'?'selected':'' }}
                                                                >
                                                                    Andorra
                                                                </option>
                                                                <option value='ae'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ae"
                                                                        data-title="United Arab Emirates"
                                                                    {{$testimonial->country == 'ae'?'selected':'' }}
                                                                >United Arab
                                                                    Emirates
                                                                </option>
                                                                <option value='af'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag af"
                                                                        data-title="Afghanistan"
                                                                    {{$testimonial->country == 'af'?'selected':'' }}
                                                                >Afghanistan
                                                                </option>
                                                                <option value='ag'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ag"
                                                                        data-title="Antigua and Barbuda"
                                                                    {{$testimonial->country == 'ag'?'selected':'' }}
                                                                >Antigua and
                                                                    Barbuda
                                                                </option>
                                                                <option value='ai'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ai" data-title="Anguilla"
                                                                    {{$testimonial->country == 'ai'?'selected':'' }}
                                                                >
                                                                    Anguilla
                                                                </option>
                                                                <option value='al'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag al" data-title="Albania"
                                                                    {{$testimonial->country == 'al'?'selected':'' }}
                                                                >
                                                                    Albania
                                                                </option>
                                                                <option value='am'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag am" data-title="Armenia"
                                                                    {{$testimonial->country == 'am'?'selected':'' }}

                                                                >
                                                                    Armenia
                                                                </option>
                                                                <option value='an'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag an"
                                                                        data-title="Netherlands Antilles" {{$testimonial->country == 'an'?'selected':'' }}
                                                                >Netherlands
                                                                    Antilles
                                                                </option>
                                                                <option value='ao'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ao"
                                                                        data-title="Angola" {{$testimonial->country == 'ao'?'selected':'' }}
                                                                >
                                                                    Angola
                                                                </option>
                                                                <option value='aq'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag aq"
                                                                        data-title="Antarctica" {{$testimonial->country == 'aq'?'selected':'' }}
                                                                >
                                                                    Antarctica
                                                                </option>
                                                                <option value='ar'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ar"
                                                                        data-title="Argentina" {{$testimonial->country == 'ar'?'selected':'' }}
                                                                >
                                                                    Argentina
                                                                </option>
                                                                <option value='as'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag as"
                                                                        data-title="American Samoa" {{$testimonial->country == 'as'?'selected':'' }}
                                                                >American Samoa
                                                                </option>
                                                                <option value='at'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag at"
                                                                        data-title="Austria" {{$testimonial->country == 'at'?'selected':'' }}
                                                                >
                                                                    Austria
                                                                </option>
                                                                <option value='au'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag au"
                                                                        data-title="Australia" {{$testimonial->country == 'au'?'selected':'' }}
                                                                >
                                                                    Australia
                                                                </option>
                                                                <option value='aw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag aw"
                                                                        data-title="Aruba" {{$testimonial->country == 'aw'?'selected':'' }}>
                                                                    Aruba
                                                                </option>
                                                                <option value='ax'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ax"
                                                                        data-title="Aland Islands" {{$testimonial->country == 'ax'?'selected':'' }}>
                                                                    Aland Islands
                                                                </option>
                                                                <option value='az'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag az"
                                                                        data-title="Azerbaijan" {{$testimonial->country == 'az'?'selected':'' }}>
                                                                    Azerbaijan
                                                                </option>
                                                                <option value='ba'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ba"
                                                                        data-title="Bosnia and Herzegovina" {{$testimonial->country == 'ba'?'selected':'' }}>
                                                                    Bosnia and
                                                                    Herzegovina
                                                                </option>
                                                                <option value='bb'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bb"
                                                                        data-title="Barbados" {{$testimonial->country == 'bb'?'selected':'' }}>
                                                                    Barbados
                                                                </option>
                                                                <option value='bd'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bd"
                                                                        data-title="Bangladesh" {{$testimonial->country == 'bd'?'selected':'' }}>
                                                                    Bangladesh
                                                                </option>
                                                                <option value='be'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag be"
                                                                        data-title="Belgium" {{$testimonial->country == 'be'?'selected':'' }}>
                                                                    Belgium
                                                                </option>
                                                                <option value='bf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bf"
                                                                        data-title="Burkina Faso" {{$testimonial->country == 'bf'?'selected':'' }}>
                                                                    Burkina Faso
                                                                </option>
                                                                <option value='bg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bg"
                                                                        data-title="Bulgaria" {{$testimonial->country == 'bg'?'selected':'' }}>
                                                                    Bulgaria
                                                                </option>
                                                                <option value='bh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bh"
                                                                        data-title="Bahrain" {{$testimonial->country == 'bh'?'selected':'' }}>
                                                                    Bahrain
                                                                </option>
                                                                <option value='bi'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bi"
                                                                        data-title="Burundi" {{$testimonial->country == 'bi'?'selected':'' }}>
                                                                    Burundi
                                                                </option>
                                                                <option value='bj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bj"
                                                                        data-title="Benin" {{$testimonial->country == 'bj'?'selected':'' }}>
                                                                    Benin
                                                                </option>
                                                                <option value='bm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bm" data-title="Bermuda"
                                                                    {{$testimonial->country == 'bm'?'selected':'' }}>
                                                                    Bermuda
                                                                </option>
                                                                <option value='bn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bn"
                                                                        data-title="Brunei Darussalam" {{$testimonial->country == 'bn'?'selected':'' }}>
                                                                    Brunei Darussalam
                                                                </option>
                                                                <option value='bo'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bo"
                                                                        data-title="Bolivia" {{$testimonial->country == 'bo'?'selected':'' }}>
                                                                    Bolivia
                                                                </option>
                                                                <option value='br'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag br"
                                                                        data-title="Brazil" {{$testimonial->country == 'br'?'selected':'' }}>
                                                                    Brazil
                                                                </option>
                                                                <option value='bs'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bs"
                                                                        data-title="Bahamas" {{$testimonial->country == 'bs'?'selected':'' }}>
                                                                    Bahamas
                                                                </option>
                                                                <option value='bt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bt"
                                                                        data-title="Bhutan" {{$testimonial->country == 'bt'?'selected':'' }}>
                                                                    Bhutan
                                                                </option>
                                                                <option value='bv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bv"
                                                                        data-title="Bouvet Island" {{$testimonial->country == 'bv'?'selected':'' }}>
                                                                    Bouvet Island
                                                                </option>
                                                                <option value='bw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bw"
                                                                        data-title="Botswana" {{$testimonial->country == 'bw'?'selected':'' }}>
                                                                    Botswana
                                                                </option>
                                                                <option value='by'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag by"
                                                                        data-title="Belarus" {{$testimonial->country == 'by'?'selected':'' }}>
                                                                    Belarus
                                                                </option>
                                                                <option value='bz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bz"
                                                                        data-title="Belize" {{$testimonial->country == 'bz'?'selected':'' }}>
                                                                    Belize
                                                                </option>
                                                                <option value='ca'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ca"
                                                                        data-title="Canada" {{$testimonial->country == 'ca'?'selected':'' }}>
                                                                    Canada
                                                                </option>
                                                                <option value='cc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cc"
                                                                        data-title="Cocos (Keeling) Islands" {{$testimonial->country == 'cc'?'selected':'' }}>
                                                                    Cocos
                                                                    (Keeling)
                                                                    Islands
                                                                </option>
                                                                <option value='cd'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cd"
                                                                        data-title="Democratic Republic of the Congo" {{$testimonial->country == 'cd'?'selected':'' }}>
                                                                    Democratic
                                                                    Republic of the Congo
                                                                </option>
                                                                <option value='cf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cf"
                                                                        data-title="Central African Republic" {{$testimonial->country == 'cf'?'selected':'' }}>
                                                                    Central
                                                                    African
                                                                    Republic
                                                                </option>
                                                                <option value='cg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cg"
                                                                        data-title="Congo" {{$testimonial->country == 'cg'?'selected':'' }}>
                                                                    Congo
                                                                </option>
                                                                <option value='ch'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ch"
                                                                        data-title="Switzerland" {{$testimonial->country == 'ch'?'selected':'' }}>
                                                                    Switzerland
                                                                </option>
                                                                <option value='ci'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ci"
                                                                        data-title="Cote D'Ivoire (Ivory Coast)" {{$testimonial->country == 'ci'?'selected':'' }}>
                                                                    Cote
                                                                    D'Ivoire
                                                                    (Ivory Coast)
                                                                </option>
                                                                <option value='ck'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ck"
                                                                        data-title="Cook Islands" {{$testimonial->country == 'ck'?'selected':'' }}>
                                                                    Cook Islands
                                                                </option>
                                                                <option value='cl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cl"
                                                                        data-title="Chile" {{$testimonial->country == 'cl'?'selected':'' }}>
                                                                    Chile
                                                                </option>
                                                                <option value='cm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cm"
                                                                        data-title="Cameroon" {{$testimonial->country == 'cm'?'selected':'' }}>
                                                                    Cameroon
                                                                </option>
                                                                <option value='cn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cn"
                                                                        data-title="China" {{$testimonial->country == 'cn'?'selected':'' }}>
                                                                    China
                                                                </option>
                                                                <option value='co'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag co"
                                                                        data-title="Colombia" {{$testimonial->country == 'co'?'selected':'' }}>
                                                                    Colombia
                                                                </option>
                                                                <option value='cr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cr"
                                                                        data-title="Costa Rica" {{$testimonial->country == 'cr'?'selected':'' }}>
                                                                    Costa Rica
                                                                </option>
                                                                <option value='cs'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cs"
                                                                        data-title="Serbia and Montenegro" {{$testimonial->country == 'cs'?'selected':'' }}>
                                                                    Serbia and
                                                                    Montenegro
                                                                </option>
                                                                <option value='cu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cu"
                                                                        data-title="Cuba" {{$testimonial->country == 'cu'?'selected':'' }}>
                                                                    Cuba
                                                                </option>
                                                                <option value='cv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cv"
                                                                        data-title="Cape Verde  {{$testimonial->country == 'cv'?'selected':'' }}">
                                                                    Cape Verde
                                                                </option>
                                                                <option value='cx'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cx"
                                                                        data-title="Christmas Island" {{$testimonial->country == 'cx'?'selected':'' }}>
                                                                    Christmas Island
                                                                </option>
                                                                <option value='cy'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cy"
                                                                        data-title="Cyprus" {{$testimonial->country == 'cy'?'selected':'' }}>
                                                                    Cyprus
                                                                </option>
                                                                <option value='cz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cz"
                                                                        data-title="Czech Republic" {{$testimonial->country == 'cz'?'selected':'' }}>
                                                                    Czech Republic
                                                                </option>
                                                                <option value='de'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag de"
                                                                        data-title="Germany" {{$testimonial->country == 'de'?'selected':'' }}>
                                                                    Germany
                                                                </option>
                                                                <option value='dj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag dj"
                                                                        data-title="Djibouti" {{$testimonial->country == 'dj'?'selected':'' }}>
                                                                    Djibouti
                                                                </option>
                                                                <option value='dk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag dk"
                                                                        data-title="Denmark" {{$testimonial->country == 'dk'?'selected':'' }}>
                                                                    Denmark
                                                                </option>
                                                                <option value='dm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag dm"
                                                                        data-title="Dominica" {{$testimonial->country == 'dm'?'selected':'' }}>
                                                                    Dominica
                                                                </option>
                                                                <option value='do'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag do"
                                                                        data-title="Dominican Republic" {{$testimonial->country == 'do'?'selected':'' }}>
                                                                    Dominican
                                                                    Republic
                                                                </option>
                                                                <option value='dz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag dz"
                                                                        data-title="Algeria" {{$testimonial->country == 'dz'?'selected':'' }}>
                                                                    Algeria
                                                                </option>
                                                                <option value='ec'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ec"
                                                                        data-title="Ecuador" {{$testimonial->country == 'ec'?'selected':'' }}>
                                                                    Ecuador
                                                                </option>
                                                                <option value='ee'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ee"
                                                                        data-title="Estonia" {{$testimonial->country == 'ee'?'selected':'' }}>
                                                                    Estonia
                                                                </option>
                                                                <option value='eg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag eg"
                                                                        data-title="Egypt" {{$testimonial->country == 'eg'?'selected':'' }}>
                                                                    Egypt
                                                                </option>
                                                                <option value='eh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag eh"
                                                                        data-title="Western Sahara" {{$testimonial->country == 'eh'?'selected':'' }}>
                                                                    Western Sahara
                                                                </option>
                                                                <option value='er'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag er"
                                                                        data-title="Eritrea" {{$testimonial->country == 'er'?'selected':'' }}>
                                                                    Eritrea
                                                                </option>
                                                                <option value='es'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag es"
                                                                        data-title="Spain" {{$testimonial->country == 'es'?'selected':'' }}>
                                                                    Spain
                                                                </option>
                                                                <option value='et'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag et"
                                                                        data-title="Ethiopia" {{$testimonial->country == 'et'?'selected':'' }}>
                                                                    Ethiopia
                                                                </option>
                                                                <option value='fi'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fi"
                                                                        data-title="Finland" {{$testimonial->country == 'fi'?'selected':'' }}>
                                                                    Finland
                                                                </option>
                                                                <option value='fj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fj"
                                                                        data-title="Fiji" {{$testimonial->country == 'fj'?'selected':'' }}>
                                                                    Fiji
                                                                </option>
                                                                <option value='fk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fk"
                                                                        data-title="Falkland Islands (Malvinas)" {{$testimonial->country == 'fk'?'selected':'' }}>
                                                                    Falkland
                                                                    Islands (Malvinas)
                                                                </option>
                                                                <option value='fm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fm"
                                                                        data-title="Federated States of Micronesia" {{$testimonial->country == 'fm'?'selected':'' }}>
                                                                    Federated
                                                                    States of Micronesia
                                                                </option>
                                                                <option value='fo'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fo"
                                                                        data-title="Faroe Islands" {{$testimonial->country == 'fo'?'selected':'' }}>
                                                                    Faroe Islands
                                                                </option>
                                                                <option value='fr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fr"
                                                                        data-title="France" {{$testimonial->country == 'fr'?'selected':'' }}>
                                                                    France
                                                                </option>
                                                                <option value='fx'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fx"
                                                                        data-title="France, Metropolitan" {{$testimonial->country == 'fx'?'selected':'' }}>
                                                                    France,
                                                                    Metropolitan
                                                                </option>
                                                                <option value='ga'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ga"
                                                                        data-title="Gabon" {{$testimonial->country == 'ga'?'selected':'' }}>
                                                                    Gabon
                                                                </option>
                                                                <option value='gb'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gb"
                                                                        data-title="Great Britain (UK)"
                                                                    {{$testimonial->country == 'gb'?'selected':'' }}
                                                                >
                                                                    Great Britain (UK)
                                                                </option>
                                                                <option value='gd'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gd"
                                                                        data-title="Grenada" {{$testimonial->country == 'gd'?'selected':'' }}>
                                                                    Grenada
                                                                </option>
                                                                <option value='ge'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ge"
                                                                        data-title="Georgia" {{$testimonial->country == 'ge'?'selected':'' }}>
                                                                    Georgia
                                                                </option>
                                                                <option value='gf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gf"
                                                                        data-title="French Guiana" {{$testimonial->country == 'gf'?'selected':'' }}>
                                                                    French Guiana
                                                                </option>
                                                                <option value='gh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gh"
                                                                        data-title="Ghana" {{$testimonial->country == 'gh'?'selected':'' }}>
                                                                    Ghana
                                                                </option>
                                                                <option value='gi'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gi"
                                                                        data-title="Gibraltar" {{$testimonial->country == 'gi'?'selected':'' }}>
                                                                    Gibraltar
                                                                </option>
                                                                <option value='gl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gl"
                                                                        data-title="Greenland" {{$testimonial->country == 'gl'?'selected':'' }}>
                                                                    Greenland
                                                                </option>
                                                                <option value='gm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gm"
                                                                        data-title="Gambia" {{$testimonial->country == 'gm'?'selected':'' }}>
                                                                    Gambia
                                                                </option>
                                                                <option value='gn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gn"
                                                                        data-title="Guinea" {{$testimonial->country == 'gn'?'selected':'' }}>
                                                                    Guinea
                                                                </option>
                                                                <option value='gp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gp"
                                                                        data-title="Guadeloupe" {{$testimonial->country == 'gp'?'selected':'' }}>
                                                                    Guadeloupe
                                                                </option>
                                                                <option value='gq'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gq"
                                                                        data-title="Equatorial Guinea" {{$testimonial->country == 'gq'?'selected':'' }}>
                                                                    Equatorial Guinea
                                                                </option>
                                                                <option value='gr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gr"
                                                                        data-title="Greece" {{$testimonial->country == 'gr'?'selected':'' }}>
                                                                    Greece
                                                                </option>
                                                                <option value='gs'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gs"
                                                                        data-title="S. Georgia and S. Sandwich Islands" {{$testimonial->country == 'gs'?'selected':'' }}>
                                                                    S.
                                                                    Georgia and S. Sandwich Islands
                                                                </option>
                                                                <option value='gt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gt"
                                                                        data-title="Guatemala" {{$testimonial->country == 'gt'?'selected':'' }}>
                                                                    Guatemala
                                                                </option>
                                                                <option value='gu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gu"
                                                                        data-title="Guam" {{$testimonial->country == 'gu'?'selected':'' }}>
                                                                    Guam
                                                                </option>
                                                                <option value='gw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gw"
                                                                        data-title="Guinea-Bissau" {{$testimonial->country == 'gw'?'selected':'' }}>
                                                                    Guinea-Bissau
                                                                </option>
                                                                <option value='gy'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gy"
                                                                        data-title="Guyana" {{$testimonial->country == 'gy'?'selected':'' }}>
                                                                    Guyana
                                                                </option>
                                                                <option value='hk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hk"
                                                                        data-title="Hong Kong" {{$testimonial->country == 'hk'?'selected':'' }}>
                                                                    Hong Kong
                                                                </option>
                                                                <option value='hm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hm"
                                                                        data-title="Heard Island and McDonald Islands" {{$testimonial->country == 'hm'?'selected':'' }}>
                                                                    Heard
                                                                    Island and McDonald Islands
                                                                </option>
                                                                <option value='hn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hn"
                                                                        data-title="Honduras" {{$testimonial->country == 'hn'?'selected':'' }}>
                                                                    Honduras
                                                                </option>
                                                                <option value='hr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hr"
                                                                        data-title="Croatia (Hrvatska)" {{$testimonial->country == 'hr'?'selected':'' }}>
                                                                    Croatia
                                                                    (Hrvatska)
                                                                </option>
                                                                <option value='ht'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ht"
                                                                        data-title="Haiti" {{$testimonial->country == 'ht'?'selected':'' }}>
                                                                    Haiti
                                                                </option>
                                                                <option value='hu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hu"
                                                                        data-title="Hungary" {{$testimonial->country == 'hu'?'selected':'' }}>
                                                                    Hungary
                                                                </option>
                                                                <option value='id'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag id"
                                                                        data-title="Indonesia" {{$testimonial->country == 'id'?'selected':'' }}>
                                                                    Indonesia
                                                                </option>
                                                                <option value='ie'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ie"
                                                                        data-title="Ireland" {{$testimonial->country == 'ie'?'selected':'' }}>
                                                                    Ireland
                                                                </option>
                                                                <option value='il'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag il"
                                                                        data-title="Israel" {{$testimonial->country == 'il'?'selected':'' }}>
                                                                    Israel
                                                                </option>
                                                                <option value='in'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag in"
                                                                        data-title="India" {{$testimonial->country == 'in'?'selected':'' }}>
                                                                    India
                                                                </option>
                                                                <option value='io'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag io"
                                                                        data-title="British Indian Ocean Territory" {{$testimonial->country == 'io'?'selected':'' }}>
                                                                    British
                                                                    Indian Ocean Territory
                                                                </option>
                                                                <option value='iq'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag iq"
                                                                        data-title="Iraq" {{$testimonial->country == 'iq'?'selected':'' }}>
                                                                    Iraq
                                                                </option>
                                                                <option value='ir'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ir"
                                                                        data-title="Iran" {{$testimonial->country == 'ir'?'selected':'' }}>
                                                                    Iran
                                                                </option>
                                                                <option value='is'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag is"
                                                                        data-title="Iceland" {{$testimonial->country == 'is'?'selected':'' }}>
                                                                    Iceland
                                                                </option>
                                                                <option value='it'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag it"
                                                                        data-title="Italy" {{$testimonial->country == 'it'?'selected':'' }}>
                                                                    Italy
                                                                </option>
                                                                <option value='jm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag jm"
                                                                        data-title="Jamaica" {{$testimonial->country == 'jm'?'selected':'' }}>
                                                                    Jamaica
                                                                </option>
                                                                <option value='jo'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag jo"
                                                                        data-title="Jordan" {{$testimonial->country == 'jo'?'selected':'' }}>
                                                                    Jordan
                                                                </option>
                                                                <option value='jp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag jp"
                                                                        data-title="Japan" {{$testimonial->country == 'jp'?'selected':'' }}>
                                                                    Japan
                                                                </option>
                                                                <option value='ke'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ke"
                                                                        data-title="Kenya" {{$testimonial->country == 'ke'?'selected':'' }}>
                                                                    Kenya
                                                                </option>
                                                                <option value='kg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kg"
                                                                        data-title="Kyrgyzstan" {{$testimonial->country == 'kg'?'selected':'' }}>
                                                                    Kyrgyzstan
                                                                </option>
                                                                <option value='kh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kh"
                                                                        data-title="Cambodia" {{$testimonial->country == 'kh'?'selected':'' }}>
                                                                    Cambodia
                                                                </option>
                                                                <option value='ki'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ki"
                                                                        data-title="Kiribati" {{$testimonial->country == 'ki'?'selected':'' }}>
                                                                    Kiribati
                                                                </option>
                                                                <option value='km'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag km"
                                                                        data-title="Comoros" {{$testimonial->country == 'km'?'selected':'' }}>
                                                                    Comoros
                                                                </option>
                                                                <option value='kn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kn"
                                                                        data-title="Saint Kitts and Nevis" {{$testimonial->country == 'kn'?'selected':'' }}>
                                                                    Saint Kitts
                                                                    and Nevis
                                                                </option>
                                                                <option value='kp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kp"
                                                                        data-title="Korea (North)" {{$testimonial->country == 'kp'?'selected':'' }}>
                                                                    Korea (North)
                                                                </option>
                                                                <option value='kr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kr"
                                                                        data-title="Korea (South)" {{$testimonial->country == 'kr'?'selected':'' }}>
                                                                    Korea (South)
                                                                </option>
                                                                <option value='kw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kw"
                                                                        data-title="Kuwait" {{$testimonial->country == 'kw'?'selected':'' }}>
                                                                    Kuwait
                                                                </option>
                                                                <option value='ky'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ky"
                                                                        data-title="Cayman Islands" {{$testimonial->country == 'ky'?'selected':'' }}>
                                                                    Cayman Islands
                                                                </option>
                                                                <option value='kz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kz"
                                                                        data-title="Kazakhstan" {{$testimonial->country == 'kz'?'selected':'' }}>
                                                                    Kazakhstan
                                                                </option>
                                                                <option value='la'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag la"
                                                                        data-title="Laos" {{$testimonial->country == 'la'?'selected':'' }}>
                                                                    Laos
                                                                </option>
                                                                <option value='lb'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lb"
                                                                        data-title="Lebanon" {{$testimonial->country == 'lb'?'selected':'' }}>
                                                                    Lebanon
                                                                </option>
                                                                <option value='lc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lc"
                                                                        data-title="Saint Lucia" {{$testimonial->country == 'lc'?'selected':'' }}>
                                                                    Saint Lucia
                                                                </option>
                                                                <option value='li'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag li"
                                                                        data-title="Liechtenstein" {{$testimonial->country == 'li'?'selected':'' }}>
                                                                    Liechtenstein
                                                                </option>
                                                                <option value='lk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lk"
                                                                        data-title="Sri Lanka" {{$testimonial->country == 'lk'?'selected':'' }}>
                                                                    Sri Lanka
                                                                </option>
                                                                <option value='lr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lr"
                                                                        data-title="Liberia" {{$testimonial->country == 'lr'?'selected':'' }}>
                                                                    Liberia
                                                                </option>
                                                                <option value='ls'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ls"
                                                                        data-title="Lesotho" {{$testimonial->country == 'ls'?'selected':'' }}>
                                                                    Lesotho
                                                                </option>
                                                                <option value='lt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lt"
                                                                        data-title="Lithuania" {{$testimonial->country == 'lt'?'selected':'' }}>
                                                                    Lithuania
                                                                </option>
                                                                <option value='lu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lu"
                                                                        data-title="Luxembourg" {{$testimonial->country == 'lu'?'selected':'' }}>
                                                                    Luxembourg
                                                                </option>
                                                                <option value='lv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lv"
                                                                        data-title="Latvia" {{$testimonial->country == 'lv'?'selected':'' }}>
                                                                    Latvia
                                                                </option>
                                                                <option value='ly'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ly"
                                                                        data-title="Libya" {{$testimonial->country == 'ly'?'selected':'' }}>
                                                                    Libya
                                                                </option>
                                                                <option value='ma'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ma"
                                                                        data-title="Morocco" {{$testimonial->country == 'ma'?'selected':'' }}>
                                                                    Morocco
                                                                </option>
                                                                <option value='mc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mc"
                                                                        data-title="Monaco" {{$testimonial->country == 'mc'?'selected':'' }}>
                                                                    Monaco
                                                                </option>
                                                                <option value='md'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag md"
                                                                        data-title="Moldova" {{$testimonial->country == 'md'?'selected':'' }}>
                                                                    Moldova
                                                                </option>
                                                                <option value='mg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mg"
                                                                        data-title="Madagascar" {{$testimonial->country == 'mg'?'selected':'' }}>
                                                                    Madagascar
                                                                </option>
                                                                <option value='mh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mh"
                                                                        data-title="Marshall Islands" {{$testimonial->country == 'mh'?'selected':'' }}>
                                                                    Marshall Islands
                                                                </option>
                                                                <option value='mk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mk"
                                                                        data-title="Macedonia" {{$testimonial->country == 'mk'?'selected':'' }}>
                                                                    Macedonia
                                                                </option>
                                                                <option value='ml'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ml"
                                                                        data-title="Mali" {{$testimonial->country == 'ml'?'selected':'' }}>
                                                                    Mali
                                                                </option>
                                                                <option value='mm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mm"
                                                                        data-title="Myanmar" {{$testimonial->country == 'mm'?'selected':'' }}>
                                                                    Myanmar
                                                                </option>
                                                                <option value='mn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mn"
                                                                        data-title="Mongolia" {{$testimonial->country == 'mn'?'selected':'' }}>
                                                                    Mongolia
                                                                </option>
                                                                <option value='mo'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mo"
                                                                        data-title="Macao" {{$testimonial->country == 'mo'?'selected':'' }}>
                                                                    Macao
                                                                </option>
                                                                <option value='mp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mp"
                                                                        data-title="Northern Mariana Islands" {{$testimonial->country == 'mp'?'selected':'' }}>
                                                                    Northern
                                                                    Mariana
                                                                    Islands
                                                                </option>
                                                                <option value='mq'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mq"
                                                                        data-title="Martinique" {{$testimonial->country == 'mq'?'selected':'' }}>
                                                                    Martinique
                                                                </option>
                                                                <option value='mr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mr"
                                                                        data-title="Mauritania" {{$testimonial->country == 'mr'?'selected':'' }}>
                                                                    Mauritania
                                                                </option>
                                                                <option value='ms'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ms"
                                                                        data-title="Montserrat" {{$testimonial->country == 'ms'?'selected':'' }}>
                                                                    Montserrat
                                                                </option>
                                                                <option value='mt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mt"
                                                                        data-title="Malta" {{$testimonial->country == 'mt'?'selected':'' }}>
                                                                    Malta
                                                                </option>
                                                                <option value='mu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mu"
                                                                        data-title="Mauritius" {{$testimonial->country == 'mu'?'selected':'' }}>
                                                                    Mauritius
                                                                </option>
                                                                <option value='mv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mv"
                                                                        data-title="Maldives" {{$testimonial->country == 'mv'?'selected':'' }}>
                                                                    Maldives
                                                                </option>
                                                                <option value='mw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mw"
                                                                        data-title="Malawi" {{$testimonial->country == 'mw'?'selected':'' }}>
                                                                    Malawi
                                                                </option>
                                                                <option value='mx'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mx"
                                                                        data-title="Mexico" {{$testimonial->country == 'mx'?'selected':'' }}>
                                                                    Mexico
                                                                </option>
                                                                <option value='my'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag my"
                                                                        data-title="Malaysia" {{$testimonial->country == 'my'?'selected':'' }}>
                                                                    Malaysia
                                                                </option>
                                                                <option value='mz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mz"
                                                                        data-title="Mozambique" {{$testimonial->country == 'mz'?'selected':'' }}>
                                                                    Mozambique
                                                                </option>
                                                                <option value='na'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag na"
                                                                        data-title="Namibia" {{$testimonial->country == 'na'?'selected':'' }}>
                                                                    Namibia
                                                                </option>
                                                                <option value='nc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nc"
                                                                        data-title="New Caledonia" {{$testimonial->country == 'nc'?'selected':'' }}>
                                                                    New Caledonia
                                                                </option>
                                                                <option value='ne'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ne"
                                                                        data-title="Niger" {{$testimonial->country == 'ne'?'selected':'' }}>
                                                                    Niger
                                                                </option>
                                                                <option value='nf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nf"
                                                                        data-title="Norfolk Island" {{$testimonial->country == 'nf'?'selected':'' }}>
                                                                    Norfolk Island
                                                                </option>
                                                                <option value='ng'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ng"
                                                                        data-title="Nigeria" {{$testimonial->country == 'ng'?'selected':'' }}>
                                                                    Nigeria
                                                                </option>
                                                                <option value='ni'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ni"
                                                                        data-title="Nicaragua" {{$testimonial->country == 'ni'?'selected':'' }}>
                                                                    Nicaragua
                                                                </option>
                                                                <option value='nl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nl"
                                                                        data-title="Netherlands" {{$testimonial->country == 'nl'?'selected':'' }}>
                                                                    Netherlands
                                                                </option>
                                                                <option value='no'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag no"
                                                                        data-title="Norway" {{$testimonial->country == 'no'?'selected':'' }}>
                                                                    Norway
                                                                </option>
                                                                <option value='np'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag np"
                                                                        data-title="Nepal" {{$testimonial->country == 'np'?'selected':'' }}>
                                                                    Nepal
                                                                </option>
                                                                <option value='nr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nr"
                                                                        data-title="Nauru" {{$testimonial->country == 'nr'?'selected':'' }}>
                                                                    Nauru
                                                                </option>
                                                                <option value='nu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nu"
                                                                        data-title="Niue" {{$testimonial->country == 'nu'?'selected':'' }}>
                                                                    Niue
                                                                </option>
                                                                <option value='nz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nz"
                                                                        data-title="New Zealand (Aotearoa)" {{$testimonial->country == 'nz'?'selected':'' }}>
                                                                    New Zealand
                                                                    (Aotearoa)
                                                                </option>
                                                                <option value='om'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag om"
                                                                        data-title="Oman" {{$testimonial->country == 'om'?'selected':'' }}>
                                                                    Oman
                                                                </option>
                                                                <option value='pa'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pa"
                                                                        data-title="Panama" {{$testimonial->country == 'pa'?'selected':'' }}>
                                                                    Panama
                                                                </option>
                                                                <option value='pe'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pe"
                                                                        data-title="Peru" {{$testimonial->country == 'pe'?'selected':'' }}>
                                                                    Peru
                                                                </option>
                                                                <option value='pf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pf"
                                                                        data-title="French Polynesia" {{$testimonial->country == 'pf'?'selected':'' }}>
                                                                    French Polynesia
                                                                </option>
                                                                <option value='pg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pg"
                                                                        data-title="Papua New Guinea" {{$testimonial->country == 'pg'?'selected':'' }}>
                                                                    Papua New Guinea
                                                                </option>
                                                                <option value='ph'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ph"
                                                                        data-title="Philippines" {{$testimonial->country == 'ph'?'selected':'' }}>
                                                                    Philippines
                                                                </option>
                                                                <option value='pk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pk"
                                                                        data-title="Pakistan" {{$testimonial->country == 'pk'?'selected':'' }}>
                                                                    Pakistan
                                                                </option>
                                                                <option value='pl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pl"
                                                                        data-title="Poland" {{$testimonial->country == 'pl'?'selected':'' }}>
                                                                    Poland
                                                                </option>
                                                                <option value='pm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pm"
                                                                        data-title="Saint Pierre and Miquelon" {{$testimonial->country == 'pm'?'selected':'' }}>
                                                                    Saint
                                                                    Pierre and
                                                                    Miquelon
                                                                </option>
                                                                <option value='pn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pn"
                                                                        data-title="Pitcairn" {{$testimonial->country == 'pn'?'selected':'' }}>
                                                                    Pitcairn
                                                                </option>
                                                                <option value='pr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pr"
                                                                        data-title="Puerto Rico" {{$testimonial->country == 'pr'?'selected':'' }}>
                                                                    Puerto Rico
                                                                </option>
                                                                <option value='ps'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ps"
                                                                        data-title="Palestinian Territory" {{$testimonial->country == 'ps'?'selected':'' }}>
                                                                    Palestinian
                                                                    Territory
                                                                </option>
                                                                <option value='pt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pt"
                                                                        data-title="Portugal" {{$testimonial->country == 'pt'?'selected':'' }}>
                                                                    Portugal
                                                                </option>
                                                                <option value='pw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pw"
                                                                        data-title="Palau" {{$testimonial->country == 'pw'?'selected':'' }}>
                                                                    Palau
                                                                </option>
                                                                <option value='py'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag py"
                                                                        data-title="Paraguay" {{$testimonial->country == 'py'?'selected':'' }}>
                                                                    Paraguay
                                                                </option>
                                                                <option value='qa'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag qa"
                                                                        data-title="Qatar" {{$testimonial->country == 'qa'?'selected':'' }}>
                                                                    Qatar
                                                                </option>
                                                                <option value='re'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag re"
                                                                        data-title="Reunion" {{$testimonial->country == 're'?'selected':'' }}>
                                                                    Reunion
                                                                </option>
                                                                <option value='ro'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ro"
                                                                        data-title="Romania" {{$testimonial->country == 'ro'?'selected':'' }}>
                                                                    Romania
                                                                </option>
                                                                <option value='ru'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ru"
                                                                        data-title="Russian Federation" {{$testimonial->country == 'ru'?'selected':'' }}>
                                                                    Russian
                                                                    Federation
                                                                </option>
                                                                <option value='rw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag rw"
                                                                        data-title="Rwanda" {{$testimonial->country == 'rw'?'selected':'' }}>
                                                                    Rwanda
                                                                </option>
                                                                <option value='sa'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sa"
                                                                        data-title="Saudi Arabia" {{$testimonial->country == 'sa'?'selected':'' }}>
                                                                    Saudi Arabia
                                                                </option>
                                                                <option value='sb'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sb"
                                                                        data-title="Solomon Islands" {{$testimonial->country == 'sb'?'selected':'' }}>
                                                                    Solomon Islands
                                                                </option>
                                                                <option value='sc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sc"
                                                                        data-title="Seychelles" {{$testimonial->country == 'sc'?'selected':'' }}>
                                                                    Seychelles
                                                                </option>
                                                                <option value='sd'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sd"
                                                                        data-title="Sudan" {{$testimonial->country == 'sd'?'selected':'' }}>
                                                                    Sudan
                                                                </option>
                                                                <option value='se'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag se"
                                                                        data-title="Sweden" {{$testimonial->country == 'se'?'selected':'' }}>
                                                                    Sweden
                                                                </option>
                                                                <option value='sg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sg"
                                                                        data-title="Singapore" {{$testimonial->country == 'sg'?'selected':'' }}>
                                                                    Singapore
                                                                </option>
                                                                <option value='sh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sh"
                                                                        data-title="Saint Helena" {{$testimonial->country == 'sh'?'selected':'' }}>
                                                                    Saint Helena
                                                                </option>
                                                                <option value='si'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag si"
                                                                        data-title="Slovenia" {{$testimonial->country == 'si'?'selected':'' }}>
                                                                    Slovenia
                                                                </option>
                                                                <option value='sj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sj"
                                                                        data-title="Svalbard and Jan Mayen" {{$testimonial->country == 'sj'?'selected':'' }}>
                                                                    Svalbard and
                                                                    Jan
                                                                    Mayen
                                                                </option>
                                                                <option value='sk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sk"
                                                                        data-title="Slovakia" {{$testimonial->country == 'sk'?'selected':'' }}>
                                                                    Slovakia
                                                                </option>
                                                                <option value='sl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sl"
                                                                        data-title="Sierra Leone" {{$testimonial->country == 'sl'?'selected':'' }}>
                                                                    Sierra Leone
                                                                </option>
                                                                <option value='sm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sm"
                                                                        data-title="San Marino" {{$testimonial->country == 'sm'?'selected':'' }}>
                                                                    San Marino
                                                                </option>
                                                                <option value='sn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sn"
                                                                        data-title="Senegal" {{$testimonial->country == 'sn'?'selected':'' }}>
                                                                    Senegal
                                                                </option>
                                                                <option value='so'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag so"
                                                                        data-title="Somalia" {{$testimonial->country == 'so'?'selected':'' }}>
                                                                    Somalia
                                                                </option>
                                                                <option value='sr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sr"
                                                                        data-title="Suriname" {{$testimonial->country == 'sr'?'selected':'' }}>
                                                                    Suriname
                                                                </option>
                                                                <option value='st'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag st"
                                                                        data-title="Sao Tome and Principe" {{$testimonial->country == 'st'?'selected':'' }}>
                                                                    Sao Tome and
                                                                    Principe
                                                                </option>
                                                                <option value='su'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag su"
                                                                        data-title="USSR (former)" {{$testimonial->country == 'su'?'selected':'' }}>
                                                                    USSR (former)
                                                                </option>
                                                                <option value='sv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sv"
                                                                        data-title="El Salvador" {{$testimonial->country == 'sv'?'selected':'' }}>
                                                                    El Salvador
                                                                </option>
                                                                <option value='sy'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sy"
                                                                        data-title="Syria" {{$testimonial->country == 'sy'?'selected':'' }}>
                                                                    Syria
                                                                </option>
                                                                <option value='sz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sz"
                                                                        data-title="Swaziland" {{$testimonial->country == 'sz'?'selected':'' }}>
                                                                    Swaziland
                                                                </option>
                                                                <option value='tc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tc"
                                                                        data-title="Turks and Caicos Islands" {{$testimonial->country == 'tc'?'selected':'' }}>
                                                                    Turks and
                                                                    Caicos
                                                                    Islands
                                                                </option>
                                                                <option value='td'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag td"
                                                                        data-title="Chad" {{$testimonial->country == 'td'?'selected':'' }}>
                                                                    Chad
                                                                </option>
                                                                <option value='tf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tf"
                                                                        data-title="French Southern Territories" {{$testimonial->country == 'tf'?'selected':'' }}>
                                                                    French
                                                                    Southern
                                                                    Territories
                                                                </option>
                                                                <option value='tg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tg"
                                                                        data-title="Togo" {{$testimonial->country == 'tg'?'selected':'' }}>
                                                                    Togo
                                                                </option>
                                                                <option value='th'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag th"
                                                                        data-title="Thailand" {{$testimonial->country == 'th'?'selected':'' }}>
                                                                    Thailand
                                                                </option>
                                                                <option value='tj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tj"
                                                                        data-title="Tajikistan" {{$testimonial->country == 'tj'?'selected':'' }}>
                                                                    Tajikistan
                                                                </option>
                                                                <option value='tk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tk"
                                                                        data-title="Tokelau" {{$testimonial->country == 'tk'?'selected':'' }}>
                                                                    Tokelau
                                                                </option>
                                                                <option value='tl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tl"
                                                                        data-title="Timor-Leste" {{$testimonial->country == 'tl'?'selected':'' }}>
                                                                    Timor-Leste
                                                                </option>
                                                                <option value='tm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tm"
                                                                        data-title="Turkmenistan" {{$testimonial->country == 'tm'?'selected':'' }}>
                                                                    Turkmenistan
                                                                </option>
                                                                <option value='tn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tn"
                                                                        data-title="Tunisia" {{$testimonial->country == 'tn'?'selected':'' }}>
                                                                    Tunisia
                                                                </option>
                                                                <option value='to'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag to"
                                                                        data-title="Tonga" {{$testimonial->country == 'to'?'selected':'' }}>
                                                                    Tonga
                                                                </option>
                                                                <option value='tp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tp"
                                                                        data-title="East Timor" {{$testimonial->country == 'tp'?'selected':'' }}>
                                                                    East Timor
                                                                </option>
                                                                <option value='tr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tr"
                                                                        data-title="Turkey" {{$testimonial->country == 'tr'?'selected':'' }}>
                                                                    Turkey
                                                                </option>
                                                                <option value='tt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tt"
                                                                        data-title="Trinidad and Tobago" {{$testimonial->country == 'tt'?'selected':'' }}>
                                                                    Trinidad and
                                                                    Tobago
                                                                </option>
                                                                <option value='tv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tv"
                                                                        data-title="Tuvalu" {{$testimonial->country == 'tv'?'selected':'' }}>
                                                                    Tuvalu
                                                                </option>
                                                                <option value='tw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tw"
                                                                        data-title="Taiwan" {{$testimonial->country == 'tw'?'selected':'' }}>
                                                                    Taiwan
                                                                </option>
                                                                <option value='tz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tz"
                                                                        data-title="Tanzania" {{$testimonial->country == 'tz'?'selected':'' }}>
                                                                    Tanzania
                                                                </option>
                                                                <option value='ua'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ua"
                                                                        data-title="Ukraine" {{$testimonial->country == 'ua'?'selected':'' }}>
                                                                    Ukraine
                                                                </option>
                                                                <option value='ug'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ug"
                                                                        data-title="Uganda" {{$testimonial->country == 'ug'?'selected':'' }}>
                                                                    Uganda
                                                                </option>
                                                                <option value='uk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag uk"
                                                                        data-title="United Kingdom"
                                                                    {{$testimonial->country == 'uk'?'selected':'' }}
                                                                >United Kingdom
                                                                </option>
                                                                <option value='um'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag um"
                                                                        data-title="United States Minor Outlying Islands" {{$testimonial->country == 'um'?'selected':'' }}>
                                                                    United
                                                                    States Minor Outlying Islands
                                                                </option>
                                                                <option value='us'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag us"
                                                                        data-title="United States" {{$testimonial->country == 'us'?'selected':'' }}>
                                                                    United States
                                                                </option>
                                                                <option value='uy'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag uy"
                                                                        data-title="Uruguay" {{$testimonial->country == 'uy'?'selected':'' }}>
                                                                    Uruguay
                                                                </option>
                                                                <option value='uz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag uz"
                                                                        data-title="Uzbekistan" {{$testimonial->country == 'uz'?'selected':'' }}>
                                                                    Uzbekistan
                                                                </option>
                                                                <option value='va'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag va"
                                                                        data-title="Vatican City State (Holy See)" {{$testimonial->country == 'va'?'selected':'' }}>
                                                                    Vatican City
                                                                    State (Holy See)
                                                                </option>
                                                                <option value='vc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vc"
                                                                        data-title="Saint Vincent and the Grenadines" {{$testimonial->country == 'vc'?'selected':'' }}>
                                                                    Saint
                                                                    Vincent and the Grenadines
                                                                </option>
                                                                <option value='ve'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ve"
                                                                        data-title="Venezuela" {{$testimonial->country == 've'?'selected':'' }}>
                                                                    Venezuela
                                                                </option>
                                                                <option value='vg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vg"
                                                                        data-title="Virgin Islands (British)" {{$testimonial->country == 'vg'?'selected':'' }}>
                                                                    Virgin
                                                                    Islands
                                                                    (British)
                                                                </option>
                                                                <option value='vi'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vi"
                                                                        data-title="Virgin Islands (U.S.)" {{$testimonial->country == 'vi'?'selected':'' }}>
                                                                    Virgin
                                                                    Islands (U.S.)
                                                                </option>
                                                                <option value='vn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vn"
                                                                        data-title="Viet Nam" {{$testimonial->country == 'vn'?'selected':'' }}>
                                                                    Viet Nam
                                                                </option>
                                                                <option value='vu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vu"
                                                                        data-title="Vanuatu" {{$testimonial->country == 'vu'?'selected':'' }}>
                                                                    Vanuatu
                                                                </option>
                                                                <option value='wf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag wf"
                                                                        data-title="Wallis and Futuna" {{$testimonial->country == 'wf'?'selected':'' }}>
                                                                    Wallis and Futuna
                                                                </option>
                                                                <option value='ws'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ws"
                                                                        data-title="Samoa" {{$testimonial->country == 'ws'?'selected':'' }}>
                                                                    Samoa
                                                                </option>
                                                                <option value='ye'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ye"
                                                                        data-title="Yemen" {{$testimonial->country == 'ye'?'selected':'' }}>
                                                                    Yemen
                                                                </option>
                                                                <option value='yt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag yt"
                                                                        data-title="Mayotte" {{$testimonial->country == 'yt'?'selected':'' }}>
                                                                    Mayotte
                                                                </option>
                                                                <option value='yu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag yu"
                                                                        data-title="Yugoslavia (former)" {{$testimonial->country == 'yu'?'selected':'' }}>
                                                                    Yugoslavia
                                                                    (former)
                                                                </option>
                                                                <option value='za'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag za"
                                                                        data-title="South Africa" {{$testimonial->country == 'za'?'selected':'' }}>
                                                                    South Africa
                                                                </option>
                                                                <option value='zm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag zm"
                                                                        data-title="Zambia" {{$testimonial->country == 'zm'?'selected':'' }}>
                                                                    Zambia
                                                                </option>
                                                                <option value='zr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag zr"
                                                                        data-title="Zaire (former)" {{$testimonial->country == 'zr'?'selected':'' }}>
                                                                    Zaire (former)
                                                                </option>
                                                                <option value='zw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag zw"
                                                                        data-title="Zimbabwe" {{$testimonial->country == 'zw'?'selected':'' }}>
                                                                    Zimbabwe
                                                                </option>
                                                            </select>

                                                            <span class="form-text text-danger"
                                                                  id="country_error"></span>

                                                        </div>
                                                        <span class="form-text text-danger"
                                                              id="country_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.gender')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="gender" id="gender" type="text">

                                                                <option value="">
                                                                    {{trans('general.select_from_list')}}
                                                                </option>

                                                                <option value="male"
                                                                    {{$testimonial->gender == trans('general.male') ? 'selected':''}}>
                                                                    {{trans('testimonials.male')}}
                                                                </option>

                                                                <option value="female"
                                                                    {{$testimonial->gender == trans('general.female') ? 'selected':''}}>
                                                                    {{trans('testimonials.female')}}
                                                                </option>

                                                                <option value="others"
                                                                    {{$testimonial->gender == trans('general.others') ? 'selected':''}}>
                                                                    {{trans('testimonials.others')}}
                                                                </option>

                                                            </select>
                                                            <span class="form-text text-danger"
                                                                  id="gender_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.job_title_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="job_title_ar" id="job_title_ar" type="text"
                                                                placeholder=" {{trans('testimonials.enter_job_title_ar')}}"
                                                                autocomplete="off"
                                                                value="{{$testimonial->job_title_ar}}"/>

                                                            <span class="form-text text-danger"
                                                                  id="job_title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.job_title_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="job_title_en" id="job_title_en" type="text"
                                                                placeholder=" {{trans('testimonials.enter_job_title_en')}}"
                                                                autocomplete="off"
                                                                value="{{$testimonial->job_title_en}}"/>
                                                            <span class="form-text text-danger"
                                                                  id="job_title_en_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.rating')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="rating" id="rating" type="text">

                                                                <option value="">
                                                                    {{trans('general.select_from_list')}}
                                                                </option>

                                                                <option
                                                                    value="1" {{$testimonial->rating == '1'?'selected':''}} >
                                                                    {{trans('testimonials.one_star')}}
                                                                </option>

                                                                <option
                                                                    value="2" {{$testimonial->rating == '2'?'selected':''}}>
                                                                    {{trans('testimonials.two_star')}}
                                                                </option>
                                                                <option
                                                                    value="3" {{$testimonial->rating == '3'?'selected':''}}>
                                                                    {{trans('testimonials.three_star')}}
                                                                </option>
                                                                <option
                                                                    value="4" {{$testimonial->rating == '4'?'selected':''}}>
                                                                    {{trans('testimonials.four_star')}}
                                                                </option>
                                                                <option
                                                                    value="5" {{$testimonial->rating == '5'?'selected':''}}>
                                                                    {{trans('testimonials.five_star')}}
                                                                </option>


                                                            </select>
                                                            <span class="form-text text-danger"
                                                                  id="rating_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.opinion_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="12" dir="rtl"
                                                                      class="form-control form-control-solid form-control-lg"
                                                                      name="opinion_ar" id="opinion_ar" type="text"
                                                                      placeholder=" {{trans('testimonials.enter_opinion_ar')}}"
                                                                      autocomplete="off">{{$testimonial->opinion_ar}}</textarea>
                                                            <span class="form-text text-danger"
                                                                  id="opinion_ar_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('testimonials.opinion_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="12" dir="ltr"
                                                                      class="form-control form-control-solid form-control-lg"
                                                                      name="opinion_en" id="opinion_en" type="text"
                                                                      placeholder=" {{trans('testimonials.enter_opinion_en')}}"
                                                                      autocomplete="off">{{$testimonial->opinion_en}}</textarea>
                                                            <span class="form-text text-danger"
                                                                  id="opinion_en_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                </div>
                                                <!--begin::body-->

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::content-->

    </form>
@endsection

@push('js')
    <script type="text/javascript">

        ////////////////////////////////////////////////////
        var testimonial_photo = new KTImageInput('kt_testimonial_photo');

        $('#form_opinions_update').on('submit', function (e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#title_ar').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#language').css('border-color', '');
            $('#opinion_ar').css('border-color', '');
            $('#opinion_en').css('border-color', '');
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#age').css('border-color', '');
            $('#country').css('border-color', '');
            $('#gender').css('border-color', '');
            $('#job_title_ar').css('border-color', '');
            $('#job_title_en').css('border-color', '');
            $('#rating').css('border-color', '');


            $('#photo_error').text('');
            $('#language_error').text('');
            $('#opinion_ar_error').text('');
            $('#opinion_en_error').text('');
            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#age_error').text('');
            $('#country_error').text('');
            $('#gender_error').text('');
            $('#job_title_ar_error').text('');
            $('#job_title_en_error').text('');
            $('#rating_error').text('');
            /////////////////////////////////////////////////////////////
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },//end beforeSend
                success: function (data) {
                    KTApp.unblockPage();
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'update_testimonials_button'}
                        });
                        $('.update_testimonials_button').click(function () {
                            window.location.href = "{{route('admin.testimonials')}}";
                        });
                    }
                },//end success

                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                        $('html, body').animate({scrollTop: 20}, 300);
                    });

                },//end error

                complete: function () {
                    KTApp.unblockPage();
                },//end complete

            });

        });//end submit


    </script>
@endpush
