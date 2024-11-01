<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_personal_data.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-personel {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .div-profile {
            margin-top: 0;
        }

        .div-row-profile {
            margin: 0;
        }

        .modal-header-notification-error {
            border-bottom: 1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .div-title-notification {
            margin: 1.5%;
            margin-top: 2%;
            margin-bottom: 5%;
            font-family: Monserrat;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .div-title-notification img {
            max-width: 100%;
            height: 6vh;
            margin-right: 5%;
        }

        .title-text-notification {
            font-family: Inter;
            font-weight: 700;
            font-size: 2.5vw;
            margin-left: 0.5%;
        }

        .photo {
            border-radius: 50%;
        }

        .required {
            color: red;
        }

    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-form">
            <form id="personal_data_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="div-profile">
                    <div class="row div-row-profile">
                        <div class="col-2 subdiv-profile-image">
                            <!-- <img src="{{ isset($data[0]->photo) ? $photo : url('/pictures/profile-picture.png') }}"
                                alt="Profile"> -->
                            <img src="{{ '../../photo_profile/' . $photo }}" alt="Profile" class="photo rounded-circle" id="photo" name="photo">
                            <label class="btn btn-primary" id=""><i class="fa fa-edit"></i>
                                {{ __('personel_personal_data.btn_change_picture') }}
                                <input type="file" class="form-control" id="photo_profile" name="photo_profile" value="true" hidden>
                                <textarea name="photo_employee" id="photo_employee" cols="30" rows="10" hidden></textarea>
                            </label>
                        </div>
                        <div class="col-7 subdiv-profile">
                            <div class="row">
                                <div class="col-auto">
                                    <p id="employee_name_profile" name="employee_name_profile"></p>
                                </div>
                                <div class="col-auto">
                                    <p>&emsp; | &emsp;</p>
                                </div>
                                <div class="col-auto">
                                    <p id="employee_no_profile" name="employee_no_profile"></p>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <p class="small" id="company_name_profile" name="company_name_profile"></p>
                                </div>
                                <div class="col-auto">
                                    <p class="small">&emsp; | &emsp;</p>
                                </div>
                                <div class="col-auto">
                                    <p  class="small" id="position_name_profile" name="position_name_profile"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <p class="small" id="company_email_profile" name="company_email_profile"></p>
                                </div>
                                <div class="col-auto">
                                    <p class="small">&emsp; | &emsp;</p>
                                </div>
                                <div class="col-auto">
                                    <p  class="small" id="phone_number_profile" name="phone_number_profile"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 subdiv-profile">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary" name="btn-save-profile" id="btn-save-profile"
                                        style="width: 100%;">
                                        <i class="fa fa-floppy-o"></i> {{ __('personel_personal_data.btn_save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="div-title">
                    <a href="{{ url()->previous() }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('personel_personal_data.list_detail') }}</span>
                    </a>
                </div>
                <ul class="nav nav-tabs" id="tab-personal" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info_tab" role="tab"
                            aria-controls="info" aria-selected="true">{{ __('personel_personal_data.info_tab') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-toggle="tab" href="#address_tab" role="tab"
                            aria-controls="address"
                            aria-selected="false">{{ __('personel_personal_data.address_tab') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="employment-tab" data-toggle="tab" href="#employment_tab" role="tab"
                            aria-controls="employment"
                            aria-selected="false">{{ __('personel_personal_data.employment_tab') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="absenteeism-payroll-tab" data-toggle="tab"
                            href="#absenteeism_payroll_tab" role="tab" aria-controls="absenteeism-payroll"
                            aria-selected="false">{{ __('personel_personal_data.absenteeism_payroll_tab') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="family-dependent-tab" data-toggle="tab" href="#family_dependent_tab"
                            role="tab" aria-controls="family-dependent"
                            aria-selected="false">{{ __('personel_personal_data.family_dependent_tab') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="insurance-tab" data-toggle="tab" href="#insurance_tab" role="tab"
                            aria-controls="insurance"
                            aria-selected="false">{{ __('personel_personal_data.insurance_tab') }}</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-content-personal">
                    <div class="tab-pane fade show active" id="info_tab" role="tabpanel" aria-labelledby="info-tab">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="employee_no_info">{{ __('personel_personal_data.label_employee_no') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="employee_no_info"
                                        name="employee_no_info"
                                        placeholder="{{ __('personel_personal_data.label_employee_no') }}">
                                </div>
                                <input type="hidden" class="form-control" id="record_status" name="record_status">
                                <input type="hidden" class="form-control" id="record_function" name="record_function">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fullname_info">{{ __('personel_personal_data.label_fullname') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="fullname_info" name="fullname_info"
                                        placeholder="{{ __('personel_personal_data.label_fullname') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title_info">{{ __('personel_personal_data.label_title') }}</label>
                                    <input type="text" class="form-control" id="title_info" name="title_info"
                                        placeholder="{{ __('personel_personal_data.label_title') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="birth_place_info">{{ __('personel_personal_data.label_birth_place') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="birth_place_info"
                                        name="birth_place_info"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="birth_date_info">{{ __('personel_personal_data.label_birth_date') }}</label>
                                    <span class="required">*</span>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="birth_date_info"
                                            name="birth_date_info"
                                            placeholder="{{ __('personel_personal_data.label_birth_date') }}">
                                        <div class="input-group-prepend" id="birth_date_info_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="gender_info">{{ __('personel_personal_data.label_gender') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="gender_info" name="gender_info">
                                        {{-- <option value="">{{ __('personel_personal_data.label_gender') }}
                                        </option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="blood_type_info">{{ __('personel_personal_data.label_blood_type') }}</label>
                                    <select class="form-control" id="blood_type_info" name="blood_type_info">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="marital_status_info">{{ __('personel_personal_data.label_marital_status') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control" id="marital_status_info" name="marital_status_info">
                                    </select>
                                </div>
                            </div>
                            <!-- ini -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="religion_info">{{ __('personel_personal_data.label_religion') }}</label>
                                    <select class="form-control" id="religion_info" name="religion_info">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="nationality_info">{{ __('personel_personal_data.label_nationality') }}</label>
                                    <select class="form-control" id="nationality_info" name="nationality_info">
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="id_no_info">{{ __('personel_personal_data.label_id_no') }}</label>
                                    <input type="text" class="form-control" id="id_no_info" name="id_no_info"
                                        placeholder="{{ __('personel_personal_data.label_id_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="passport_no_info">{{ __('personel_personal_data.label_passport_no') }}</label>
                                    <input type="text" class="form-control" id="passport_no_info"
                                        name="passport_no_info"
                                        placeholder="{{ __('personel_personal_data.label_passport_no') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="passport_date_info">{{ __('personel_personal_data.label_passport_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="passport_date_info"
                                            name="passport_date_info"
                                            placeholder="{{ __('personel_personal_data.label_passport_date') }}">
                                        <div class="input-group-prepend" id="passport_date_info_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="tax_registered_no_info">{{ __('personel_personal_data.label_tax_registered_no') }}</label>
                                    <input type="text" class="form-control" id="tax_registered_no_info"
                                        name="tax_registered_no_info"
                                        placeholder="{{ __('personel_personal_data.label_tax_registered_no') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="tax_registered_date_info">{{ __('personel_personal_data.label_tax_registered_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="tax_registered_date_info"
                                            name="tax_registered_date_info"
                                            placeholder="{{ __('personel_personal_data.label_tax_registered_date') }}">
                                        <div class="input-group-prepend" id="tax_registered_date_info_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="tax_office_info">{{ __('personel_personal_data.label_tax_office') }}</label>
                                    <input type="text" class="form-control" id="tax_office_info" name="tax_office_info"
                                        placeholder="{{ __('personel_personal_data.label_tax_office') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="tax_expiry_date_info">{{ __('personel_personal_data.label_tax_expiry_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="tax_expiry_date_info"
                                            name="tax_expiry_date_info"
                                            placeholder="{{ __('personel_personal_data.label_tax_expiry_date') }}">
                                        <div class="input-group-prepend" id="tax_expiry_date_info_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="driving_license_car_type_info">{{ __('personel_personal_data.label_driving_license_car_type') }}</label>
                                    <select class="form-control" id="driving_license_car_type_info"
                                        name="driving_license_car_type_info">
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="driving_license_car_no_info">{{ __('personel_personal_data.label_driving_license_car_no') }}</label>
                                    <input type="text" class="form-control" id="driving_license_car_no_info"
                                        name="driving_license_car_no_info"
                                        placeholder="{{ __('personel_personal_data.label_driving_license_car_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="driving_license_car_date_info">{{ __('personel_personal_data.label_driving_license_car_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="driving_license_car_date_info"
                                            name="driving_license_car_date_info"
                                            placeholder="{{ __('personel_personal_data.label_driving_license_car_date') }}">
                                        <div class="input-group-prepend" id="driving_license_car_date_info_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="driving_license_car_registration_place_info">{{ __('personel_personal_data.label_driving_license_car_registration_place') }}</label>
                                    <select class="form-control select2"
                                        id="driving_license_car_registration_place_info"
                                        name="driving_license_car_registration_place_info"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="driving_license_car_expiry_date_info">{{ __('personel_personal_data.label_driving_license_car_expiry_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control"
                                            id="driving_license_car_expiry_date_info"
                                            name="driving_license_car_expiry_date_info"
                                            placeholder="{{ __('personel_personal_data.label_driving_license_car_expiry_date') }}">
                                        <div class="input-group-prepend" id="driving_license_car_expiry_date_info_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="driving_license_motorcycle_no_info">{{ __('personel_personal_data.label_driving_license_motorcycle_no') }}</label>
                                    <input type="text" class="form-control" id="driving_license_motorcycle_no_info"
                                        name="driving_license_motorcycle_no_info"
                                        placeholder="{{ __('personel_personal_data.label_driving_license_motorcycle_no') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="driving_license_motorcycle_date_info">{{ __('personel_personal_data.label_driving_license_motorcycle_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control"
                                            id="driving_license_motorcycle_date_info"
                                            name="driving_license_motorcycle_date_info"
                                            placeholder="{{ __('personel_personal_data.label_driving_license_motorcycle_date') }}">
                                        <div class="input-group-prepend" id="driving_license_motorcycle_date_info_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="driving_license_motorcycle_registration_place_info">{{ __('personel_personal_data.label_driving_license_motorcycle_registration_place') }}</label>
                                    <select class="form-control select2"
                                        id="driving_license_motorcycle_registration_place_info"
                                        name="driving_license_motorcycle_registration_place_info"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="driving_license_motorcycle_expiry_date_info">{{ __('personel_personal_data.label_driving_license_motorcycle_expiry_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control"
                                            id="driving_license_motorcycle_expiry_date_info"
                                            name="driving_license_motorcycle_expiry_date_info"
                                            placeholder="{{ __('personel_personal_data.label_driving_license_motorcycle_expiry_date') }}">
                                        <div class="input-group-prepend" id="driving_license_motorcycle_expiry_date_info_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="mother_name_info">{{ __('personel_personal_data.label_mother_name') }}</label>
                                    <input type="text" class="form-control" id="mother_name_info"
                                        name="mother_name_info"
                                        placeholder="{{ __('personel_personal_data.label_mother_name') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address_tab" role="tabpanel" aria-labelledby="address-tab">
                        <div class="row">
                            <div class="col-5">
                                <span
                                    class="div-title-text">{{ __('personel_personal_data.label_home_address') }}</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="address_home">{{ __('personel_personal_data.label_address') }}</label>
                                            <textarea class="form-control" id="address_home" name="address_home"
                                                rows="3"
                                                placeholder="{{ __('personel_personal_data.label_address') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label
                                                for="city_select_home">{{ __('personel_personal_data.label_city') }}</label>
                                            <select class="form-control select2" id="city_select_home"
                                                name="city_select_home"></select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="city_text_home">&nbsp;</label>
                                            <input type="text" class="form-control" id="city_text_home"
                                                name="city_text_home"
                                                placeholder="{{ __('personel_personal_data.label_city') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label
                                                for="zip_code_select_home">{{ __('personel_personal_data.label_zip_code') }}</label>
                                            <select class="form-control select2" id="zip_code_select_home"
                                                name="zip_code_select_home"></select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="zip_code_text_home">&nbsp;</label>
                                            <input type="text" class="form-control" id="zip_code_text_home"
                                                name="zip_code_text_home"
                                                placeholder="{{ __('personel_personal_data.label_zip_code') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="district_select_home">{{ __('personel_personal_data.label_district') }}</label>
                                            <select class="form-control select2" id="district_select_home"
                                                name="district_select_home"></select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="subdistrict_home">{{ __('personel_personal_data.label_subdistrict') }}</label>
                                            <select class="form-control select2" id="subdistrict_select_home"
                                                name="subdistrict_select_home"></select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="phone_number_home">{{ __('personel_personal_data.label_phone_number') }}</label>
                                            <input type="text" class="form-control" id="phone_number_home"
                                                name="phone_number_home"
                                                placeholder="{{ __('personel_personal_data.label_phone_number') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <hr class="vertical" />
                            </div>
                            <div class="col-5">
                                <span
                                    class="div-title-text">{{ __('personel_personal_data.label_other_address') }}</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="address_other">{{ __('personel_personal_data.label_address') }}</label>
                                            <textarea class="form-control" id="address_other" name="address_other"
                                                rows="3"
                                                placeholder="{{ __('personel_personal_data.label_address') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label
                                                for="city_select_other">{{ __('personel_personal_data.label_city') }}</label>
                                            <select class="form-control select2" id="city_select_other"
                                                name="city_select_other"></select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="city_text_other">&nbsp;</label>
                                            <input type="text" class="form-control" id="city_text_other"
                                                name="city_text_other"
                                                placeholder="{{ __('personel_personal_data.label_city') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label
                                                for="zip_code_select_other">{{ __('personel_personal_data.label_zip_code') }}</label>
                                            <select class="form-control select2" id="zip_code_select_other"
                                                name="zip_code_select_other"></select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="zip_code_text_other">&nbsp;</label>
                                            <input type="text" class="form-control" id="zip_code_text_other"
                                                name="zip_code_text_other"
                                                placeholder="{{ __('personel_personal_data.label_zip_code') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="district_select_other">{{ __('personel_personal_data.label_district') }}</label>
                                            <select class="form-control select2" id="district_select_other"
                                                name="district_select_other"></select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="subdistrict_other">{{ __('personel_personal_data.label_subdistrict') }}</label>
                                            <select class="form-control select2" id="subdistrict_select_other"
                                                name="subdistrict_select_other"></select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="phone_number_other">{{ __('personel_personal_data.label_phone_number') }}</label>
                                            <input type="text" class="form-control" id="phone_number_other"
                                                name="phone_number_other"
                                                placeholder="{{ __('personel_personal_data.label_phone_number') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr class="horizontal" />
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <span
                                    class="div-title-text">{{ __('personel_personal_data.label_work_address') }}</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="address_work">{{ __('personel_personal_data.label_address') }}</label>
                                            <textarea class="form-control" id="address_work" name="address_work"
                                                rows="3"
                                                placeholder="{{ __('personel_personal_data.label_address') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label
                                                for="city_select_work">{{ __('personel_personal_data.label_city') }}</label>
                                            <select class="form-control select2" id="city_select_work"
                                                name="city_select_work"></select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="city_text_work">&nbsp;</label>
                                            <input type="text" class="form-control" id="city_text_work"
                                                name="city_text_work"
                                                placeholder="{{ __('personel_personal_data.label_city') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label
                                                for="zip_code_select_work">{{ __('personel_personal_data.label_zip_code') }}</label>
                                            <select class="form-control select2" id="zip_code_select_work"
                                                name="zip_code_select_work"></select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="zip_code_text_work">&nbsp;</label>
                                            <input type="text" class="form-control" id="zip_code_text_work"
                                                name="zip_code_text_work"
                                                placeholder="{{ __('personel_personal_data.label_zip_code') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="phone_number_work">{{ __('personel_personal_data.label_phone_number') }}</label>
                                            <input type="text" class="form-control" id="phone_number_work"
                                                name="phone_number_work"
                                                placeholder="{{ __('personel_personal_data.label_phone_number') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <hr class="vertical" />
                            </div>
                            <div class="col-5">
                                <span
                                    class="div-title-text">{{ __('personel_personal_data.label_correspondence_address') }}</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="address_correspondence">{{ __('personel_personal_data.label_address') }}</label>
                                            <textarea class="form-control" id="address_correspondence"
                                                name="address_correspondence" rows="3"
                                                placeholder="{{ __('personel_personal_data.label_address') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label
                                                for="city_select_correspondence">{{ __('personel_personal_data.label_city') }}</label>
                                            <select class="form-control select2" id="city_select_correspondence"
                                                name="city_select_correspondence"></select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="city_text_correspondence">&nbsp;</label>
                                            <input type="text" class="form-control" id="city_text_correspondence"
                                                name="city_text_correspondence"
                                                placeholder="{{ __('personel_personal_data.label_city') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label
                                                for="zip_code_select_correspondence">{{ __('personel_personal_data.label_zip_code') }}</label>
                                            <select class="form-control select2" id="zip_code_select_correspondence"
                                                name="zip_code_select_correspondence"></select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label for="zip_code_text_correspondence">&nbsp;</label>
                                            <input type="text" class="form-control" id="zip_code_text_correspondence"
                                                name="zip_code_text_correspondence"
                                                placeholder="{{ __('personel_personal_data.label_zip_code') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="phone_number_correspondence">{{ __('personel_personal_data.label_phone_number') }}</label>
                                            <input type="text" class="form-control" id="phone_number_correspondence"
                                                name="phone_number_correspondence"
                                                placeholder="{{ __('personel_personal_data.label_phone_number') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr class="horizontal" />
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <span
                                    class="div-title-text">{{ __('personel_personal_data.label_emergency_contact') }}</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="name_emergency">{{ __('personel_personal_data.label_name') }}</label>
                                            <input type="text" class="form-control" id="name_emergency"
                                                name="name_emergency"
                                                placeholder="{{ __('personel_personal_data.label_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="address_emergency">{{ __('personel_personal_data.label_address') }}</label>
                                            <textarea class="form-control" id="address_emergency"
                                                name="address_emergency" rows="3"
                                                placeholder="{{ __('personel_personal_data.label_address') }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="phone_number_emergency">{{ __('personel_personal_data.label_phone_number') }}</label>
                                            <input type="text" class="form-control" id="phone_number_emergency"
                                                name="phone_number_emergency"
                                                placeholder="{{ __('personel_personal_data.label_phone_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="relation_emergency">{{ __('personel_personal_data.label_relation') }}</label>
                                            <input type="text" class="form-control" id="relation_emergency"
                                                name="relation_emergency"
                                                placeholder="{{ __('personel_personal_data.label_relation') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="email_emergency">{{ __('personel_personal_data.label_email') }}</label>
                                            <input type="text" class="form-control" id="email_emergency"
                                                name="email_emergency"
                                                placeholder="{{ __('personel_personal_data.label_email') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <hr class="vertical" />
                            </div>
                            <div class="col-5">
                                <span class="div-title-text">{{ __('personel_personal_data.label_other') }}</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="handphone_no_other">{{ __('personel_personal_data.label_handphone_no') }}</label>
                                            <input type="text" class="form-control" id="handphone_no_other"
                                                name="handphone_no_other"
                                                placeholder="{{ __('personel_personal_data.label_handphone_no') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="personal_email_other">{{ __('personel_personal_data.label_personal_email') }}</label>
                                            <input type="text" class="form-control" id="personal_email_other"
                                                name="personal_email_other"
                                                placeholder="{{ __('personel_personal_data.label_personal_email') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="company_email_other">{{ __('personel_personal_data.label_company_email') }}</label>
                                            <input type="text" class="form-control" id="company_email_other"
                                                name="company_email_other"
                                                placeholder="{{ __('personel_personal_data.label_company_email') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="company_card_id_other">{{ __('personel_personal_data.label_company_card_id') }}</label>
                                            <input type="text" class="form-control" id="company_card_id_other"
                                                name="company_card_id_other"
                                                placeholder="{{ __('personel_personal_data.label_company_card_id') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="employment_tab" role="tabpanel" aria-labelledby="employment-tab">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="employment_status_employment">{{ __('personel_personal_data.label_employment_status') }}</label>
                                    <select class="form-control" id="employment_status_employment"
                                        name="employment_status_employment">
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="employment_type_employment">{{ __('personel_personal_data.label_employment_type') }}</label>
                                    <select class="form-control" id="employment_type_employment"
                                        name="employment_type_employment">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="origin_join_date_employment">{{ __('personel_personal_data.label_origin_join_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="origin_join_date_employment"
                                            name="origin_join_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_origin_join_date') }}">
                                        <div class="input-group-prepend" id="origin_join_date_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="office_location_employment">{{ __('personel_personal_data.label_office_location') }}</label>
                                    <select class="form-control" id="office_location_employment"
                                        name="office_location_employment">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="joining_date_employment">{{ __('personel_personal_data.label_joining_date') }}</label>
                                    <span class="required">*</span>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="joining_date_employment"
                                            name="joining_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_joining_date') }}">
                                        <div class="input-group-prepend" id="joining_date_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="probation_end_date_employment">{{ __('personel_personal_data.label_probation_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="probation_end_date_employment"
                                            name="probation_end_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_probation_end_date') }}">
                                        <div class="input-group-prepend" id="probation_end_date_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="contract_start_date_employment">{{ __('personel_personal_data.label_contract_start_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="contract_start_date_employment"
                                            name="contract_start_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_contract_start_date') }}">
                                        <div class="input-group-prepend" id="contract_start_date_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="contract_end_date_employment">{{ __('personel_personal_data.label_contract_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="contract_end_date_employment"
                                            name="contract_end_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_contract_end_date') }}">
                                        <div class="input-group-prepend" id="contract_end_date_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="effective_permanent_date_employment">{{ __('personel_personal_data.label_effective_permanent_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="effective_permanent_date_employment"
                                            name="effective_permanent_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_effective_permanent_date') }}">
                                        <div class="input-group-prepend" id="effective_permanent_date_employment">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="termination_date_employment">{{ __('personel_personal_data.label_termination_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="termination_date_employment"
                                            name="termination_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_termination_date') }}" readonly>
                                        <div class="input-group-prepend" id="termination_date_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="effective_terminated_employment">{{ __('personel_personal_data.label_effective_terminated') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="effective_terminated_employment"
                                            name="effective_terminated_employment"
                                            placeholder="{{ __('personel_personal_data.label_effective_terminated') }}" readonly>
                                        <div class="input-group-prepend" id="effective_terminated_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="termination_code_employment">{{ __('personel_personal_data.label_termination_code') }}</label>
                                    <input type="text" class="form-control" id="termination_code_employment"
                                        name="termination_code_employment"
                                        placeholder="{{ __('personel_personal_data.label_termination_code') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="no_dana_pensiun_employment">{{ __('personel_personal_data.label_no_dana_pensiun') }}</label>
                                    <input type="text" class="form-control" id="no_dana_pensiun_employment"
                                        name="no_dana_pensiun_employment"
                                        placeholder="{{ __('personel_personal_data.label_no_dana_pensiun') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="join_date_dana_pensiun_employment">{{ __('personel_personal_data.label_join_date_dana_pensiun') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="join_date_dana_pensiun_employment"
                                            name="join_date_dana_pensiun_employment"
                                            placeholder="{{ __('personel_personal_data.label_join_date_dana_pensiun') }}">
                                        <div class="input-group-prepend" id="join_date_dana_pensiun_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="special_reason_resign_employment">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="special_reason_resign_employment"
                                            name="special_reason_resign_employment" value="true">
                                        <label class="form-check-label"
                                            for="special_reason_resign_employment">{{ __('personel_personal_data.label_special_reason_resign') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="termination_remarks_employment">{{ __('personel_personal_data.label_termination_remarks') }}</label>
                                    <textarea class="form-control" id="termination_remarks_employment"
                                        name="termination_remarks_employment" rows="3"
                                        placeholder="{{ __('personel_personal_data.label_termination_remarks') }}" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="expatriat_employment">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="expatriat_employment"
                                            name="expatriat_employment" value="true">
                                        <label class="form-check-label"
                                            for="expatriat_employment">{{ __('personel_personal_data.label_expatriat') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="license_no_employment">{{ __('personel_personal_data.label_license_no') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="license_no_employment"
                                        name="license_no_employment"
                                        placeholder="{{ __('personel_personal_data.label_license_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="start_date_employment">{{ __('personel_personal_data.label_start_date') }}</label>
                                    <span class="required">*</span>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="start_date_employment"
                                            name="start_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_start_date') }}">
                                        <div class="input-group-prepend" id="start_date_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="end_date_employment">{{ __('personel_personal_data.label_end_date') }}</label>
                                    <span class="required">*</span>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="end_date_employment"
                                            name="end_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_end_date') }}">
                                        <div class="input-group-prepend" id="end_date_employment_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="commisioner_employment">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="commisioner_employment"
                                            name="commisioner_employment" value="true">
                                        <label class="form-check-label"
                                            for="commisioner_employment">{{ __('personel_personal_data.label_commisioner') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="position_code_employment">{{ __('personel_personal_data.label_position') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control" id="position_code_employment"
                                        name="position_code_employment">
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="ranking_code_employment">{{ __('personel_personal_data.label_ranking') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control" id="ranking_code_employment"
                                        name="ranking_code_employment">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="grade_code_employment">{{ __('personel_personal_data.label_grade') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control" id="grade_code_employment"
                                        name="grade_code_employment">
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="location_code_employment">{{ __('personel_personal_data.label_location') }}</label>
                                    <select class="form-control" id="location_code_employment"
                                        name="location_code_employment">
                                    </select>
                                </div>
                            </div> -->

                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="cost_center_code_employment">{{ __('personel_personal_data.label_cost_center') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control" id="cost_center_code_employment"
                                        name="cost_center_code_employment">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="group_code_employment">{{ __('personel_personal_data.label_group_code') }}</label>
                                    <select class="form-control" id="group_code_employment"
                                        name="group_code_employment">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <span
                                    class="div-title-text">{{ __('personel_personal_data.label_level') }}</span>
                            </div>
                        </div>
                        <div class="row" id="div-level">
                            <input type="hidden" class="form-control" id="level_format" name="level_format">
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <table id="fringe_benefit_data_table" class="table hover" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Seq No</th>
                                            <th>Benefits</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-employment-data"
                                    id="btn-add-employment-data" style="width: 100%;" data-toggle="modal"
                                    data-target="#modal_add_employment_data">
                                    <i class="fa fa-plus"></i> {{ __('personel_personal_data.btn_add') }}
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-employment-data"
                                    id="btn-remove-employment-data" style="width: 100%;">
                                    <i class="fa fa-times"></i> {{ __('personel_personal_data.btn_remove') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="absenteeism_payroll_tab" role="tabpanel"
                        aria-labelledby="absenteeism-payroll-tab">
                        <div class="card">
                            <a class="collapsed" data-toggle="collapse" href="#absenteeism-data" aria-expanded="true"
                                aria-controls="absenteeism-data">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span
                                            class="dropdown-title-text">{{ __('personel_personal_data.label_absenteeism') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}"
                                            alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="absenteeism-data" class="collapse show">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="absenteeism_type_absenteeism">{{ __('personel_personal_data.label_absenteeism_type') }}</label>
                                                <span class="required">*</span>
                                                <select class="form-control" id="absenteeism_type_absenteeism"
                                                    name="absenteeism_type_absenteeism">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="work_pattern_code_absenteeism">{{ __('personel_personal_data.label_work_pattern_code') }}</label>
                                                <span class="required">*</span>
                                                <select class="form-control select2" id="work_pattern_code_absenteeism"
                                                    name="work_pattern_code_absenteeism"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="starting_day_absenteeism">{{ __('personel_personal_data.label_starting_day') }}</label>
                                                <span class="required">*</span>
                                                <input type="number" min="1" class="form-control" id="starting_day_absenteeism"
                                                    name="starting_day_absenteeism"
                                                    placeholder="{{ __('personel_personal_data.label_starting_day') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="absent_not_required_absenteeism">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="absent_not_required_absenteeism"
                                                        name="absent_not_required_absenteeism" value="true">
                                                    <label class="form-check-label"
                                                        for="absent_not_required_absenteeism">{{ __('personel_personal_data.label_absent_not_required') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="finger_not_required_absenteeism">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="finger_not_required_absenteeism"
                                                        name="finger_not_required_absenteeism" value="true">
                                                    <label class="form-check-label"
                                                        for="finger_not_required_absenteeism">{{ __('personel_personal_data.label_finger_not_required') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed" data-toggle="collapse" href="#payroll-data" aria-expanded="true"
                                aria-controls="payroll-data">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span
                                            class="dropdown-title-text">{{ __('personel_personal_data.label_payroll') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}"
                                            alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="payroll-data" class="collapse show">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="tax_status_payroll">{{ __('personel_personal_data.label_tax_status') }}</label>
                                                <span class="required">*</span>
                                                <select class="form-control" id="tax_status_payroll"
                                                    name="tax_status_payroll">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="tax_status_next_year_payroll">{{ __('personel_personal_data.label_tax_status_next_year') }}</label>
                                                <span class="required">*</span>
                                                <select class="form-control" id="tax_status_next_year_payroll"
                                                    name="tax_status_next_year_payroll">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="tax_registered_no_payroll">{{ __('personel_personal_data.label_tax_registered_no') }}</label>
                                                <input type="text" class="form-control" id="tax_registered_no_payroll"
                                                    name="tax_registered_no_payroll"
                                                    placeholder="{{ __('personel_personal_data.label_tax_registered_no') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="tax_registered_date_payroll">{{ __('personel_personal_data.label_tax_registered_date') }}</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control"
                                                        id="tax_registered_date_payroll"
                                                        name="tax_registered_date_payroll"
                                                        placeholder="{{ __('personel_personal_data.label_tax_registered_date') }}">
                                                    <div class="input-group-prepend" id="tax_registered_date_payroll_calendar">
                                                        <span class="input-group-text"><span
                                                                class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="tax_office_payroll">{{ __('personel_personal_data.label_tax_office') }}</label>
                                                <span class="required">*</span>
                                                <select class="form-control select2" id="tax_office_payroll"
                                                    name="tax_office_payroll"></select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="tax_expiry_date_payroll">{{ __('personel_personal_data.label_tax_expiry_date') }}</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="tax_expiry_date_payroll"
                                                        name="tax_expiry_date_payroll"
                                                        placeholder="{{ __('personel_personal_data.label_tax_expiry_date') }}">
                                                    <div class="input-group-prepend" id="tax_expiry_date_payroll_calendar">
                                                        <span class="input-group-text"><span
                                                                class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="tax_calculation_method_payroll">{{ __('personel_personal_data.label_tax_calculation_method') }}</label>
                                                <span class="required">*</span>
                                                <select class="form-control" id="tax_calculation_method_payroll"
                                                    name="tax_calculation_method_payroll">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="group_npwp_payroll">{{ __('personel_personal_data.label_group_npwp') }}</label>
                                                <select class="form-control select2" id="group_npwp_payroll"
                                                    name="group_npwp_payroll"></select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="group_bpjs_payroll">{{ __('personel_personal_data.label_group_bpjs') }}</label>
                                                <select class="form-control select2" id="group_bpjs_payroll"
                                                    name="group_bpjs_payroll"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exclude_payroll_process_payroll">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="exclude_payroll_process_payroll"
                                                        name="exclude_payroll_process_payroll" value="true">
                                                    <label class="form-check-label"
                                                        for="exclude_payroll_process_payroll">{{ __('personel_personal_data.label_exclude_payroll_process') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="group_authorize_payroll">{{ __('personel_personal_data.label_group_authorize') }} <span class="required">*</span></label>
                                                <select class="form-control select2" id="group_authorize_payroll"
                                                    name="group_authorize_payroll"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed" data-toggle="collapse" href="#bpjs-data" aria-expanded="true"
                                aria-controls="bpjs-data">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span
                                            class="dropdown-title-text">{{ __('personel_personal_data.label_bpjs') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}"
                                            alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="bpjs-data" class="collapse show">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-6">
                                            <span
                                                class="div-title-text">{{ __('personel_personal_data.label_bpjs_tenaga_kerja') }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="bpjs_number_tenaga_kerja">{{ __('personel_personal_data.label_bpjs_number') }}</label>
                                                <input type="text" class="form-control" id="bpjs_number_tenaga_kerja"
                                                    name="bpjs_number_tenaga_kerja"
                                                    placeholder="{{ __('personel_personal_data.label_bpjs_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="join_tenaga_kerja">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="join_tenaga_kerja" name="join_tenaga_kerja" value="true">
                                                    <label class="form-check-label"
                                                        for="join_tenaga_kerja">{{ __('personel_personal_data.label_join') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="joining_date_tenaga_kerja">{{ __('personel_personal_data.label_joining_date') }}</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control"
                                                        id="joining_date_tenaga_kerja" name="joining_date_tenaga_kerja"
                                                        placeholder="{{ __('personel_personal_data.label_joining_date') }}">
                                                    <div class="input-group-prepend" id="joining_date_tenaga_kerja_calendar">
                                                        <span class="input-group-text"><span
                                                                class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="payment_period_start_date_tenaga_kerja">{{ __('personel_personal_data.label_payment_period_start_date') }}</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control"
                                                        id="payment_period_start_date_tenaga_kerja"
                                                        name="payment_period_start_date_tenaga_kerja"
                                                        placeholder="{{ __('personel_personal_data.label_payment_period_start_date') }}">
                                                    <div class="input-group-prepend" id="payment_period_start_date_tenaga_kerja_calendar">
                                                        <span class="input-group-text"><span
                                                                class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="non_accidental_death_insurance_tenaga_kerja">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="non_accidental_death_insurance_tenaga_kerja"
                                                        name="non_accidental_death_insurance_tenaga_kerja" value="true">
                                                    <label class="form-check-label"
                                                        for="non_accidental_death_insurance_tenaga_kerja">{{ __('personel_personal_data.label_non_accidental_death_insurance') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pension_by_employer_tenaga_kerja">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="pension_by_employer_tenaga_kerja"
                                                        name="pension_by_employer_tenaga_kerja" value="true">
                                                    <label class="form-check-label"
                                                        for="pension_by_employer_tenaga_kerja">{{ __('personel_personal_data.label_pension_by_employer') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="work_related_accident_insurance_tenaga_kerja">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="work_related_accident_insurance_tenaga_kerja"
                                                        name="work_related_accident_insurance_tenaga_kerja" value="true">
                                                    <label class="form-check-label"
                                                        for="work_related_accident_insurance_tenaga_kerja">{{ __('personel_personal_data.label_work_related_accident_insurance') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pension_by_employee_tenaga_kerja">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="pension_by_employee_tenaga_kerja"
                                                        name="pension_by_employee_tenaga_kerja" value="true">
                                                    <label class="form-check-label"
                                                        for="pension_by_employee_tenaga_kerja">{{ __('personel_personal_data.label_pension_by_employee') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="work_related_accident_insurance_two_tenaga_kerja">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="work_related_accident_insurance_two_tenaga_kerja"
                                                        name="work_related_accident_insurance_two_tenaga_kerja" value="true">
                                                    <label class="form-check-label"
                                                        for="work_related_accident_insurance_two_tenaga_kerja">{{ __('personel_personal_data.label_work_related_accident_insurance_two') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pension_insurance_tenaga_kerja">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="pension_insurance_tenaga_kerja"
                                                        name="pension_insurance_tenaga_kerja" value="true">
                                                    <label class="form-check-label"
                                                        for="pension_insurance_tenaga_kerja">{{ __('personel_personal_data.label_pension_insurance') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="work_related_accident_insurance_three_tenaga_kerja">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="work_related_accident_insurance_three_tenaga_kerja"
                                                        name="work_related_accident_insurance_three_tenaga_kerja" value="true">
                                                    <label class="form-check-label"
                                                        for="work_related_accident_insurance_three_tenaga_kerja">{{ __('personel_personal_data.label_work_related_accident_insurance_three') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <span
                                                class="div-title-text">{{ __('personel_personal_data.label_bpjs_kesehatan') }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="bpjs_number_kesehatan">{{ __('personel_personal_data.label_bpjs_number') }}</label>
                                                <input type="text" class="form-control" id="bpjs_number_kesehatan"
                                                    name="bpjs_number_kesehatan"
                                                    placeholder="{{ __('personel_personal_data.label_bpjs_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="join_kesehatan">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="join_kesehatan"
                                                        name="join_kesehatan" value="true">
                                                    <label class="form-check-label"
                                                        for="join_kesehatan">{{ __('personel_personal_data.label_join') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="joining_date_kesehatan">{{ __('personel_personal_data.label_joining_date') }}</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="joining_date_kesehatan"
                                                        name="joining_date_kesehatan"
                                                        placeholder="{{ __('personel_personal_data.label_joining_date') }}">
                                                    <div class="input-group-prepend" id="joining_date_kesehatan_calendar">
                                                        <span class="input-group-text"><span
                                                                class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="payment_period_start_date_kesehatan">{{ __('personel_personal_data.label_payment_period_start_date') }}</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control"
                                                        id="payment_period_start_date_kesehatan"
                                                        name="payment_period_start_date_kesehatan"
                                                        placeholder="{{ __('personel_personal_data.label_payment_period_start_date') }}">
                                                    <div class="input-group-prepend" id="payment_period_start_date_kesehatan_calendar">
                                                        <span class="input-group-text"><span
                                                                class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed" data-toggle="collapse" href="#bank-data" aria-expanded="true"
                                aria-controls="bank-data">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span
                                            class="dropdown-title-text">{{ __('personel_personal_data.label_bank') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}"
                                            alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="bank-data" class="collapse show">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-6">
                                            <span
                                                class="div-title-text">{{ __('personel_personal_data.label_primary') }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="company_bank_code_primary">{{ __('personel_personal_data.label_company_bank_code') }}</label>
                                                <select class="form-control select2" id="company_bank_code_primary"
                                                    name="company_bank_code_primary"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="employee_bank_code_primary">{{ __('personel_personal_data.label_employee_bank_code') }}</label>
                                                <select class="form-control select2" id="employee_bank_code_primary"
                                                    name="employee_bank_code_primary"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="account_number_primary">{{ __('personel_personal_data.label_account_number') }}</label>
                                                <input type="text" class="form-control" id="account_number_primary"
                                                    name="account_number_primary"
                                                    placeholder="{{ __('personel_personal_data.label_account_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="currency_primary">{{ __('personel_personal_data.label_currency') }}</label>
                                                <select class="form-control" id="currency_primary"
                                                    name="currency_primary">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="beneficiary_name_primary">{{ __('personel_personal_data.label_beneficiary_name') }}</label>
                                                <input type="text" class="form-control" id="beneficiary_name_primary"
                                                    name="beneficiary_name_primary"
                                                    placeholder="{{ __('personel_personal_data.label_beneficiary_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="percentage_primary">{{ __('personel_personal_data.label_percentage') }}</label>
                                                <input type="number" min="0" class="form-control" id="percentage_primary"
                                                    name="percentage_primary"
                                                    placeholder="{{ __('personel_personal_data.label_percentage') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <span
                                                class="div-title-text">{{ __('personel_personal_data.label_optional_one') }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="company_bank_code_optional_one">{{ __('personel_personal_data.label_company_bank_code') }}</label>
                                                <select class="form-control select2" id="company_bank_code_optional_one"
                                                    name="company_bank_code_optional_one"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="employee_bank_code_optional_one">{{ __('personel_personal_data.label_employee_bank_code') }}</label>
                                                <select class="form-control select2"
                                                    id="employee_bank_code_optional_one"
                                                    name="employee_bank_code_optional_one"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="account_number_optional_one">{{ __('personel_personal_data.label_account_number') }}</label>
                                                <input type="text" class="form-control" id="account_number_optional_one"
                                                    name="account_number_optional_one"
                                                    placeholder="{{ __('personel_personal_data.label_account_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="currency_optional_one">{{ __('personel_personal_data.label_currency') }}</label>
                                                <select class="form-control" id="currency_optional_one"
                                                    name="currency_optional_one">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="beneficiary_name_optional_one">{{ __('personel_personal_data.label_beneficiary_name') }}</label>
                                                <input type="text" class="form-control"
                                                    id="beneficiary_name_optional_one"
                                                    name="beneficiary_name_optional_one"
                                                    placeholder="{{ __('personel_personal_data.label_beneficiary_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="percentage_optional_one">{{ __('personel_personal_data.label_percentage') }}</label>
                                                <input type="number" min="0" class="form-control" id="percentage_optional_one"
                                                    name="percentage_optional_one"
                                                    placeholder="{{ __('personel_personal_data.label_percentage') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <span
                                                class="div-title-text">{{ __('personel_personal_data.label_optional_two') }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="company_bank_code_optional_two">{{ __('personel_personal_data.label_company_bank_code') }}</label>
                                                <select class="form-control select2" id="company_bank_code_optional_two"
                                                    name="company_bank_code_optional_two"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="employee_bank_code_optional_two">{{ __('personel_personal_data.label_employee_bank_code') }}</label>
                                                <select class="form-control select2"
                                                    id="employee_bank_code_optional_two"
                                                    name="employee_bank_code_optional_two"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="account_number_optional_two">{{ __('personel_personal_data.label_account_number') }}</label>
                                                <input type="text" class="form-control" id="account_number_optional_two"
                                                    name="account_number_optional_two"
                                                    placeholder="{{ __('personel_personal_data.label_account_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="currency_optional_two">{{ __('personel_personal_data.label_currency') }}</label>
                                                <select class="form-control" id="currency_optional_two"
                                                    name="currency_optional_two">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="beneficiary_name_optional_two">{{ __('personel_personal_data.label_beneficiary_name') }}</label>
                                                <input type="text" class="form-control"
                                                    id="beneficiary_name_optional_two"
                                                    name="beneficiary_name_optional_two"
                                                    placeholder="{{ __('personel_personal_data.label_beneficiary_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="percentage_optional_two">{{ __('personel_personal_data.label_percentage') }}</label>
                                                <input type="number" min="0" class="form-control" id="percentage_optional_two"
                                                    name="percentage_optional_two"
                                                    placeholder="{{ __('personel_personal_data.label_percentage') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="family_dependent_tab" role="tabpanel"
                        aria-labelledby="family-dependent-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="div-table">
                                    <table id="family_dependent_data_table" class="table hover" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Seq No</th>
                                                <th>Name</th>
                                                <th>Relation</th>
                                                <th>Birth Date</th>
                                                <th>Birth Place</th>
                                                <th>Gender</th>
                                                <th>Blood Type</th>
                                                <th>Family Card No</th>
                                                <th>Occupation</th>
                                                <th>Medical</th>
                                                <th>Tax</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-family-dependent-data"
                                    id="btn-add-family-dependent-data" style="width: 100%;" data-toggle="modal"
                                    data-target="#modal_add_family_dependent_data">
                                    <i class="fa fa-plus"></i> {{ __('personel_personal_data.btn_add') }}
                                    <input type="hidden" id="get_employee_no" name="get_employee_no" value="">
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-family-dependent-data"
                                    id="btn-remove-family-dependent-data" style="width: 100%;">
                                    <i class="fa fa-times"></i> {{ __('personel_personal_data.btn_remove') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="insurance_tab" role="tabpanel" aria-labelledby="insurance-tab">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="insurance_code_insurance">{{ __('personel_personal_data.label_insurance_code') }}</label>
                                    <select class="form-control select2" id="insurance_code_insurance"
                                        name="insurance_code_insurance"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="insurance_class_insurance">{{ __('personel_personal_data.label_insurance_class') }}</label>
                                    <select class="form-control select2" id="insurance_class_insurance"
                                        name="insurance_class_insurance"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="insurance_date_insurance">{{ __('personel_personal_data.label_insurance_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="insurance_date_insurance"
                                            name="insurance_date_insurance"
                                            placeholder="{{ __('personel_personal_data.label_insurance_date') }}">
                                        <div class="input-group-prepend" id="insurance_date_insurance_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="insurance_policy_no_insurance">{{ __('personel_personal_data.label_insurance_policy_no') }}</label>
                                    <input type="text" class="form-control" id="insurance_policy_no_insurance"
                                        name="insurance_policy_no_insurance"
                                        placeholder="{{ __('personel_personal_data.label_insurance_policy_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label
                                        for="remarks_insurance">{{ __('personel_personal_data.label_remarks') }}</label>
                                    <textarea class="form-control" id="remarks_insurance" name="remarks_insurance"
                                        rows="3"
                                        placeholder="{{ __('personel_personal_data.label_remarks') }}"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_add_family_dependent_data"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_personal_data.title_modal_family_dependent_data') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="family_dependent_data_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="seq_no_family_dependent_data">{{ __('personel_personal_data.label_seq_no') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="seq_no_family_dependent_data"
                                        name="seq_no_family_dependent_data"
                                        placeholder="{{ __('personel_personal_data.label_seq_no') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="name_family_dependent_data">{{ __('personel_personal_data.label_name') }}</label>
                                    <input type="text" class="form-control" id="name_family_dependent_data"
                                        name="name_family_dependent_data"
                                        placeholder="{{ __('personel_personal_data.label_name') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="relation_family_dependent_data">{{ __('personel_personal_data.label_relation') }}</label>
                                    <select class="form-control" id="relation_family_dependent_data"
                                        name="relation_family_dependent_data">
                                        <option value="">
                                            {{ __('personel_personal_data.label_relation') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="birth_date_family_dependent_data">{{ __('personel_personal_data.label_birth_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="birth_date_family_dependent_data"
                                            name="birth_date_family_dependent_data"
                                            placeholder="{{ __('personel_personal_data.label_birth_date') }}">
                                        <div class="input-group-prepend" id="birth_date_family_dependent_data_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="birth_place_family_dependent_data">{{ __('personel_personal_data.label_birth_place') }}</label>
                                    <select class="form-control select2" id="birth_place_family_dependent_data"
                                        name="birth_place_family_dependent_data"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="gender_family_dependent_data">{{ __('personel_personal_data.label_gender') }}</label>
                                    <select class="form-control" id="gender_family_dependent_data"
                                        name="gender_family_dependent_data">
                                        <option value="">
                                            {{ __('personel_personal_data.label_gender') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="blood_type_family_dependent_data">{{ __('personel_personal_data.label_blood_type') }}</label>
                                    <select class="form-control" id="blood_type_family_dependent_data"
                                        name="blood_type_family_dependent_data">
                                        <option value="">
                                            {{ __('personel_personal_data.label_blood_type') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="family_card_no_family_dependent_data">{{ __('personel_personal_data.label_family_card_no') }}</label>
                                    <input type="text" class="form-control" id="family_card_no_family_dependent_data"
                                        name="family_card_no_family_dependent_data"
                                        placeholder="{{ __('personel_personal_data.label_family_card_no') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="occupation_family_dependent_data">{{ __('personel_personal_data.label_occupation') }}</label>
                                    <input type="text" class="form-control" id="occupation_family_dependent_data"
                                        name="occupation_family_dependent_data"
                                        placeholder="{{ __('personel_personal_data.label_occupation') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="include_medical_family_dependent_data">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="include_medical_family_dependent_data" name="include_medical_family_dependent_data" value="true">
                                        <label class="form-check-label"
                                            for="include_medical_family_dependent_data">{{ __('personel_personal_data.label_include_medical') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="include_tax_family_dependent_data">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="include_tax_family_dependent_data" name="include_tax_family_dependent_data" value="true">
                                        <label class="form-check-label"
                                            for="include_tax_family_dependent_data">{{ __('personel_personal_data.label_include_tax') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" id="btn-save-family-dependent-data" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> {{ __('personel_personal_data.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_personal_data.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_employment_data"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_personal_data.title_modal_employment_data') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="employment_data_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="seq_no_employment_data">{{ __('personel_personal_data.label_seq_no') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="seq_no_employment_data"
                                        name="seq_no_employment_data"
                                        placeholder="{{ __('personel_personal_data.label_seq_no') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="benefits_employment_data">{{ __('personel_personal_data.label_benefits') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control" id="benefits_employment_data"
                                        name="benefits_employment_data">
                                        <option value="">
                                            {{ __('personel_personal_data.label_benefits') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="description_employment_data">{{ __('personel_personal_data.label_description') }}</label>
                                    <input type="text" class="form-control" id="description_employment_data"
                                        name="description_employment_data"
                                        placeholder="{{ __('personel_personal_data.label_description') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="start_date_employment_data">{{ __('personel_personal_data.label_start_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="start_date_employment_data"
                                            name="start_date_employment_data"
                                            placeholder="{{ __('personel_personal_data.label_start_date') }}">
                                        <div class="input-group-prepend" id="start_date_employment_data_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="end_date_employment_data">{{ __('personel_personal_data.label_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="end_date_employment_data"
                                            name="end_date_employment_data"
                                            placeholder="{{ __('personel_personal_data.label_end_date') }}">
                                        <div class="input-group-prepend" id="end_date_employment_data_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" id="btn-save-employment-data" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> {{ __('personel_personal_data.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_personal_data.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-error">
                    <h5 class="modal-title">Error!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification-error">{{ $errors->first() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div-title-notification">
                        <img src="{{ url('/pictures/checklist-green-confirm-password.svg') }}" alt="Password">
                        <span class="title-text-notification">{{ __('personel_personal_data.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success_detail">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div-title-notification">
                        <img src="{{ url('/pictures/checklist-green-confirm-password.svg') }}" alt="Password">
                        <span class="title-text-notification">{{ __('personel_personal_data.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success-detail"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(function () {
        pickerStartDateEmploymentData();
        pickerEndDateEmploymentData();
        pickerBirthDateFamilyDependentData();
    });

    function pickerStartDateEmploymentData() {
        $('#start_date_employment_data').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#start_date_employment_data_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }

    function pickerEndDateEmploymentData() {
        $('#end_date_employment_data').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#end_date_employment_data_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }

    function pickerBirthDateFamilyDependentData() {
        $('#birth_date_family_dependent_data').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#birth_date_family_dependent_data_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }

</script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURLTwo')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURLTwo', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURLTwo');

        sessionStorage.removeItem('previousURLTwo');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {
        $.fn.modal.Constructor.prototype._enforceFocus = function() {};
        
        let pickerBirthDate = $('#birth_date_info').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#birth_date_info_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerPassportDate = $('#passport_date_info').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#passport_date_info_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerTaxRegisteredDateInfo = $('#tax_registered_date_info').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#tax_registered_date_info_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        // let pickerTaxRegisteredDatePayroll = $('#tax_registered_date_payroll').flatpickr({
        //     altInput: true,
        //     allowInput: true,
        //     altFormat: "d-M-Y",
        //     dateFormat: "Y-m-d",
        //     defaultDate: null,
        //     onReady: function () {
        //         var flatPickrInstance = this;
        //         var $flatPickrInput = $(flatPickrInstance.element);
        //         $flatPickrInput.siblings("#tax_registered_date_payroll_calendar").click(function () {
        //             flatPickrInstance.toggle();
        //         });
        //     }
        // });

        let pickerTaxExpiryDateInfo = $('#tax_expiry_date_info').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#tax_expiry_date_info_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        // let pickerTaxExpiryDatePayroll = $('#tax_expiry_date_payroll').flatpickr({
        //     altInput: true,
        //     allowInput: true,
        //     altFormat: "d-M-Y",
        //     dateFormat: "Y-m-d",
        //     defaultDate: null,
        //     onReady: function () {
        //         var flatPickrInstance = this;
        //         var $flatPickrInput = $(flatPickrInstance.element);
        //         $flatPickrInput.siblings("#tax_expiry_date_payroll_calendar").click(function () {
        //             flatPickrInstance.toggle();
        //         });
        //     }
        // });

        let pickerDrivingLicenseCarDate = $('#driving_license_car_date_info').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#driving_license_car_date_info_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerDrivingLicenseCarExpiryDate = $('#driving_license_car_expiry_date_info').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#driving_license_car_expiry_date_info_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerDrivingLicenseMotorcycleDate = $('#driving_license_motorcycle_date_info').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#driving_license_motorcycle_date_info_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerDrivingLicenseMotorcycleExpiryDate = $('#driving_license_motorcycle_expiry_date_info').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#driving_license_motorcycle_expiry_date_info_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerOriginJoinDate = $('#origin_join_date_employment').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#origin_join_date_employment_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerJoinDate = $('#joining_date_employment').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#joining_date_employment_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerJoiningDateBPJSTenagaKerja = $('#joining_date_tenaga_kerja').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#joining_date_tenaga_kerja_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerJoiningDateBPJSKesehatan = $('#joining_date_kesehatan').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#joining_date_kesehatan_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerProbationEndDate = $('#probation_end_date_employment').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#probation_end_date_employment_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerContractStartDate = $('#contract_start_date_employment').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#contract_start_date_employment_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerContractEndDate = $('#contract_end_date_employment').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#contract_end_date_employment_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerEffectivePermanentDate = $('#effective_permanent_date_employment').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#effective_permanent_date_employment_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerJoinDateDanaPensiun = $('#join_date_dana_pensiun_employment').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#join_date_dana_pensiun_employment_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        // let pickerTerminationDate = $('#termination_date_employment').flatpickr({
        //     altInput: true,
        //     allowInput: true,
        //     altFormat: "d-M-Y",
        //     dateFormat: "Y-m-d",
        //     defaultDate: null,
        //     onReady: function () {
        //         var flatPickrInstance = this;
        //         var $flatPickrInput = $(flatPickrInstance.element);
        //         $flatPickrInput.siblings("#termination_date_employment_calendar").click(function () {
        //             flatPickrInstance.toggle();
        //         });
        //     }
        // });

        // let pickerEffectiveTerminated = $('#effective_terminated_employment').flatpickr({
        //     altInput: true,
        //     allowInput: true,
        //     altFormat: "d-M-Y",
        //     dateFormat: "Y-m-d",
        //     defaultDate: null,
        //     onReady: function () {
        //         var flatPickrInstance = this;
        //         var $flatPickrInput = $(flatPickrInstance.element);
        //         $flatPickrInput.siblings("#effective_terminated_employment_calendar").click(function () {
        //             flatPickrInstance.toggle();
        //         });
        //     }
        // });

        let pickerExpatriatStartDate = $('#start_date_employment').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#start_date_employment_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerExpatriatEndDate = $('#end_date_employment').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#end_date_employment_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerPaymentPeriodStartDateBPJSTenagaKerja = $('#payment_period_start_date_tenaga_kerja').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#payment_period_start_date_tenaga_kerja_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerPaymentPeriodStartDateBPJSKesehatan = $('#payment_period_start_date_kesehatan').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#payment_period_start_date_kesehatan_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerInsuranceDate = $('#insurance_date_insurance').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: null,
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#insurance_date_insurance_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var table1 = null;
        var table2 = null;
        var func = '{{ $func }}';
        var arrayFringeBenefit = [];
        var arrayFamilyDependent = [];
        var arrData = @json($data);
        var arrData2 = @json($data2);

        loadDataBirthPlace();
        loadDataGender();
        loadDataBloodType();
        loadDataMaritalStatus();
        loadDataReligion();
        loadDataNationality();
        loadDataDrivingLicenseCarType();
        loadDataDrivingLicenseCarRegistPlace();
        loadDataDrivingLicenseMotorcycleRegistPlace();
        loadDataCity();
        loadDataZipCode();
        loadDataDistrict();
        loadDataSubdistrict();
        loadDataRelation();
        loadDataEmploymentStatus();
        loadDataEmploymentType();
        loadDataOfficeLocation();
        // loadDataTerminationCode();
        loadDataPosition();
        loadDataRanking();
        loadDataGrade();
        // loadDataLocation();
        loadDataCostCenter();
        loadDataGroupCode();
        loadDataBenefits();
        loadDataAbsenteeismType();
        loadDataWorkPatternCode();
        loadDataTaxStatus();
        loadDataTaxOffice();
        loadDataTaxCalculationMethod();
        loadDataGroupNPWP();
        loadDataGroupBPJS();
        loadDataGroupAuthorize();
        loadDataCompanyBankCode();
        loadDataEmployeeBankCode();
        loadDataCurrency();
        loadDataInsuranceCode();
        loadDataInsuranceClass();

        if (func == 'new') {
            //Profile
            $('#employee_name_profile').text('Employee Name');
            $('#record_status').val('A');
            $('#record_function').val('New');
            $('#employee_no_profile').text('Employee No');
            $('#company_name_profile').text('Company Name');
            $('#position_name_profile').text('Position Name');
            $('#company_email_profile').text('Company Email');
            $('#phone_number_profile').text('Phone Number');
            $('#photo_employee').val('');

            //Tab Info
            $.ajax({
                url: "{{ url('personel_data_detail/auto_employee_no/check') }}",
                type: "GET",
                data: {
                    'url': '/personel/PeMaster/getPeMasterGrid'
                },
                success: function (response) {
                    $('#employee_no_info').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
            $('#fullname_info').val("");
            $('#title_info').val("");
            $('#birth_place_info').val(null).trigger('change');
            $('#gender_info').val(null).trigger('change');
            $('#blood_type_info').val(null).trigger('change');
            $('#marital_status_info').val(null).trigger('change');
            $('#religion_info').val(null).trigger('change');
            $('#nationality_info').val(null).trigger('change');
            $('#id_no_info').val("");
            $('#passport_no_info').val("");
            $('#tax_registered_no_info').val("");
            $('#tax_office_info').val("");
            $('#driving_license_car_type_info').val(null).trigger('change');
            $('#driving_license_car_no_info').val("");
            $('#driving_license_car_registration_place_info').val(null).trigger('change');
            $('#driving_license_motorcycle_no_info').val("");
            $('#driving_license_motorcycle_registration_place_info').val("");
            $('#mother_name_info').val("");

            //Tab Address
            $('#address_home').val("");
            $('#city_select_home').val(null).trigger('change');
            $('#city_text_home').val("");
            $('#zip_code_select_home').val(null).trigger('change');
            $('#zip_code_text_home').val("");
            $('#district_select_home').val(null).trigger('change');
            $('#subdistrict_select_home').val(null).trigger('change');
            $('#phone_number_home').val("");

            $('#address_other').val("");
            $('#city_select_other').val(null).trigger('change');
            $('#city_text_other').val("");
            $('#zip_code_select_other').val(null).trigger('change');
            $('#zip_code_text_other').val("");
            $('#district_select_other').val(null).trigger('change');
            $('#subdistrict_select_other').val(null).trigger('change');
            $('#phone_number_other').val("");

            $('#address_work').val("");
            $('#city_select_work').val(null).trigger('change');
            $('#city_text_work').val("");
            $('#zip_code_select_work').val(null).trigger('change');
            $('#zip_code_text_work').val("");
            $('#phone_number_work').val("");

            $('#address_correspondence').val("");
            $('#city_select_correspondence').val(null).trigger('change');
            $('#city_text_correspondence').val("");
            $('#zip_code_select_correspondence').val(null).trigger('change');
            $('#zip_code_text_correspondence').val("");
            $('#phone_number_correspondence').val("");

            $('#name_emergency').val("");
            $('#address_emergency').val("");
            $('#phone_number_emergency').val("");
            $('#relation_emergency').val("");
            $('#email_emergency').val("");

            $('#handphone_no_other').val("");
            $('#personal_email_other').val("");
            $('#company_email_other').val("");
            $('#company_card_id_other').val("");

            //Tab Employment
            $('#employment_status_employment').val(null).trigger('change');
            $('#employment_type_employment').val(null).trigger('change');
            $('#termination_code_employment').val(null);
            $('#office_location_employment').val(null).trigger('change');
            $('#special_reason_resign_employment').prop('checked', false);
            $('#termination_remarks_employment').val("");
            $('#expatriat_employment').prop('checked', false);
            $('#license_no_employment').val("");
            $('#no_dana_pensiun_employment').val("");
            $('#commisioner_employment').prop('checked', false);
            $('#position_code_employment').val(null).trigger('change');
            $('#ranking_code_employment').val(null).trigger('change');
            $('#grade_code_employment').val(null).trigger('change');
            // $('#location_code_employment').val(null).trigger('change');
            $('#cost_center_code_employment').val(null).trigger('change');
            $('#group_code_employment').val(null).trigger('change');
            $('#fringe_benefit_data_table').DataTable().destroy();
            load_table_fringe_benefit();

            //Tab Absenteeism & Payroll
            $('#absenteeism_type_absenteeism').val(null).trigger('change');
            $('#work_pattern_code_absenteeism').val(null).trigger('change');
            $('#starting_day_absenteeism').val("");
            $('#absent_not_required_absenteeism').prop('checked', false);
            $('#finger_not_required_absenteeism').prop('checked', false);

            $('#tax_status_payroll').val(null).trigger('change');
            $('#tax_status_next_year_payroll').val(null).trigger('change');
            $('#tax_registered_no_payroll').val("");
            $('#tax_office_payroll').val(null).trigger('change');
            $('#tax_calculation_method_payroll').val(null).trigger('change');
            $('#group_npwp_payroll').val(null).trigger('change');
            $('#group_bpjs_payroll').val(null).trigger('change');
            $('#exclude_payroll_process_payroll').prop('checked', false);
            $('#group_authorize_payroll').val(null).trigger('change');

            $('#bpjs_number_tenaga_kerja').val("");
            $('#join_tenaga_kerja').prop('checked', true);
            $('#non_accidental_death_insurance_tenaga_kerja').prop('checked', false);
            $('#pension_by_employer_tenaga_kerja').prop('checked', false);
            $('#work_related_accident_insurance_tenaga_kerja').prop('checked', false);
            $('#pension_by_employee_tenaga_kerja').prop('checked', false);
            $('#work_related_accident_insurance_two_tenaga_kerja').prop('checked', false);
            $('#pension_insurance_tenaga_kerja').prop('checked', false);
            $('#work_related_accident_insurance_three_tenaga_kerja').prop('checked', false);

            $('#bpjs_number_kesehatan').val("");
            $('#join_kesehatan').prop('checked', true);

            $('#company_bank_code_primary').val(null).trigger('change');
            $('#employee_bank_code_primary').val(null).trigger('change');
            $('#account_number_primary').val("");
            $('#currency_primary').val(null).trigger('change');
            $('#beneficiary_name_primary').val("");
            $('#percentage_primary').val("");

            $('#company_bank_code_optional_one').val(null).trigger('change');
            $('#employee_bank_code_optional_one').val(null).trigger('change');
            $('#account_number_optional_one').val("");
            $('#currency_optional_one').val(null).trigger('change');
            $('#beneficiary_name_optional_one').val("");
            $('#percentage_optional_one').val("");

            $('#company_bank_code_optional_two').val(null).trigger('change');
            $('#employee_bank_code_optional_two').val(null).trigger('change');
            $('#account_number_optional_two').val("");
            $('#currency_optional_two').val(null).trigger('change');
            $('#beneficiary_name_optional_two').val("");
            $('#percentage_optional_two').val("");

            //Tab Family & Dependent
            $('#family_dependent_data_table').DataTable().destroy();
            load_table_family_dependent_data();

            //Tab Insurance
            $('#insurance_code_insurance').val(null).trigger('change');
            $('#insurance_class_insurance').val(null).trigger('change');
            $('#insurance_policy_no_insurance').val("");
            $('#remarks_insurance').val("");

            $.ajax({
                url: "{{ url('personnel/report/level/check') }}",
                type: "GET",
                success: function (response) {
                    $('#level_format').val(response.data[0].levelFormat);
                    for (var i = 1; i <= response.data[0].levelFormat; i++) {
                        $('#div-level').append(
                            '<div class="col-6">' +
                            '<div class="form-group">' +
                            '<label for="level' + i + '">' + response.data_level[i - 1]
                            .levelDescription + '</label> <span class="required">*</span>' +
                            '<select class="form-control select2" id="level' + i + '" name="level' +
                            i + '"></select>' +
                            '</div></div>'
                        );

                        loadDataLevelCode('#level' + i, i);
                        loadDataFirstLastAllLevel('#level' + i, i);
                    }
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
            
        }
        else if (func == 'edit') {
            //Profile
            $('#employee_name_profile').text(((typeof arrData[0].fullName !== 'undefined') ? arrData[0].fullName : ''));
            $('#record_status').val(((typeof arrData[0].recordStatus !== 'undefined') ? arrData[0].recordStatus : ''));
            $('#record_function').val("Edit");
            $('#employee_no_profile').text(((typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : ''));
            $('#company_name_profile').text(((typeof arrData[0].companyName !== 'undefined') ? arrData[0].companyName : ''));
            $('#position_name_profile').text(((typeof arrData[0].positionName !== 'undefined') ? arrData[0].positionName : ''));
            $('#company_email_profile').text(((typeof arrData[0].companyEmailAddress !== 'undefined') ? arrData[0].companyEmailAddress : ''));
            $('#phone_number_profile').text(((typeof arrData[0].personalHandphone !== 'undefined') ? arrData[0].personalHandphone : ''));
            $('#photo_employee').val(((typeof arrData2[0].photo !== 'undefined') ? arrData2[0].photo : ''));

            //Tab Info
            $('#employee_no_info').val(((typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : ''));
            $('#employee_no_info').prop('readonly', true);
            $('#fullname_info').val(((typeof arrData[0].fullName !== 'undefined') ? arrData[0].fullName : ''));
            $('#title_info').val(((typeof arrData2[0].title !== 'undefined') ? arrData2[0].title : ''));
            $("#termination_code_employment").val(((typeof arrData2[0].terminationCode !== 'undefined') ? arrData2[0].terminationCode : ''));
            $("#no_dana_pensiun_employment").val(((typeof arrData2[0].danaPensiunNo !== 'undefined') ? arrData2[0].danaPensiunNo : ''));
            
            $.ajax({
                type: 'GET',
                url: "{{ url('/city/personal_data/api') }}",
                data: {
                    'birthPlace': ((typeof arrData2[0].birthPlace !== 'undefined') ? arrData2[0].birthPlace : '')
                }
            }).then(function (data) {
                var option = new Option(data.data_birth_place.cityCode, data.data_birth_place.cityCode, true, true);

                $('#birth_place_info').append(option).trigger('change');

                $('#birth_place_info').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_birth_place.cityCode,
                        text: data.data_birth_place.cityCode,
                        data: data.data_birth_place
                    }
                });
            });

            pickerBirthDate.setDate(((typeof arrData2[0].birthDate !== 'undefined') ? arrData2[0].birthDate : ''));
            // console.log(arrData2[0].absenteeismType);
            $.ajax({
                type: 'GET',
                url: "{{ url('/comgen/api') }}",
                data: {
                    'gender': ((typeof arrData2[0].gender !== 'undefined') ? arrData2[0].gender : ''),
                    'maritalStatus': ((typeof arrData2[0].maritalStatus !== 'undefined') ? arrData2[0].maritalStatus : ''),
                    'religionCode': ((typeof arrData2[0].religionCode !== 'undefined') ? arrData2[0].religionCode : ''),
                    'nationality': ((typeof arrData2[0].nationalityCode !== 'undefined') ? arrData2[0].nationalityCode : ''),
                    'employmentStatus': ((typeof arrData2[0].employmentStatus !== 'undefined') ? arrData2[0].employmentStatus : ''),
                    'employmentType': ((typeof arrData2[0].employmentType !== 'undefined') ? arrData2[0].employmentType : ''),
                    'terminationCode': ((typeof arrData2[0].terminationCode !== 'undefined') ? arrData2[0].terminationCode : ''),
                    'absenteeismType': ((typeof arrData2[0].absenteeismType !== 'undefined') ? arrData2[0].absenteeismType : ''),
                    'taxStatus': ((typeof arrData2[0].taxStatus !== 'undefined') ? arrData2[0].taxStatus : ''),
                    'taxStatusNextYear': ((typeof arrData2[0].taxStatusNextYear !== 'undefined') ? arrData2[0].taxStatusNextYear : ''),
                    'taxOffice': ((typeof arrData2[0].taxRegisteredPlaceRegistration !== 'undefined') ? arrData2[0].taxRegisteredPlaceRegistration : ''),
                    'taxCalculationMethod': ((typeof arrData2[0].taxCalculationMethod !== 'undefined') ? arrData2[0].taxCalculationMethod : ''),
                    'currencyCode1': ((typeof arrData2[0].currencyCode1 !== 'undefined') ? arrData2[0].currencyCode1 : ''),
                    'currencyCode2': ((typeof arrData2[0].currencyCode2 !== 'undefined') ? arrData2[0].currencyCode2 : ''),
                    'currencyCode3': ((typeof arrData2[0].currencyCode3 !== 'undefined') ? arrData2[0].currencyCode3 : ''),
                }
            }).then(function (data) {
                var option_gender = new Option(data.data_gender.comGenCode, data.data_gender.comGenCode, true, true);
                var option_marital_status = new Option(data.data_marital_status.comGenCode, data.data_marital_status.comGenCode, true, true);
                var option_religion = new Option(data.data_religion.comGenCode, data.data_religion.comGenCode, true, true);
                var option_nationality = new Option(data.data_nationality.comGenCode, data.data_nationality.comGenCode, true, true);
                var option_employment_status = new Option(data.data_employment_status.comGenCode, data.data_employment_status.comGenCode, true, true);
                var option_employment_type = new Option(data.data_employment_type.comGenCode, data.data_employment_type.comGenCode, true, true);
                // var option_termination_code = new Option(data.data_termination_code.comGenCode, data.data_termination_code.comGenCode, true, true);
                var option_absenteeism_type = new Option(data.data_absenteeism_type.comGenCode, data.data_absenteeism_type.comGenCode, true, true);
                var option_tax_status = new Option(data.data_tax_status.comGenCode, data.data_tax_status.comGenCode, true, true);
                var option_tax_status_next_year = new Option(data.data_tax_status_next_year.comGenCode, data.data_tax_status_next_year.comGenCode, true, true);
                var option_tax_office = new Option(data.data_tax_office.comGenCode, data.data_tax_office.comGenCode, true, true);
                var option_tax_calculation_method = new Option(data.data_tax_calculation_method.comGenCode, data.data_tax_calculation_method.comGenCode, true, true);
                var option_currency_code_1 = new Option(data.data_currency_code_1.comGenCode, data.data_currency_code_1.comGenCode, true, true);
                var option_currency_code_2 = new Option(data.data_currency_code_2.comGenCode, data.data_currency_code_2.comGenCode, true, true);
                var option_currency_code_3 = new Option(data.data_currency_code_3.comGenCode, data.data_currency_code_3.comGenCode, true, true);

                $('#gender_info').append(option_gender).trigger('change');

                $('#gender_info').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_gender.comGenCode,
                        text: data.data_gender.comGenCode,
                        data: data.data_gender
                    }
                });

                $('#marital_status_info').append(option_marital_status).trigger('change');

                $('#marital_status_info').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_marital_status.comGenCode,
                        text: data.data_marital_status.comGenCode,
                        data: data.data_marital_status
                    }
                });

                $('#religion_info').append(option_religion).trigger('change');

                $('#religion_info').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_religion.comGenCode,
                        text: data.data_religion.comGenCode,
                        data: data.data_religion
                    }
                });

                $('#nationality_info').append(option_nationality).trigger('change');

                $('#nationality_info').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_nationality.comGenCode,
                        text: data.data_nationality.comGenCode,
                        data: data.data_nationality
                    }
                });

                $('#employment_status_employment').append(option_employment_status).trigger('change');

                $('#employment_status_employment').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_employment_status.comGenCode,
                        text: data.data_employment_status.comGenCode,
                        data: data.data_employment_status
                    }
                });

                $('#employment_type_employment').append(option_employment_type).trigger('change');

                $('#employment_type_employment').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_employment_type.comGenCode,
                        text: data.data_employment_type.comGenCode,
                        data: data.data_employment_type
                    }
                });

                // $('#termination_code_employment').append(option_termination_code).trigger('change');

                // $('#termination_code_employment').trigger({
                //     type: 'select2:select',
                //     params: {
                //         id: data.data_termination_code.comGenCode,
                //         text: data.data_termination_code.comGenCode,
                //         data: data.data_termination_code
                //     }
                // });

                $('#absenteeism_type_absenteeism').append(option_absenteeism_type).trigger('change');

                $('#absenteeism_type_absenteeism').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_absenteeism_type.comGenCode,
                        text: data.data_absenteeism_type.comGenCode,
                        data: data.data_absenteeism_type
                    }
                });

                $('#tax_status_payroll').append(option_tax_status).trigger('change');

                $('#tax_status_payroll').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_tax_status.comGenCode,
                        text: data.data_tax_status.comGenCode,
                        data: data.data_tax_status
                    }
                });

                $('#tax_status_next_year_payroll').append(option_tax_status_next_year).trigger('change');

                $('#tax_status_next_year_payroll').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_tax_status_next_year.comGenCode,
                        text: data.data_tax_status_next_year.comGenCode,
                        data: data.data_tax_status_next_year
                    }
                });

                $('#tax_office_payroll').append(option_tax_office).trigger('change');

                $('#tax_office_payroll').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_tax_office.comGenCode,
                        text: data.data_tax_office.comGenCode,
                        data: data.data_tax_office
                    }
                });

                $('#tax_calculation_method_payroll').append(option_tax_calculation_method).trigger('change');

                $('#tax_calculation_method_payroll').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_tax_calculation_method.comGenCode,
                        text: data.data_tax_calculation_method.comGenCode,
                        data: data.data_tax_calculation_method
                    }
                });

                $('#currency_primary').append(option_currency_code_1).trigger('change');

                $('#currency_primary').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_currency_code_1.comGenCode,
                        text: data.data_currency_code_1.comGenCode,
                        data: data.data_currency_code_1
                    }
                });

                $('#currency_optional_one').append(option_currency_code_2).trigger('change');

                $('#currency_optional_one').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_currency_code_2.comGenCode,
                        text: data.data_currency_code_2.comGenCode,
                        data: data.data_currency_code_2
                    }
                });

                $('#currency_optional_two').append(option_currency_code_3).trigger('change');

                $('#currency_optional_two').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_currency_code_3.comGenCode,
                        text: data.data_currency_code_3.comGenCode,
                        data: data.data_currency_code_3
                    }
                });
            });

            $('#tax_registered_no_info').val(((typeof arrData2[0].taxRegisteredNo !== 'undefined') ? arrData2[0].taxRegisteredNo : ''));
            $('#tax_office_info').val(((typeof arrData2[0].taxRegisteredPlaceRegistration !== 'undefined') ? arrData2[0].taxRegisteredPlaceRegistration : ''));
            $('#driving_license_motorcycle_registration_place_info').val(null).trigger('change');
            $('#mother_name_info').val(((typeof arrData2[0].motherName !== 'undefined') ? arrData2[0].motherName : ''));
            pickerTaxRegisteredDateInfo.setDate(((typeof arrData2[0].taxRegisteredDate !== 'undefined') ? arrData2[0].taxRegisteredDate : ''));
            pickerTaxExpiryDateInfo.setDate(((typeof arrData2[0].taxRegisteredExpiryDate !== 'undefined') ? arrData2[0].taxRegisteredExpiryDate : ''));
            
            if (arrData2[0].peMasterInfo !== null) {
                //Tab Info
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/comgen/api') }}",
                    data: {
                        'bloodType': ((typeof arrData2[0].peMasterInfo.bloodType !== 'undefined') ? arrData2[0].peMasterInfo.bloodType : ''),
                        'drivingLicenseMobilType': ((typeof arrData2[0].peMasterInfo.drivingLicenseMobilType !== 'undefined') ? arrData2[0].peMasterInfo.drivingLicenseMobilType : ''),
                    }
                }).then(function (data) {
                    var option_blood_type = new Option(data.data_blood_type.comGenCode, data.data_blood_type.comGenCode, true, true);
                    var option_driving_license_car_type = new Option(data.data_driving_license_car_type.comGenCode, data.data_driving_license_car_type.comGenCode, true, true);

                    $('#blood_type_info').append(option_blood_type).trigger('change');

                    $('#blood_type_info').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_blood_type.comGenCode,
                            text: data.data_blood_type.comGenCode,
                            data: data.data_blood_type
                        }
                    });

                    $('#driving_license_car_type_info').append(option_driving_license_car_type).trigger('change');

                    $('#driving_license_car_type_info').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_driving_license_car_type.comGenCode,
                            text: data.data_driving_license_car_type.comGenCode,
                            data: data.data_driving_license_car_type
                        }
                    });
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/city/personal_data/api') }}",
                    data: {
                        'drivingLicenseMobilNoPlaceRegistration': ((typeof arrData2[0].peMasterInfo.drivingLicenseMobilNoPlaceRegistration !== 'undefined') ? arrData2[0].peMasterInfo.drivingLicenseMobilNoPlaceRegistration : ''),
                        'drivingLicenseMotorNoPlaceRegistration': ((typeof arrData2[0].peMasterInfo.drivingLicenseMotorNoPlaceRegistration !== 'undefined') ? arrData2[0].peMasterInfo.drivingLicenseMotorNoPlaceRegistration : ''),
                        'homeCityCode': ((typeof arrData2[0].peMasterInfo.homeCityCode !== 'undefined') ? arrData2[0].peMasterInfo.homeCityCode : ''),
                        'otherCityCode': ((typeof arrData2[0].peMasterInfo.otherCityCode !== 'undefined') ? arrData2[0].peMasterInfo.otherCityCode : ''),
                        'workCityCode': ((typeof arrData2[0].peMasterInfo.workCityCode !== 'undefined') ? arrData2[0].peMasterInfo.workCityCode : ''),
                        'correspondenceCityCode': ((typeof arrData2[0].peMasterInfo.correspondenceCityCode !== 'undefined') ? arrData2[0].peMasterInfo.correspondenceCityCode : ''),
                    }
                }).then(function (data) {
                    var option1 = new Option(data.data_driving_license_car_no_place_registration.cityCode, data.data_driving_license_car_no_place_registration.cityCode, true, true);
                    var option2 = new Option(data.data_driving_license_motorcycle_no_place_registration.cityCode, data.data_driving_license_motorcycle_no_place_registration.cityCode, true, true);
                    var option3 = new Option(data.data_home_city_code.cityCode, data.data_home_city_code.cityCode, true, true);
                    var option4 = new Option(data.data_other_city_code.cityCode, data.data_other_city_code.cityCode, true, true);
                    var option5 = new Option(data.data_work_city_code.cityCode, data.data_work_city_code.cityCode, true, true);
                    var option6 = new Option(data.data_correspondence_city_code.cityCode, data.data_correspondence_city_code.cityCode, true, true);

                    $('#driving_license_car_registration_place_info').append(option1).trigger('change');

                    $('#driving_license_car_registration_place_info').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_driving_license_car_no_place_registration.cityCode,
                            text: data.data_driving_license_car_no_place_registration.cityCode,
                            data: data.data_driving_license_car_no_place_registration
                        }
                    });

                    $('#driving_license_motorcycle_registration_place_info').append(option2).trigger('change');

                    $('#driving_license_motorcycle_registration_place_info').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_driving_license_motorcycle_no_place_registration.cityCode,
                            text: data.data_driving_license_motorcycle_no_place_registration.cityCode,
                            data: data.data_driving_license_motorcycle_no_place_registration
                        }
                    });

                    $('#city_select_home').append(option3).trigger('change');

                    $('#city_select_home').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_home_city_code.cityCode,
                            text: data.data_home_city_code.cityCode,
                            data: data.data_home_city_code
                        }
                    });

                    $('#city_select_other').append(option4).trigger('change');

                    $('#city_select_other').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_other_city_code.cityCode,
                            text: data.data_other_city_code.cityCode,
                            data: data.data_other_city_code
                        }
                    });

                    $('#city_select_work').append(option5).trigger('change');

                    $('#city_select_work').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_work_city_code.cityCode,
                            text: data.data_work_city_code.cityCode,
                            data: data.data_work_city_code
                        }
                    });

                    $('#city_select_correspondence').append(option6).trigger('change');

                    $('#city_select_correspondence').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_correspondence_city_code.cityCode,
                            text: data.data_correspondence_city_code.cityCode,
                            data: data.data_correspondence_city_code
                        }
                    });
                });

                // console.log(arrData2[0].peMasterInfo.homeZipCode);
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/zip_code/personal_data/api') }}",
                    data: {
                        'homeZipCode': ((typeof arrData2[0].peMasterInfo.homeZipCode !== 'undefined') ? arrData2[0].peMasterInfo.homeZipCode : ''),
                        'otherZipCode': ((typeof arrData2[0].peMasterInfo.otherZipCode !== 'undefined') ? arrData2[0].peMasterInfo.otherZipCode : ''),
                        'workZipCode': ((typeof arrData2[0].peMasterInfo.workZipCode !== 'undefined') ? arrData2[0].peMasterInfo.workZipCode : ''),
                        'correspondenceZipCode': ((typeof arrData2[0].peMasterInfo.correspondenceZipCode !== 'undefined') ? arrData2[0].peMasterInfo.correspondenceZipCode : ''),
                        'homeDistrictCode': ((typeof arrData2[0].peMasterInfo.homeDistrictCode !== 'undefined') ? arrData2[0].peMasterInfo.homeDistrictCode : ''),
                        'otherDistrictCode': ((typeof arrData2[0].peMasterInfo.otherDistrictCode !== 'undefined') ? arrData2[0].peMasterInfo.otherDistrictCode : ''),
                        'homeSubDistrictCode': ((typeof arrData2[0].peMasterInfo.homeSubDistrictCode !== 'undefined') ? arrData2[0].peMasterInfo.homeSubDistrictCode : ''),
                        'otherSubDistrictCode': ((typeof arrData2[0].peMasterInfo.otherSubDistrictCode !== 'undefined') ? arrData2[0].peMasterInfo.otherSubDistrictCode : ''),
                    }
                }).then(function (data) {
                    var option1 = new Option(data.data_home_zip_code.zipCode, data.data_home_zip_code.zipCode, true, true);
                    var option2 = new Option(data.data_other_zip_code.zipCode, data.data_other_zip_code.zipCode, true, true);
                    var option3 = new Option(data.data_work_zip_code.zipCode, data.data_work_zip_code.zipCode, true, true);
                    var option4 = new Option(data.data_correspondence_zip_code.zipCode, data.data_correspondence_zip_code.zipCode, true, true);
                    var option5 = new Option(data.data_home_district_code.propinsi, data.data_home_district_code.propinsi, true, true);
                    var option6 = new Option(data.data_other_district_code.propinsi, data.data_other_district_code.propinsi, true, true);
                    var option7 = new Option(data.data_home_subdistrict_code.kabupaten, data.data_home_subdistrict_code.kabupaten, true, true);
                    var option8 = new Option(data.data_other_district_code.kabupaten, data.data_other_district_code.kabupaten, true, true);

                    $('#zip_code_select_home').append(option1).trigger('change');

                    $('#zip_code_select_home').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_home_zip_code.zipCode,
                            text: data.data_home_zip_code.zipCode,
                            data: data.data_home_zip_code
                        }
                    });

                    $('#zip_code_select_other').append(option2).trigger('change');

                    $('#zip_code_select_other').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_other_zip_code.zipCode,
                            text: data.data_other_zip_code.zipCode,
                            data: data.data_other_zip_code
                        }
                    });

                    $('#zip_code_select_work').append(option3).trigger('change');

                    $('#zip_code_select_work').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_work_zip_code.zipCode,
                            text: data.data_work_zip_code.zipCode,
                            data: data.data_work_zip_code
                        }
                    });

                    $('#zip_code_select_correspondence').append(option4).trigger('change');

                    $('#zip_code_select_correspondence').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_correspondence_zip_code.zipCode,
                            text: data.data_correspondence_zip_code.zipCode,
                            data: data.data_correspondence_zip_code
                        }
                    });

                    $('#district_select_home').append(option5).trigger('change');

                    $('#district_select_home').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_home_district_code.propinsi,
                            text: data.data_home_district_code.propinsi,
                            data: data.data_home_district_code
                        }
                    });

                    $('#district_select_other').append(option6).trigger('change');

                    $('#district_select_other').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_other_district_code.propinsi,
                            text: data.data_other_district_code.propinsi,
                            data: data.data_other_district_code
                        }
                    });

                    $('#subdistrict_select_home').append(option7).trigger('change');

                    $('#subdistrict_select_home').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_home_subdistrict_code.kabupaten,
                            text: data.data_home_subdistrict_code.kabupaten,
                            data: data.data_home_subdistrict_code
                        }
                    });

                    $('#subdistrict_select_other').append(option8).trigger('change');

                    $('#subdistrict_select_other').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_other_district_code.kabupaten,
                            text: data.data_other_district_code.kabupaten,
                            data: data.data_other_district_code
                        }
                    });
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/office_location/func/api') }}",
                    data: {
                        'locationCode': ((typeof arrData2[0].locationCode !== 'undefined') ? arrData2[0].locationCode : ''),
                    }
                }).then(function (data) {
                    var option = new Option(data[0].locationName, data[0].locationCode, true, true);

                    $('#office_location_employment').append(option).trigger('change');

                    $('#office_location_employment').trigger({
                        type: 'select2:select',
                        params: {
                            id: data[0].locationCode,
                            text: data[0].locationName,
                            data: data[0]
                        }
                    });
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/position/detail/api') }}",
                    data: {
                        'positionCode': ((typeof arrData2[0].positionCode !== 'undefined') ? arrData2[0].positionCode : ''),
                    }
                }).then(function (data) {
                    var option = new Option(data[0].positionName, data[0].positionCode, true, true);

                    $('#position_code_employment').append(option).trigger('change');

                    $('#position_code_employment').trigger({
                        type: 'select2:select',
                        params: {
                            id: data[0].positionCode,
                            text: data[0].positionName,
                            data: data[0]
                        }
                    });
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/ranking/detail/api') }}",
                    data: {
                        'rankingCode': ((typeof arrData2[0].rankingCode !== 'undefined') ? arrData2[0].rankingCode : ''),
                    }
                }).then(function (data) {
                    var option = new Option(data[0].rankingName, data[0].rankingCode, true, true);

                    $('#ranking_code_employment').append(option).trigger('change');

                    $('#ranking_code_employment').trigger({
                        type: 'select2:select',
                        params: {
                            id: data[0].rankingCode,
                            text: data[0].rankingName,
                            data: data[0]
                        }
                    });
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/grade/detail/api') }}",
                    data: {
                        'gradeCode': ((typeof arrData2[0].gradeCode !== 'undefined') ? arrData2[0].gradeCode : ''),
                    }
                }).then(function (data) {
                    var option = new Option(data[0].gradeName, data[0].gradeCode, true, true);

                    $('#grade_code_employment').append(option).trigger('change');

                    $('#grade_code_employment').trigger({
                        type: 'select2:select',
                        params: {
                            id: data[0].gradeCode,
                            text: data[0].gradeName,
                            data: data[0]
                        }
                    });
                });

                // $.ajax({
                //     type: 'GET',
                //     url: "{{ url('/location/detail/api') }}",
                //     data: {
                //         'locationCode': ((typeof arrData2[0].locationCode !== 'undefined') ? arrData2[0].locationCode : ''),
                //     }
                // }).then(function (data) {
                    // var option = new Option(data[0].gradeName, data[0].locationCode, true, true);

                    // $('#location_code_employment').append(option).trigger('change');

                    // $('#location_code_employment').trigger({
                    //     type: 'select2:select',
                    //     params: {
                    //         id: data[0].locationCode,
                    //         text: data[0].locationName,
                    //         data: data[0]
                    //     }
                    // });
                // });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/cost_center/func/api') }}",
                    data: {
                        'costCenterCode': ((typeof arrData2[0].costCenterCode !== 'undefined') ? arrData2[0].costCenterCode : ''),
                    }
                }).then(function (data) {
                    var option = new Option(data[0].costCenterDescription, data[0].costCenterCode, true, true);

                    $('#cost_center_code_employment').append(option).trigger('change');

                    $('#cost_center_code_employment').trigger({
                        type: 'select2:select',
                        params: {
                            id: data[0].costCenterCode,
                            text: data[0].costCenterDescription,
                            data: data[0]
                        }
                    });
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/group/detail/api') }}",
                    data: {
                        'groupCode': ((typeof arrData2[0].groupCode !== 'undefined') ? arrData2[0].groupCode : ''),
                    }
                }).then(function (data) {
                    var option = new Option(data[0].groupName, data[0].groupCode, true, true);

                    $('#group_code_employment').append(option).trigger('change');

                    $('#group_code_employment').trigger({
                        type: 'select2:select',
                        params: {
                            id: data[0].groupCode,
                            text: data[0].groupName,
                            data: data[0]
                        }
                    });
                });
                
                $('#id_no_info').val(((typeof arrData2[0].peMasterInfo.idNo !== 'undefined') ? arrData2[0].peMasterInfo.idNo : ''));
                $('#passport_no_info').val(((typeof arrData2[0].peMasterInfo.passportNo !== 'undefined') ? arrData2[0].peMasterInfo.passportNo : ''));
                pickerPassportDate.setDate(((typeof arrData2[0].peMasterInfo.passportDate !== 'undefined') ? arrData2[0].peMasterInfo.passportDate : ''));
                $('#driving_license_car_no_info').val(((typeof arrData2[0].peMasterInfo.drivingLicenseMobilNo !== 'undefined') ? arrData2[0].peMasterInfo.drivingLicenseMobilNo : ''));
                pickerDrivingLicenseCarDate.setDate(((typeof arrData2[0].peMasterInfo.drivingLicenseMobilNoDate !== 'undefined') ? arrData2[0].peMasterInfo.drivingLicenseMobilNoDate : ''));
                pickerDrivingLicenseCarExpiryDate.setDate(((typeof arrData2[0].peMasterInfo.drivingLicenseMobilNoExpiryDate !== 'undefined') ? arrData2[0].peMasterInfo.drivingLicenseMobilNoExpiryDate : ''));
                $('#driving_license_motorcycle_no_info').val(((typeof arrData2[0].peMasterInfo.drivingLicenseMotorNo !== 'undefined') ? arrData2[0].peMasterInfo.drivingLicenseMotorNo : ''));
                pickerDrivingLicenseMotorcycleDate.setDate(((typeof arrData2[0].peMasterInfo.drivingLicenseMotorNoDate !== 'undefined') ? arrData2[0].peMasterInfo.drivingLicenseMotorNoDate : ''));
                pickerDrivingLicenseMotorcycleExpiryDate.setDate(((typeof arrData2[0].peMasterInfo.drivingLicenseMotorNoExpiryDate !== 'undefined') ? arrData2[0].peMasterInfo.drivingLicenseMotorNoExpiryDate : ''));

                //Tab Address
                $('#address_home').val(((typeof arrData2[0].peMasterInfo.homeAddress !== 'undefined') ? arrData2[0].peMasterInfo.homeAddress : ''));
                $('#phone_number_home').val(((typeof arrData2[0].peMasterInfo.homePhone !== 'undefined') ? arrData2[0].peMasterInfo.homePhone : ''));
                $('#address_other').val(((typeof arrData2[0].peMasterInfo.otherAddress !== 'undefined') ? arrData2[0].peMasterInfo.otherAddress : ''));
                $('#phone_number_other').val(((typeof arrData2[0].peMasterInfo.otherPhone !== 'undefined') ? arrData2[0].peMasterInfo.otherPhone : ''));
                $('#address_work').val(((typeof arrData2[0].peMasterInfo.workAddress !== 'undefined') ? arrData2[0].peMasterInfo.workAddress : ''));
                $('#phone_number_work').val(((typeof arrData2[0].peMasterInfo.workPhone !== 'undefined') ? arrData2[0].peMasterInfo.workPhone : ''));
                $('#address_correspondence').val(((typeof arrData2[0].peMasterInfo.correspondenceAddress !== 'undefined') ? arrData2[0].peMasterInfo.correspondenceAddress : ''));
                $('#phone_number_correspondence').val(((typeof arrData2[0].peMasterInfo.correspondencePhone !== 'undefined') ? arrData2[0].peMasterInfo.correspondencePhone : ''));
                $('#name_emergency').val(((typeof arrData2[0].peMasterInfo.emergencyName !== 'undefined') ? arrData2[0].peMasterInfo.emergencyName : ''));
                $('#address_emergency').val(((typeof arrData2[0].peMasterInfo.emergencyAddress !== 'undefined') ? arrData2[0].peMasterInfo.emergencyAddress : ''));
                $('#phone_number_emergency').val(((typeof arrData2[0].peMasterInfo.emergencyPhone !== 'undefined') ? arrData2[0].peMasterInfo.emergencyPhone : ''));
                $('#relation_emergency').val(((typeof arrData2[0].peMasterInfo.emergencyRelation !== 'undefined') ? arrData2[0].peMasterInfo.emergencyRelation : ''));
                $('#email_emergency').val(((typeof arrData2[0].peMasterInfo.emergencyEmailAddress !== 'undefined') ? arrData2[0].peMasterInfo.emergencyEmailAddress : ''));
                $('#handphone_no_other').val(((typeof arrData2[0].peMasterInfo.personalHandphone !== 'undefined') ? arrData2[0].peMasterInfo.personalHandphone : ''));
                $('#personal_email_other').val(((typeof arrData2[0].peMasterInfo.personalEmailAddress !== 'undefined') ? arrData2[0].peMasterInfo.personalEmailAddress : ''));
                $('#company_email_other').val(((typeof arrData2[0].peMasterInfo.companyEmailAddress !== 'undefined') ? arrData2[0].peMasterInfo.companyEmailAddress : ''));
                $('#company_card_id_other').val(((typeof arrData2[0].peMasterInfo.employeeCardId !== 'undefined') ? arrData2[0].peMasterInfo.employeeCardId : ''));
            }
            
            //Tab Address
            $('#city_text_home').val("");
            $('#zip_code_text_home').val("");
            $('#district_select_home').val(null).trigger('change');
            $('#subdistrict_select_home').val(null).trigger('change');

            $('#city_text_other').val("");
            $('#zip_code_text_other').val("");
            $('#district_select_other').val(null).trigger('change');
            $('#subdistrict_select_other').val(null).trigger('change');

            $('#city_text_work').val("");
            $('#zip_code_text_work').val("");

            $('#city_text_correspondence').val("");
            $('#zip_code_text_correspondence').val("");

            //Tab Employment
            // console.log(arrData2[0].originjoinDate);
            pickerOriginJoinDate.setDate(((typeof arrData2[0].originJoinDate !== 'undefined' && arrData2[0].originJoinDate !== null) ? arrData2[0].originJoinDate : ''));
            // $('#origin_join_date_employment').prop('disabled', true);
            pickerJoinDate.setDate(((typeof arrData2[0].joinDate !== 'undefined' && arrData2[0].joinDate !== null) ? arrData2[0].joinDate : ''));
            pickerProbationEndDate.setDate(((typeof arrData2[0].probationEndDate !== 'undefined' && arrData2[0].probationEndDate !== null) ? arrData2[0].probationEndDate : ''));
            pickerContractStartDate.setDate(((typeof arrData2[0].contractStartDate !== 'undefined' && arrData2[0].contractStartDate !== null) ? arrData2[0].contractStartDate : ''));
            pickerContractEndDate.setDate(((typeof arrData2[0].contractEndDate !== 'undefined' && arrData2[0].contractEndDate !== null) ? arrData2[0].contractEndDate : ''));
            pickerEffectivePermanentDate.setDate(((typeof arrData2[0].effectivePermanentDate !== 'undefined' && arrData2[0].effectivePermanentDate !== null) ? arrData2[0].effectivePermanentDate : ''));
            pickerJoinDateDanaPensiun.setDate(((typeof arrData2[0].danaPensiunJoinDate !== 'undefined' && arrData2[0].danaPensiunJoinDate !== null) ? arrData2[0].danaPensiunJoinDate : ''));
            // pickerTerminationDate.setDate(((typeof arrData2[0].terminationDate !== 'undefined') ? arrData2[0].terminationDate : ''));
            // pickerEffectiveTerminated.setDate(((typeof arrData2[0].effectiveTerminationDate !== 'undefined') ? arrData2[0].effectiveTerminationDate : ''));
            $('#termination_date_employment').val(((typeof arrData2[0].terminationDate !== 'undefined' && arrData2[0].terminationDate !== null) ? moment(arrData2[0].terminationDate).format('YYYY-MM-DD') : ''));
            $('#effective_terminated_employment').val(((typeof arrData2[0].effectiveTerminationDate !== 'undefined' && arrData2[0].effectiveTerminationDate !== null) ? moment(arrData2[0].effectiveTerminationDate).format('YYYY-MM-DD') : ''));
            if (arrData2[0].specialResign == true) {
                $('#special_reason_resign_employment').prop('checked', true);
            }
            else {
                $('#special_reason_resign_employment').prop('checked', false);
            }
            $('#termination_remarks_employment').val(((typeof arrData2[0].terminationRemarks !== 'undefined') ? arrData2[0].terminationRemarks : ''));
            if (arrData2[0].flagIsExpat == true) {
                $('#expatriat_employment').prop('checked', true);
            }
            else {
                $('#expatriat_employment').prop('checked', false);
            }
            $('#license_no_employment').val(((typeof arrData2[0].expatLicenseNo !== 'undefined') ? arrData2[0].expatLicenseNo : ''));
            pickerExpatriatStartDate.setDate(((typeof arrData2[0].expatLicenseStartDate !== 'undefined' && arrData2[0].expatLicenseStartDate !== null) ? arrData2[0].expatLicenseStartDate : ''));
            pickerExpatriatEndDate.setDate(((typeof arrData2[0].expatLicenseEndDate !== 'undefined' && arrData2[0].expatLicenseEndDate !== null) ? arrData2[0].expatLicenseEndDate : ''));
            if (arrData2[0].flagIsCommissioner == true) {
                $('#commisioner_employment').prop('checked', true);
            }
            else {
                $('#commisioner_employment').prop('checked', false);
            }

            load_table_fringe_benefit();
            if (arrData2[0].peMasterFringeBenefit !== 'undefined' || arrData2[0].peMasterFringeBenefit !== null) {
                for (var i = 0; i < arrData2[0].peMasterFringeBenefit.length; i++) {

                    if (arrData2[0].peMasterFringeBenefit[i].startDate !== 'undefined' && arrData2[0].peMasterFringeBenefit[i].startDate !== null) {
                        var startDate = moment(arrData2[0].peMasterFringeBenefit[i].startDate).format('YYYY-MM-DD');
                    }
                    else {
                        var startDate = '';
                    }

                    if (arrData2[0].peMasterFringeBenefit[i].endDate !== 'undefined' && arrData2[0].peMasterFringeBenefit[i].endDate !== null) {
                        var endDate = moment(arrData2[0].peMasterFringeBenefit[i].endDate).format('YYYY-MM-DD');
                    }
                    else {
                        var endDate = '';
                    }

                    arrayFringeBenefit.push({
                        "seqNoFringeBenefit": ((typeof arrData2[0].peMasterFringeBenefit[i].seqNo !== 'undefined') ? arrData2[0].peMasterFringeBenefit[i].seqNo : i),
                        "benefits": ((typeof arrData2[0].peMasterFringeBenefit[i].benefits !== 'undefined') ? arrData2[0].peMasterFringeBenefit[i].benefits : ''),
                        "description": ((typeof arrData2[0].peMasterFringeBenefit[i].description !== 'undefined') ? arrData2[0].peMasterFringeBenefit[i].description : ''),
                        "startDate": startDate,
                        "endDate": endDate
                    });
                }
            }
            $('#fringe_benefit_data_table').DataTable().destroy();
            load_table_fringe_benefit();

            //Tab Absenteeism & Payroll
            $.ajax({
                type: 'GET',
                url: "{{ url('/work_pattern/personal_data/api') }}",
                data: {
                    'workPatternCode': ((typeof arrData2[0].workPatternCode !== 'undefined') ? arrData2[0].workPatternCode : '')
                }
            }).then(function (data) {
                var option = new Option(data.patternCode, data.patternCode, true, true);

                $('#work_pattern_code_absenteeism').append(option).trigger('change');

                $('#work_pattern_code_absenteeism').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.patternCode,
                        text: data.patternCode,
                        data: data
                    }
                });
            });

            $('#starting_day_absenteeism').val(((typeof arrData2[0].startAtDay !== 'undefined') ? arrData2[0].startAtDay : ''));
            if (arrData2[0].flagNotAbsent == true) {
                $('#absent_not_required_absenteeism').prop('checked', true);
            }
            else {
                $('#absent_not_required_absenteeism').prop('checked', false);
            }
            if (arrData2[0].flagNotFinger == true) {
                $('#finger_not_required_absenteeism').prop('checked', true);
            }
            else {
                $('#finger_not_required_absenteeism').prop('checked', false);
            }

            // $('#tax_registered_no_payroll').val(((typeof arrData2[0].taxRegisteredNo !== 'undefined') ? arrData2[0].taxRegisteredNo : ''));
            // pickerTaxRegisteredDatePayroll.setDate(((typeof arrData2[0].taxRegisteredDate !== 'undefined') ? arrData2[0].taxRegisteredDate : ''));
            // pickerTaxExpiryDatePayroll.setDate(((typeof arrData2[0].taxRegisteredExpiryDate !== 'undefined') ? arrData2[0].taxRegisteredExpiryDate : ''));

            $.ajax({
                type: 'GET',
                url: "{{ url('/npwp/personal_data/api') }}",
                data: {
                    'npwpCode': ((typeof arrData2[0].groupNpwp !== 'undefined') ? arrData2[0].groupNpwp : '')
                }
            }).then(function (data) {
                var option = new Option(data.npwpCode, data.npwpCode, true, true);

                $('#group_npwp_payroll').append(option).trigger('change');

                $('#group_npwp_payroll').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.npwpCode,
                        text: data.npwpCode,
                        data: data
                    }
                });
            });

            $.ajax({
                type: 'GET',
                url: "{{ url('/bpjs/personal_data/api') }}",
                data: {
                    'bpjsCode': ((typeof arrData2[0].groupBpjs !== 'undefined') ? arrData2[0].groupBpjs : ''),
                }
            }).then(function (data) {
                var option = new Option(data.bpjsCode, data.bpjsCode, true, true);

                $('#group_bpjs_payroll').append(option).trigger('change');

                $('#group_bpjs_payroll').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.bpjsCode,
                        text: data.bpjsCode,
                        data: data
                    }
                });
            });

            if (arrData2[0].flagExcludePayroll == true) {
                $('#exclude_payroll_process_payroll').prop('checked', true);
            }
            else {
                $('#exclude_payroll_process_payroll').prop('checked', false);
            }
            
            $.ajax({
                type: 'GET',
                url: "{{ url('/group_authorize/personal_data/api') }}",
                data: {
                    'groupAuthorizeCode': ((typeof arrData2[0].groupAuthorizeCode !== 'undefined') ? arrData2[0].groupAuthorizeCode : ''),
                }
            }).then(function (data) {
                var option = new Option(data.groupAuthorizeDesc, data.groupAuthorizeCode, true, true);

                $('#group_authorize_payroll').append(option).trigger('change');

                $('#group_authorize_payroll').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.groupAuthorizeCode,
                        text: data.groupAuthorizeDesc,
                        data: data
                    }
                });
            });

            $('#bpjs_number_tenaga_kerja').val(((typeof arrData2[0].bpjsTenagaKerjaNo !== 'undefined') ? arrData2[0].bpjsTenagaKerjaNo : ''));
            if (arrData2[0].flagBPJSTenagaKerja == true) {
                $('#join_tenaga_kerja').prop('checked', true);
            }
            else {
                $('#join_tenaga_kerja').prop('checked', false);
            }
            pickerJoiningDateBPJSTenagaKerja.setDate(((typeof arrData2[0].bpjsTenagaKerjaJoinDate !== 'undefined') ? arrData2[0].bpjsTenagaKerjaJoinDate : ''));
            pickerPaymentPeriodStartDateBPJSTenagaKerja.setDate(((typeof arrData2[0].bpjsTenagaKerjaPeriodStartDate !== 'undefined') ? arrData2[0].bpjsTenagaKerjaPeriodStartDate : ''));
            if (arrData2[0].flagAstekDeathNonAccident == true) {
                $('#non_accidental_death_insurance_tenaga_kerja').prop('checked', true);
            }
            else {
                $('#non_accidental_death_insurance_tenaga_kerja').prop('checked', false);
            }
            if (arrData2[0].flagAstekPensionEmployer == true) {
                $('#pension_by_employer_tenaga_kerja').prop('checked', true);
            }
            else {
                $('#pension_by_employer_tenaga_kerja').prop('checked', false);
            }
            if (arrData2[0].flagAstekWorkAccident == true) {
                $('#work_related_accident_insurance_tenaga_kerja').prop('checked', true);
            }
            else {
                $('#work_related_accident_insurance_tenaga_kerja').prop('checked', false);
            }
            if (arrData2[0].flagAstekPensionEmployee == true) {
                $('#pension_by_employee_tenaga_kerja').prop('checked', true);
            }
            else {
                $('#pension_by_employee_tenaga_kerja').prop('checked', false);
            }
            if (arrData2[0].flagAstekWorkAccident2 == true) {
                $('#work_related_accident_insurance_two_tenaga_kerja').prop('checked', true);
            }
            else {
                $('#work_related_accident_insurance_two_tenaga_kerja').prop('checked', false);
            }
            if (arrData2[0].flagPensionInsurance == true) {
                $('#pension_insurance_tenaga_kerja').prop('checked', true);
            }
            else {
                $('#pension_insurance_tenaga_kerja').prop('checked', false);
            }
            if (arrData2[0].flagAstekWorkAccident3 == true) {
                $('#work_related_accident_insurance_three_tenaga_kerja').prop('checked', true);
            }
            else {
                $('#work_related_accident_insurance_three_tenaga_kerja').prop('checked', false);
            }

            $('#bpjs_number_kesehatan').val(((typeof arrData2[0].bpjsKesehatanNo !== 'undefined') ? arrData2[0].bpjsKesehatanNo : ''));
            if (arrData2[0].flagBPJSKesehatan == true) {
                $('#join_kesehatan').prop('checked', true);
            }
            else {
                $('#join_kesehatan').prop('checked', false);
            }
            pickerJoiningDateBPJSKesehatan.setDate(((typeof arrData2[0].bpjsKesehatanJoinDate !== 'undefined') ? arrData2[0].bpjsKesehatanJoinDate : ''));
            pickerPaymentPeriodStartDateBPJSKesehatan.setDate(((typeof arrData2[0].bpjsKesehatanPeriodStartDate !== 'undefined') ? arrData2[0].bpjsKesehatanPeriodStartDate : ''));

            // console.log(arrData2[0].companyBankCode1);
            $.ajax({
                type: 'GET',
                url: "{{ url('/company_bank_code/personal_data/api') }}",
                data: {
                    'companyBankCode1': ((typeof arrData2[0].companyBankCode1 !== 'undefined') ? arrData2[0].companyBankCode1 : ''),
                    'companyBankCode2': ((typeof arrData2[0].companyBankCode2 !== 'undefined') ? arrData2[0].companyBankCode2 : ''),
                    'companyBankCode3': ((typeof arrData2[0].companyBankCode3 !== 'undefined') ? arrData2[0].companyBankCode3 : ''),
                }
            }).then(function (data) {
                var option1 = new Option(data.data_company_bank_code_one.bankCode, data.data_company_bank_code_one.bankCode, true, true);
                var option2 = new Option(data.data_company_bank_code_two.bankCode, data.data_company_bank_code_two.bankCode, true, true);
                var option3 = new Option(data.data_company_bank_code_three.bankCode, data.data_company_bank_code_three.bankCode, true, true);

                $('#company_bank_code_primary').append(option1).trigger('change');

                $('#company_bank_code_primary').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_company_bank_code_one.bankCode,
                        text: data.data_company_bank_code_one.bankCode,
                        data: data.data_company_bank_code_one
                    }
                });

                $('#company_bank_code_optional_one').append(option2).trigger('change');

                $('#company_bank_code_optional_one').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_company_bank_code_two.bankCode,
                        text: data.data_company_bank_code_two.bankCode,
                        data: data.data_company_bank_code_two
                    }
                });

                $('#company_bank_code_optional_two').append(option3).trigger('change');

                $('#company_bank_code_optional_two').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_company_bank_code_three.bankCode,
                        text: data.data_company_bank_code_three.bankCode,
                        data: data.data_company_bank_code_three
                    }
                });
            });

            $.ajax({
                type: 'GET',
                url: "{{ url('/employee_bank_code/personal_data/api') }}",
                data: {
                    'employeeBankCode1': ((typeof arrData2[0].employeeBankCode1 !== 'undefined') ? arrData2[0].employeeBankCode1 : ''),
                    'employeeBankCode2': ((typeof arrData2[0].employeeBankCode2 !== 'undefined') ? arrData2[0].employeeBankCode2 : ''),
                    'employeeBankCode3': ((typeof arrData2[0].employeeBankCode3 !== 'undefined') ? arrData2[0].employeeBankCode3 : ''),
                }
            }).then(function (data) {
                var option1 = new Option(data.data_employee_bank_code_one.bankCode, data.data_employee_bank_code_one.bankCode, true, true);
                var option2 = new Option(data.data_employee_bank_code_two.bankCode, data.data_employee_bank_code_two.bankCode, true, true);
                var option3 = new Option(data.data_employee_bank_code_three.bankCode, data.data_employee_bank_code_three.bankCode, true, true);

                $('#employee_bank_code_primary').append(option1).trigger('change');

                $('#employee_bank_code_primary').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_employee_bank_code_one.bankCode,
                        text: data.data_employee_bank_code_one.bankCode,
                        data: data.data_employee_bank_code_one
                    }
                });

                $('#employee_bank_code_optional_one').append(option2).trigger('change');

                $('#employee_bank_code_optional_one').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_employee_bank_code_two.bankCode,
                        text: data.data_employee_bank_code_two.bankCode,
                        data: data.data_employee_bank_code_two
                    }
                });

                $('#employee_bank_code_optional_two').append(option3).trigger('change');

                $('#employee_bank_code_optional_two').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_employee_bank_code_three.bankCode,
                        text: data.data_employee_bank_code_three.bankCode,
                        data: data.data_employee_bank_code_three
                    }
                });
            });

            $('#account_number_primary').val(((typeof arrData2[0].bankAccountNo1 !== 'undefined') ? arrData2[0].bankAccountNo1 : ''));
            $('#beneficiary_name_primary').val(((typeof arrData2[0].beneficiaryName1 !== 'undefined') ? arrData2[0].beneficiaryName1 : ''));
            $('#percentage_primary').val(((typeof arrData2[0].bankPercentageSalary1 !== 'undefined') ? arrData2[0].bankPercentageSalary1 : ''));

            $('#account_number_optional_one').val(((typeof arrData2[0].bankAccountNo2 !== 'undefined') ? arrData2[0].bankAccountNo2 : ''));
            $('#beneficiary_name_optional_one').val(((typeof arrData2[0].beneficiaryName2 !== 'undefined') ? arrData2[0].beneficiaryName2 : ''));
            $('#percentage_optional_one').val(((typeof arrData2[0].bankPercentageSalary2 !== 'undefined') ? arrData2[0].bankPercentageSalary2 : ''));

            $('#account_number_optional_two').val(((typeof arrData2[0].bankAccountNo3 !== 'undefined') ? arrData2[0].bankAccountNo3 : ''));
            $('#beneficiary_name_optional_two').val(((typeof arrData2[0].beneficiaryName3 !== 'undefined') ? arrData2[0].beneficiaryName3 : ''));
            $('#percentage_optional_two').val(((typeof arrData2[0].bankPercentageSalary3 !== 'undefined') ? arrData2[0].bankPercentageSalary3 : ''));

            //Tab Family & Dependent
            load_table_family_dependent_data();
            if (typeof arrData2[0].peMasterFamily !== 'undefined' || arrData2[0].peMasterFamily !== null) {
                for (var i = 0; i < arrData2[0].peMasterFamily.length; i++) {
                    var birthDate = '-';
                    if (typeof arrData2[0].peMasterFamily[i].birthDate !== 'undefined' && arrData2[0].peMasterFamily[i].birthDate !== null)
                    {
                        birthDate = moment(arrData2[0].peMasterFamily[i].birthDate).format('YYYY-MM-DD');
                    }

                    arrayFamilyDependent.push({
                        "seqNoFamilyDependent": ((typeof arrData2[0].peMasterFamily[i].seqNo !== 'undefined' && arrData2[0].peMasterFamily[i].seqNo !== null) ? arrData2[0].peMasterFamily[i].seqNo : i),
                        "familyName": ((typeof arrData2[0].peMasterFamily[i].familyName !== 'undefined' && arrData2[0].peMasterFamily[i].familyName !== null) ? arrData2[0].peMasterFamily[i].familyName : '-'),
                        "relationCode": ((typeof arrData2[0].peMasterFamily[i].relationCode !== 'undefined' && arrData2[0].peMasterFamily[i].relationCode !== null) ? arrData2[0].peMasterFamily[i].relationCode : '-'),
                        "birthDate": birthDate,
                        "birthPlace": ((typeof arrData2[0].peMasterFamily[i].birthPlace !== 'undefined' && arrData2[0].peMasterFamily[i].birthPlace !== null) ? arrData2[0].peMasterFamily[i].birthPlace : '-'),
                        "gender": ((typeof arrData2[0].peMasterFamily[i].gender !== 'undefined' && arrData2[0].peMasterFamily[i].gender !== null) ? arrData2[0].peMasterFamily[i].gender : '-'),
                        "bloodType": ((typeof arrData2[0].peMasterFamily[i].bloodType !== 'undefined' && arrData2[0].peMasterFamily[i].bloodType !== null) ? arrData2[0].peMasterFamily[i].bloodType : '-'),
                        "familyCardNumber": ((typeof arrData2[0].peMasterFamily[i].familyCardNumber !== 'undefined' && arrData2[0].peMasterFamily[i].familyCardNumber !== null) ? arrData2[0].peMasterFamily[i].familyCardNumber : '-'),
                        "occupation": ((typeof arrData2[0].peMasterFamily[i].occupation !== 'undefined' && arrData2[0].peMasterFamily[i].occupation !== null) ? arrData2[0].peMasterFamily[i].occupation : '-'),
                        "flagMedical": ((typeof arrData2[0].peMasterFamily[i].flagMedical !== 'undefined' && arrData2[0].peMasterFamily[i].flagMedical !== null) ? arrData2[0].peMasterFamily[i].flagMedical : false),
                        "flagPayroll": ((typeof arrData2[0].peMasterFamily[i].flagPayroll !== 'undefined' && arrData2[0].peMasterFamily[i].flagPayroll !== null) ? arrData2[0].peMasterFamily[i].flagPayroll : false)
                    });
                }
            }

            if (typeof arrData[0].level !== 'undefined' && arrData[0].level !== null) {
                $.each(arrData[0].level, function (k, v) {
                    $('#div-level').append(
                        '<div class="col-6">' +
                        '<div class="form-group">' +
                        '<label for="level' + k + '">' + k + '</label> <span class="required">*</span>' +
                        '<input type="text" class="form-control" id="level' + k + '" name="level' +
                        k + '[]" value="' + v + '" disabled>' +
                        '</div></div>'
                    );
                });
            }

            // $.ajax({
            //     url: "{{ url('personnel/report/level/check') }}",
            //     type: "GET",
            //     success: function (response) {
            //         $('#level_format').val(response.data[0].levelFormat);
            //         for (var i = 1; i <= response.data[0].levelFormat; i++) {
            //             $('#div-level').append(
            //                 '<div class="col-6">' +
            //                 '<div class="form-group">' +
            //                 '<label for="level' + i + '">' + response.data_level[i - 1]
            //                 .levelDescription + '</label>' +
            //                 '<select class="form-control select2" id="level' + i + '" name="level' +
            //                 i + '[]" multiple="multiple"></select>' +
            //                 '</div></div>'
            //             );

            //             loadDataLevelCode('#level' + i, i);
            //             loadDataFirstLastAllLevel('#level' + i, i);
            //         }
            //     },
            //     error: function (response) {
            //         $('#notification_error').modal('show');
            //         $('#message-notification-error').html(response);
            //     }
            // });

            $('#family_dependent_data_table').DataTable().destroy();
            load_table_family_dependent_data();

            //Tab Insurance
            if (arrData2[0].peMasterInsurance !== null) {
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/comgen/api') }}",
                    data: {
                        'insuranceCode': ((typeof arrData2[0].peMasterInsurance.insuranceCode !== 'undefined') ? arrData2[0].peMasterInsurance.insuranceCode : ''),
                        'insuranceClassCode': ((typeof arrData2[0].peMasterInsurance.insuranceClassCode !== 'undefined') ? arrData2[0].peMasterInsurance.insuranceClassCode : ''),
                    }
                }).then(function (data) {
                    var option1 = new Option(data.data_insurance_code.comGenCode, data.data_insurance_code.comGenCode, true, true);
                    var option2 = new Option(data.data_insurance_class.comGenCode, data.data_insurance_class.comGenCode, true, true);

                    $('#insurance_code_insurance').append(option1).trigger('change');

                    $('#insurance_code_insurance').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_insurance_code.comGenCode,
                            text: data.data_insurance_code.comGenCode,
                            data: data.data_insurance_code
                        }
                    });

                    $('#insurance_class_insurance').append(option2).trigger('change');

                    $('#insurance_class_insurance').trigger({
                        type: 'select2:select',
                        params: {
                            id: data.data_insurance_class.comGenCode,
                            text: data.data_insurance_class.comGenCode,
                            data: data.data_insurance_class.comGenCode
                        }
                    });
                });

                pickerInsuranceDate.setDate(((typeof arrData2[0].peMasterInsurance.insuranceStartDate !== 'undefined') ? arrData2[0].peMasterInsurance.insuranceStartDate : ''));
                $('#insurance_policy_no_insurance').val(((typeof arrData2[0].peMasterInsurance.insurancePolicyNo !== 'undefined') ? arrData2[0].peMasterInsurance.insurancePolicyNo : ''));
                $('#remarks_insurance').val(((typeof arrData2[0].peMasterInsurance.insuranceRemark !== 'undefined') ? arrData2[0].peMasterInsurance.insuranceRemark : ''));
            }
        }

        $('#join_tenaga_kerja').on('change', function () {
            if ($('#join_tenaga_kerja').is(':checked')) {
                $('#bpjs_number_tenaga_kerja').prop('disabled', false);
                pickerJoiningDateBPJSTenagaKerja._input.removeAttribute('disabled');
                pickerPaymentPeriodStartDateBPJSTenagaKerja._input.removeAttribute('disabled');
                $('#non_accidental_death_insurance_tenaga_kerja').prop('disabled', false);
                $('#pension_by_employer_tenaga_kerja').prop('disabled', false);
                $('#work_related_accident_insurance_tenaga_kerja').prop('disabled', false);
                $('#pension_by_employee_tenaga_kerja').prop('disabled', false);
                $('#work_related_accident_insurance_two_tenaga_kerja').prop('disabled', false);
                $('#pension_insurance_tenaga_kerja').prop('disabled', false);
                $('#work_related_accident_insurance_three_tenaga_kerja').prop('disabled', false);
            } else {
                $('#bpjs_number_tenaga_kerja').prop('disabled', true);
                pickerJoiningDateBPJSTenagaKerja._input.setAttribute("disabled", "disabled");
                pickerPaymentPeriodStartDateBPJSTenagaKerja._input.setAttribute("disabled", "disabled");
                $('#non_accidental_death_insurance_tenaga_kerja').prop('disabled', true);
                $('#pension_by_employer_tenaga_kerja').prop('disabled', true);
                $('#work_related_accident_insurance_tenaga_kerja').prop('disabled', true);
                $('#pension_by_employee_tenaga_kerja').prop('disabled', true);
                $('#work_related_accident_insurance_two_tenaga_kerja').prop('disabled', true);
                $('#pension_insurance_tenaga_kerja').prop('disabled', true);
                $('#work_related_accident_insurance_three_tenaga_kerja').prop('disabled', true);
            }
        });

        $('#join_kesehatan').on('change', function () {
            if ($('#join_kesehatan').is(':checked')) {
                $('#bpjs_number_kesehatan').prop('disabled', false);
                pickerJoiningDateBPJSKesehatan._input.removeAttribute('disabled');
                pickerPaymentPeriodStartDateBPJSKesehatan._input.removeAttribute('disabled');
            } else {
                $('#bpjs_number_kesehatan').prop('disabled', true);
                pickerJoiningDateBPJSKesehatan._input.setAttribute("disabled", "disabled");
                pickerPaymentPeriodStartDateBPJSKesehatan._input.setAttribute("disabled", "disabled");
            }
        });

        $('#expatriat_employment').on('change', function () {
            if ($('#expatriat_employment').is(':checked')) {
                $('#license_no_employment').prop('disabled', false);
                pickerExpatriatStartDate._input.removeAttribute('disabled');
                pickerExpatriatEndDate._input.removeAttribute('disabled');
            } else {
                $('#license_no_employment').prop('disabled', true);
                pickerExpatriatStartDate._input.setAttribute("disabled", "disabled");
                pickerExpatriatEndDate._input.setAttribute("disabled", "disabled");
            }
        });

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }
// ini

        $('#fringe_benefit_data_table thead tr').clone(true).appendTo('#fringe_benefit_data_table thead');
        $('#fringe_benefit_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#family_dependent_data_table thead tr').clone(true).appendTo('#family_dependent_data_table thead');
        $('#family_dependent_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = e.target;

            if (target.id == "personal3-tab") {
                $('#fringe_benefit_data_table').DataTable().destroy();
                load_table_fringe_benefit();
            } else if (target.id == "dependent-tab") {
                $('#family_dependent_data_table').DataTable().destroy();
                load_table_family_dependent_data();
            }
        });

        $('#photo_profile').change(function (e) {
            var fileExtension = ['jpeg', 'jpg', 'png'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Only formats are allowed : " + fileExtension.join(', '));
            } else {
                for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
                    var file = e.originalEvent.srcElement.files[i];
                    // console.log(file);
                    var img = $('#photo');
                    var reader = new FileReader();
                    reader.onloadend = function() {
                        img.attr('src', reader.result);
                        // console.log(reader.result);
                    }
                    reader.readAsDataURL(file);
                    // $("#photo_profile").after(img);
                }
            }
            // $('#photo_profile').val(file);
        });

        // console.log($('#photo').val());

        $('#city_select_home').on('select2:select', function (e) {
            var data = $('#city_select_home').select2('data');
            $('#city_text_home').val(htmlDecode(data[0].text));
            $.ajax({
                url: "{{ url('personnel/city_name/detail') }}",
                type: "GET",
                data: {
                    'cityCode': data[0].id
                },
            })
        });

        $('#city_select_other').on('select2:select', function (e) {
            var data = $('#city_select_other').select2('data');
            $('#city_text_other').val(htmlDecode(data[0].text));
            $.ajax({
                url: "{{ url('personnel/city_name/detail') }}",
                type: "GET",
                data: {
                    'cityCode': data[0].id
                },
            })
        });

        $('#city_select_work').on('select2:select', function (e) {
            var data = $('#city_select_work').select2('data');
            $('#city_text_work').val(htmlDecode(data[0].text));
            $.ajax({
                url: "{{ url('personnel/city_name/detail') }}",
                type: "GET",
                data: {
                    'cityCode': data[0].id
                },
            })
        });

        $('#city_select_correspondence').on('select2:select', function (e) {
            var data = $('#city_select_correspondence').select2('data');
            $('#city_text_correspondence').val(htmlDecode(data[0].text));
            $.ajax({
                url: "{{ url('personnel/city_name/detail') }}",
                type: "GET",
                data: {
                    'cityCode': data[0].id
                },
            })
        });

        $('#zip_code_select_home').on('select2:select', function (e) {
            var data = $('#zip_code_select_home').select2('data');
            $('#zip_code_text_home').val(htmlDecode(data[0].text));
            $.ajax({
                url: "{{ url('personnel/zip_code/detail') }}",
                type: "GET",
                data: {
                    'zipCode': data[0].id
                },
            })
        });

        $('#zip_code_select_other').on('select2:select', function (e) {
            var data = $('#zip_code_select_other').select2('data');
            $('#zip_code_text_other').val(htmlDecode(data[0].text));
            $.ajax({
                url: "{{ url('personnel/zip_code/detail') }}",
                type: "GET",
                data: {
                    'zipCode': data[0].id
                },
            })
        });

        $('#zip_code_select_work').on('select2:select', function (e) {
            var data = $('#zip_code_select_work').select2('data');
            $('#zip_code_text_work').val(htmlDecode(data[0].text));
            $.ajax({
                url: "{{ url('personnel/zip_code/detail') }}",
                type: "GET",
                data: {
                    'zipCode': data[0].id
                },
            })
        });
        
        $('#zip_code_select_correspondence').on('select2:select', function (e) {
            var data = $('#zip_code_select_correspondence').select2('data');
            $('#zip_code_text_correspondence').val(htmlDecode(data[0].text));
            $.ajax({
                url: "{{ url('personnel/zip_code/detail') }}",
                type: "GET",
                data: {
                    'zipCode': data[0].id
                },
            })
        });

        $.get("{{ url('gender/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#gender').append("<option value=" + v.variable + ">" + v.value +
                    "</option>");
            });
        });

        $.get("{{ url('blood/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#blood_type').append("<option value=" + v.variable + ">" + v.value +
                    "</option>");
            });
        });

        $.get("{{ url('religion/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#religion').append("<option value=" + v.variable + ">" + v.value +
                    "</option>");
            });
        });

        $('#select').focus(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('#select').click(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('#select').change(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('select').on('select2:close', function (e) {
            $('.header-select').remove();
        });

        $('#prefix_title_one, #prefix_title_two, #prefix_title_three, #suffix_title_one, #suffix_title_two, #suffix_title_three')
            .inputpicker({
                url: "{{ url('personnel/personal_data/prefix_title') }}",
                fields: [{
                        name: 'title_code',
                        text: 'Title Code'
                    },
                    {
                        name: 'description',
                        text: 'Description'
                    },
                ],
                headShow: true,
                fieldText: 'description',
                fieldValue: 'title_code',
                filterOpen: true,
                autoOpen: true,
                pagination: true,
                urlDelay: 1,
                pageMode: '',
                pageField: 'p',
                pageLimitField: 'per_page',
                limit: 5,
                pageCurrent: 1,
            });

        function loadDataFirstLastAllLevel(field = '', levelType = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/level/func/api') }}",
                data: {
                    'levelType': levelType
                }
            }).then(function (data) {
                if (!$(field).find('option:contains(' + data.levelName + ')').length) {
                    $(field).append($('<option>').val(data.levelCode).text(data.levelName));
                }
                $(field).val(data.levelCode);
            });
        }

        function loadDataLevelCode(field = '', levelType = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.levelCode + '</div>' +
                        '<div class="col-6">' + data.data.levelName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Level Code</b></div>' +
                        '<div class="col-6"><b>Level Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Level',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/level/all/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            levelType: levelType
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.levelName,
                                    id: item.levelCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }
            
        function loadDataBirthPlace(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.cityName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            var $birth_place = $('#birth_place_info, #birth_place_family_dependent_data');

            $birth_place.select2({
                width: '100%',
                placeholder: 'Choose Birth Place',
                allowClear: true,
                // dropdownParent: $('#modal_add_family_dependent_data .modal-content'),
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/city/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.cityCode,
                                    id: item.cityCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataGender(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            var $gender = $('#gender_info, #gender_family_dependent_data');

            $gender.select2({
                width: '100%',
                placeholder: 'Choose Gender',
                allowClear: true,
                minimumResultsForSearch: Infinity,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/gender/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataBloodType(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            var $blood_type = $('#blood_type_info, #blood_type_family_dependent_data');

            $blood_type.select2({
                width: '100%',
                placeholder: 'Choose Blood Type',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/blood/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataMaritalStatus(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#marital_status_info').select2({
                width: '100%',
                placeholder: 'Choose Marital Status',
                minimumResultsForSearch: Infinity,
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/marital_status/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataReligion(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            
            $('#religion_info').select2({
                width: '100%',
                placeholder: 'Choose Religion',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/religion/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataNationality(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#nationality_info').select2({
                width: '100%',
                placeholder: 'Choose Nationality',
                allowClear: true,
                minimumResultsForSearch: Infinity,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/nationality/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataDrivingLicenseCarType(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#driving_license_car_type_info').select2({
                width: '100%',
                placeholder: 'Choose Driving License Car Type',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/driving_license_car_type/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataDrivingLicenseCarRegistPlace(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.cityName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#driving_license_car_registration_place_info').select2({
                width: '100%',
                placeholder: 'Choose Driving License Car Registration Place',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/city/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.cityName,
                                    id: item.cityCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataDrivingLicenseMotorcycleRegistPlace(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.cityName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#driving_license_motorcycle_registration_place_info').select2({
                width: '100%',
                placeholder: 'Choose Driving License Motorcycle Registration Place',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/city/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.cityName,
                                    id: item.cityCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataCity(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.cityName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            var $place = $('#city_select_home, #city_select_other, #city_select_work, #city_select_correspondence')

            $place.select2({
                width: '100%',
                placeholder: 'Choose City',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/city/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.cityName,
                                    id: item.cityCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataZipCode(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.zipCode + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            var $zip_code = $('#zip_code_select_home, #zip_code_select_other, #zip_code_select_work, #zip_code_select_correspondence')

            $zip_code.select2({
                width: '100%',
                placeholder: 'Choose Zip Code',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/zip_code/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.zipCode,
                                    id: item.zipCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataDistrict(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.propinsi + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            var $district = $('#district_select_home, #district_select_other');

            $district.select2({
                width: '100%',
                placeholder: 'Choose District',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/district/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.propinsi,
                                    id: item.zipCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataSubdistrict(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.kabupaten + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            var $district = $('#subdistrict_select_home, #subdistrict_select_other');

            $district.select2({
                width: '100%',
                placeholder: 'Choose Subdistrict',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/subdistrict/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.kabupaten,
                                    id: item.zipCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataRelation(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#relation_family_dependent_data').select2({
                width: '100%',
                placeholder: 'Choose Relation',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/relation/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.value,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataEmploymentStatus(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#employment_status_employment').select2({
                width: '100%',
                placeholder: 'Choose Employment Status',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/employment/status/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataEmploymentType(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#employment_type_employment').select2({
                width: '100%',
                placeholder: 'Choose Employment Type',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/employment/type/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataOfficeLocation(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.locationName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#office_location_employment').select2({
                width: '100%',
                placeholder: 'Choose Office Location',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/office_location/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.locationName,
                                    id: item.locationCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataTerminationCode(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            // var headerIsAppend = false;
            // $('#termination_code_employment').on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Termination Code</b></div>' +
            //             '</div>';
            //         $('.select2-search--dropdown').append(html);
            //         headerIsAppend = true;
            //     }
            // });

            $('#termination_code_employment').select2({
                width: '100%',
                placeholder: 'Choose Termination Code',
                allowClear: true,
                minimumResultsForSearch: Infinity,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/termination_code/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataPosition(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.positionName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#position_code_employment').select2({
                width: '100%',
                placeholder: 'Choose Position',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/position/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.positionName,
                                    id: item.positionCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataRanking(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.rankingName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#ranking_code_employment').select2({
                width: '100%',
                placeholder: 'Choose Ranking',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/ranking/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.rankingName,
                                    id: item.rankingCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataGrade(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.gradeName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#grade_code_employment').select2({
                width: '100%',
                placeholder: 'Choose Grade',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/grade/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.gradeName,
                                    id: item.gradeCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataLocation(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.locationName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#location_code_employment').select2({
                width: '100%',
                placeholder: 'Choose Location',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/location/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.locationName,
                                    id: item.locationCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataCostCenter(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.costCenterDescription + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#cost_center_code_employment').select2({
                width: '100%',
                placeholder: 'Choose Cost Center',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/cost_center/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.costCenterDescription,
                                    id: item.costCenterCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataGroupCode(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.groupName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#group_code_employment').select2({
                width: '100%',
                placeholder: 'Choose Group Code',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/group/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.groupName,
                                    id: item.groupCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataBenefits(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#benefits_employment_data').select2({
                width: '100%',
                placeholder: 'Choose Benefits',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/benefits/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataAbsenteeismType(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#absenteeism_type_absenteeism').select2({
                width: '100%',
                placeholder: 'Choose Absenteeism Type',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/absenteeism_type/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataWorkPatternCode(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.patternCode + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#work_pattern_code_absenteeism').select2({
                width: '100%',
                placeholder: 'Choose Work Pattern Code',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/work_pattern_code/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.patternCode,
                                    id: item.patternCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataTaxStatus(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            var $tax_status = $('#tax_status_payroll, #tax_status_next_year_payroll');

            $tax_status.select2({
                width: '100%',
                placeholder: 'Choose Tax Status',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/tax_status/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataTaxOffice(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#tax_office_payroll').select2({
                width: '100%',
                placeholder: 'Choose Tax Office',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/tax_office/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataTaxCalculationMethod(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#tax_calculation_method_payroll').select2({
                width: '100%',
                placeholder: 'Choose Tax Calculation Method',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/tax_calculation_method/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataGroupNPWP(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.npwpCode + '</div>' +
                        '<div class="col-6">' + data.data.pemotongKuasa + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#group_npwp_payroll').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>NPWP Code</b></div>' +
                        '<div class="col-6"><b>Pemotong Kuasa</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#group_npwp_payroll').select2({
                width: '100%',
                placeholder: 'Choose Group NPWP',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/npwp/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.npwpCode,
                                    id: item.npwpCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataGroupBPJS(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.bpjsCode + '</div>' +
                        '<div class="col-6">' + data.data.bpjsNo + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#group_bpjs_payroll').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>BPJS Code</b></div>' +
                        '<div class="col-6"><b>BPJS No</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#group_bpjs_payroll').select2({
                width: '100%',
                placeholder: 'Choose Group BPJS',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/bpjs/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.bpjsCode,
                                    id: item.bpjsCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataGroupAuthorize() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.groupAuthorizeCode + '</div>' +
                        '<div class="col-6">' + data.data.groupAuthorizeDesc + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#group_authorize_payroll').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Group Authorize Code</b></div>' +
                        '<div class="col-6"><b>Group Authorize Desc</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#group_authorize_payroll').select2({
                width: '100%',
                placeholder: 'Choose Group Authorize',
                allowClear: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/group_authorize/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            isRange: false
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.groupAuthorizeDesc,
                                    id: item.groupAuthorizeCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataCompanyBankCode(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-4">' + data.data.bankCode + '</div>' +
                        '<div class="col-4">' + data.data.description + '</div>' +
                        '<div class="col-4">' + data.data.accountNo + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $company_bank = $('#company_bank_code_primary, #company_bank_code_optional_one, #company_bank_code_optional_two');

            var headerIsAppend = false;
            $company_bank.on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-4"><b>Bank Code</b></div>' +
                        '<div class="col-4"><b>Description</b></div>' +
                        '<div class="col-4"><b>Account No</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $company_bank.select2({
                width: '100%',
                placeholder: 'Choose Company Bank Code',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/company_bank_code/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.bankCode,
                                    id: item.bankCode,
                                    data: item
                                }
                                // console.log(data);
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataEmployeeBankCode(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.bankCode + '</div>' +
                        '<div class="col-6">' + data.data.bankName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $employee_bank_code = $('#employee_bank_code_primary, #employee_bank_code_optional_one, #employee_bank_code_optional_two');

            var headerIsAppend = false;
            $employee_bank_code.on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Bank Code</b></div>' +
                        '<div class="col-6"><b>Bank Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            
            $employee_bank_code.select2({
                width: '100%',
                placeholder: 'Choose Employee Bank Code',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/employee_bank_code/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.bankCode,
                                    id: item.bankCode,
                                    data: item
                                }
                                // console.log(data);
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataCurrency(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            var $currency = $('#currency_primary, #currency_optional_one, #currency_optional_two');

            $currency.select2({
                width: '100%',
                placeholder: 'Choose Currency',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/currency/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataInsuranceCode(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#insurance_code_insurance').select2({
                width: '100%',
                placeholder: 'Choose Insurance Code',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/insurance_code/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataInsuranceClass(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#insurance_class_insurance').select2({
                width: '100%',
                placeholder: 'Choose Insurance Class',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/insurance_class/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.comGenCode,
                                    id: item.comGenCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function load_table_fringe_benefit() {
            table1 = $('#fringe_benefit_data_table').DataTable({
                processing: true,
                data: arrayFringeBenefit,

                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                // "order": [
                //     [1, "asc"]
                // ],xx
                columns: [
                    {
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {   
                        data: 'seqNoFringeBenefit',
                        name: 'seqNoFringeBenefit',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="seq_no_fringe_benefit[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'benefits',
                        name: 'benefits',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="fringe_benefits[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'description',
                        name: 'description',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="description[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'startDate',
                        name: 'startDate',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="start_date[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'endDate',
                        name: 'endDate',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="end_date[]" value="' +
                                data + '">' + data;
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#employment_status_employment').on('change', function(){
            if ($(this).val().includes('C')) {
                $('#contract_start_date_employment').parent().parent().parent().parent().removeClass('d-none');
            } else {
                $('#contract_start_date_employment').parent().parent().parent().parent().addClass('d-none');
            }
        });

        $('#fringe_benefit_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#fringe_benefit_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_table_family_dependent_data() {
            table2 = $('#family_dependent_data_table').DataTable({
                // processing: true,
                // orderCellsTop: true,
                data: arrayFamilyDependent,

                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',

                columns: [
                    {
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {   
                        data: 'seqNoFamilyDependent',
                        name: 'seqNoFamilyDependent',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="seq_no_family_dependent[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'familyName',
                        name: 'familyName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="family_name[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'relationCode',
                        name: 'relationCode',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="relation_code[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'birthDate',
                        name: 'birthDate',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="birth_date[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'birthPlace',
                        name: 'birthPlace',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="birth_place[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'gender',
                        name: 'gender',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="gender[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'bloodType',
                        name: 'bloodType',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="blood_type[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'familyCardNumber',
                        name: 'familyCardNumber',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="family_card_number[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'occupation',
                        name: 'occupation',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="occupation[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'flagMedical',
                        name: 'flagMedical',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="flag_medical[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'flagPayroll',
                        name: 'flagPayroll',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="flag_payroll[]" value="' +
                                data + '">' + data;
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#family_dependent_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#family_dependent_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#modal_add_employment_data').on('show.bs.modal', function () {
            if (func == 'new') {
                var count = table1.rows().count();
                $('#seq_no_employment_data').val(count);
            }

            else {
                $.ajax({
                    url: "{{ url('personel_data_detail/number/check') }}",
                    type: "GET",
                    data: {
                        'url': '/personel/PeMaster/getPeMasterDetail',
                        'pemasterType' : 'peMasterFringeBenefit',
                        'employeeNo': arrData2[0].peMasterFringeBenefit.employeeNo
                    },
                    success: function (response) {
                        var count = table1.rows().count();
                        // console.log(response);

                        if (response > 0 && count !== response) {
                            var total = parseInt(response) + parseInt(count);
                            $('#seq_no_employment_data').val(total - 1);
                        }
                        else if (response > 0 && count == response) {
                            // var total = parseInt(response) + parseInt(count);
                            $('#seq_no_employment_data').val(response);
                        }
                        else {
                            for (var i = 0; i <= count; i++){
                                $('#seq_no_employment_data').val(i);
                                // console.log(i);
                            }
                        }
                        // console.log(count);
                        // console.log(total);
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        });

        $('#modal_add_family_dependent_data').on('show.bs.modal', function () {
            if (func == 'new') {
                var count = table2.rows().count();
                $('#seq_no_family_dependent_data').val(count);
            }

            else {
                $.ajax({
                    url: "{{ url('personel_data_detail/number/check') }}",
                    type: "GET",
                    data: {
                        'url': '/personel/PeMaster/getPeMasterDetail',
                        'pemasterType' : 'peMasterFamily',
                        'employeeNo': arrData2[0].employeeNo
                    },
                    success: function (response) {
                        var count = table2.rows().count();
                        // console.log(response);
                        // console.log(count);

                        if (response > 0 && count !== response) {
                            var total = parseInt(response) + parseInt(count);
                            $('#seq_no_family_dependent_data').val(total - 1);
                        }
                        else if (response > 0 && count == response) {
                            // var total = parseInt(response) + parseInt(count);
                            $('#seq_no_family_dependent_data').val(response);
                        }
                        else {
                            for (var i = 0; i <= count; i++){
                                $('#seq_no_family_dependent_data').val(i);
                                // console.log(i);
                            }
                        }
                        // console.log(count);
                        // console.log(total);
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        });

        $("#btn-save-employment-data").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            arrayFringeBenefit.push({
                "seqNoFringeBenefit": $("#seq_no_employment_data").val(),
                "benefits": (($("#benefits_employment_data").val()) ? $("#benefits_employment_data").val() : '-'),
                "description": (($("#description_employment_data").val()) ? $("#description_employment_data").val() : '-'),
                "startDate": (($("#start_date_employment_data").val()) ? $("#start_date_employment_data").val() : '-'),
                "endDate": (($("#end_date_employment_data").val()) ? $("#end_date_employment_data").val() : '-')
            });

            $(this).prop("disabled", false);
            $(this).html(
                '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
            );
            $('#modal_add_employment_data').modal('hide');
            
            $('#fringe_benefit_data_table').DataTable().destroy();
            load_table_fringe_benefit();
        });

        $("#btn-remove-employment-data").on('click', function() {
            var data = table1.rows('.selected').data().toArray();
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) {
                    var index = arrayFringeBenefit.findIndex(x => x.seqNoFringeBenefit == data[i].seqNoFringeBenefit);
                    arrayFringeBenefit.splice(index, 1);
                }
                $('#fringe_benefit_data_table').DataTable().destroy();
                load_table_fringe_benefit();
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-save-family-dependent-data").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            if ($('#include_medical_family_dependent_data').is(':checked')) {
                $('#include_medical_family_dependent_data').val('true');
            }
            else {
                $('#include_medical_family_dependent_data').val('false');
            }

            if ($('#include_tax_family_dependent_data').is(':checked')) {
                $('#include_tax_family_dependent_data').val('true');
            }
            else {
                $('#include_tax_family_dependent_data').val('false');
            }
            
            arrayFamilyDependent.push({
                "seqNoFamilyDependent": $("#seq_no_family_dependent_data").val(),
                "familyName": ((typeof $("#name_family_dependent_data").val() !== 'undefined' && $("#name_family_dependent_data").val() !== null && $("#name_family_dependent_data").val() !== '') ? $("#name_family_dependent_data").val() : '-'),
                "relationCode": ((typeof $("#relation_family_dependent_data").val() !== 'undefined' && $("#relation_family_dependent_data").val() !== null && $("#relation_family_dependent_data").val() !== '') ? $("#relation_family_dependent_data").val() : '-') ,
                "birthDate": ((typeof $("#birth_date_family_dependent_data").val() !== 'undefined' && $("#birth_date_family_dependent_data").val() !== null && $("#birth_date_family_dependent_data").val() !== '') ? $("#birth_date_family_dependent_data").val() : '-'),
                "birthPlace": ((typeof $("#birth_place_family_dependent_data").val() !== 'undefined' && $("#birth_place_family_dependent_data").val() !== null && $("#birth_place_family_dependent_data").val() !== '') ? $("#birth_place_family_dependent_data").val() : '-'),
                "gender": ((typeof $("#gender_family_dependent_data").val() !== 'undefined' && $("#gender_family_dependent_data").val() !== null && $("#gender_family_dependent_data").val() !== '') ? $("#gender_family_dependent_data").val() : '-'),
                "bloodType": ((typeof $("#blood_type_family_dependent_data").val() !== 'undefined' && $("#blood_type_family_dependent_data").val() !== null && $("#blood_type_family_dependent_data").val() !== '') ? $("#blood_type_family_dependent_data").val() : '-'),
                "familyCardNumber": ((typeof $("#family_card_no_family_dependent_data").val() !== 'undefined' && $("#family_card_no_family_dependent_data").val() !== null && $("#family_card_no_family_dependent_data").val() !== '') ? $("#family_card_no_family_dependent_data").val() : '-'),
                "occupation": ((typeof $("#occupation_family_dependent_data").val() !== 'undefined' && $("#occupation_family_dependent_data").val() !== null && $("#occupation_family_dependent_data").val() !== '') ? $("#occupation_family_dependent_data").val() : '-'),
                "flagMedical": ((typeof $("#include_medical_family_dependent_data").val() !== 'undefined' && $("#include_medical_family_dependent_data").val() !== null) ? $("#include_medical_family_dependent_data").val() : false),
                "flagPayroll": ((typeof $("#include_tax_family_dependent_data").val() !== 'undefined' && $("#include_tax_family_dependent_data").val() !== null) ? $("#include_tax_family_dependent_data").val() : false)
            });

            $(this).prop("disabled", false);
            $(this).html(
                '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
            );
            $('#modal_add_family_dependent_data').modal('hide');
            
            $('#family_dependent_data_table').DataTable().destroy();
            load_table_family_dependent_data();
        });

        $("#btn-remove-family-dependent-data").on('click', function() {
            var data = table2.rows('.selected').data().toArray();
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) {
                    var index = arrayFamilyDependent.findIndex(x => x.seqNoFamilyDependent == data[i].seqNoFamilyDependent);
                    arrayFamilyDependent.splice(index, 1);
                }
                $('#family_dependent_data_table').DataTable().destroy();
                load_table_family_dependent_data();
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-save-profile").click(function () {
            // $("#personal_data_form").submit();

            var form = $("#personal_data_form");
            var valid = true;
            form.find(".tab-pane").each(function() {
                if (!$(this).find("input, select, textarea").valid()) {
                    valid = false;
                }
            });
            if (valid) {
                $(this).prop("disabled", true);
                $(this).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                );

                form.submit(); // Submit form jika semua bidang valid
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html("Some Field Are Required, Please Check Again");
            }
        });

        // if ($("#employee_profile_form").length > 0) {
        //     $("#employee_profile_form").validate({
        //         rules: {
        //             photo_profile: {
        //                 extension: "jpg|jpeg|png",
        //             },
        //         },
        //         messages: {
        //             photo_profile: {
        //                 extension: "{{ __('personel_personal_data.photo_profile_extension') }}",
        //             },
        //         },
        //         errorPlacement: function (error, element) {
        //             error.insertAfter(element);
        //             alert(error.html());
        //         },
        //         showErrors: function (errorMap, errorList) {
        //             this.defaultShowErrors();
        //         },
        //         submitHandler: function (form) {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });

        //             var myform = document.getElementById("employee_profile_form");
        //             var formdata = new FormData(myform);

        //             $.ajax({
        //                 url: "{{ url('personnel/employee/photo/proses') }}",
        //                 type: "POST",
        //                 processData: false,
        //                 contentType: false,
        //                 data: formdata,
        //                 success: function (response) {
        //                     if (response.status == "true") {
        //                         $('#notification_success').modal('show');
        //                         $('#message-notification-success').html(response
        //                             .message);
        //                         setTimeout(function () {
        //                             window.location =
        //                                 "{{ url('personnel/personal_data') }}";
        //                         }, 3000);
        //                     } else {
        //                         $('#notification_error').modal('show');
        //                         if (response.message == null || response.message ==
        //                             '') {
        //                             $('#message-notification-error').html(
        //                                 "{{ __('login.error') }}");
        //                         } else {
        //                             $('#message-notification-error').html(response
        //                                 .message);
        //                         }
        //                     }
        //                 },
        //                 error: function (response) {
        //                     $('#notification_error').modal('show');
        //                     $('#message-notification-error').html(response);
        //                 }
        //             });
        //         }
        //     })
        // }

        if ($("#personal_data_form").length > 0) {
            $("#personal_data_form").validate({  
                ignore: [],
                rules: {
                    employee_no_info: {
                        required: true,
                    },
                    fullname_info: {
                        required: true,
                    },
                    joining_date_employment: {
                        required: true,
                    },
                    absenteeism_type_absenteeism: {
                        required: true,
                    },
                    work_pattern_code_absenteeism: {
                        required: true,
                    },
                    starting_day_absenteeism: {
                        required: true,
                    },
                    tax_status_payroll: {
                        required: true,
                    },
                    tax_status_next_year_payroll: {
                        required: true,
                    },
                    tax_office_payroll: {
                        required: true,
                    },
                    tax_calculation_method_payroll: {
                        required: true,
                    },
                    group_authorize_payroll: {
                        required: true,
                    },
                    birth_place_info: {
                        required: true,
                    },
                    birth_date_info: {
                        required: true,
                    },
                    gender_info: {
                        required: true,
                    },
                    marital_status_info: {
                        required: true,
                    },
                    position_code_employment: {
                        required: true,
                    },
                    ranking_code_employment: {
                        required: true,
                    },
                    grade_code_employment: {
                        required: true,
                    },
                    cost_center_code_employment: {
                        required: true,
                    },
                    level1: {
                        required: true,
                    },
                    level2: {
                        required: true,
                    },
                    level3: {
                        required: true,
                    },
                    level4: {
                        required: true,
                    },
                    level5: {
                        required: true,
                    },
                    level6: {
                        required: true,
                    },
                    level7: {
                        required: true,
                    },
                    level8: {
                        required: true,
                    },
                    level9: {
                        required: true,
                    },
                    level10: {
                        required: true,
                    },
                },
                messages: {
                    employee_no_info: {
                        required: "{{ __('personel_personal_data.employee_no_required') }}",
                    },
                    fullname_info: {
                        required: "{{ __('personel_personal_data.fullname_required') }}",
                    },
                    joining_date_employment: {
                        required: "{{ __('personel_personal_data.joining_date_required') }}",
                    },
                    absenteeism_type_absenteeism: {
                        required: "{{ __('personel_personal_data.absenteeism_type_required') }}",
                    },
                    work_pattern_code_absenteeism: {
                        required: "{{ __('personel_personal_data.work_pattern_code_required') }}",
                    },
                    starting_day_absenteeism: {
                        required: "{{ __('personel_personal_data.starting_day_required') }}",
                    },
                    tax_status_payroll: {
                        required: "{{ __('personel_personal_data.tax_status_required') }}",
                    },
                    tax_status_next_year_payroll: {
                        required: "{{ __('personel_personal_data.tax_status_next_year_required') }}",
                    },
                    tax_office_payroll: {
                        required: "{{ __('personel_personal_data.tax_office_required') }}",
                    },
                    tax_calculation_method_payroll: {
                        required: "{{ __('personel_personal_data.tax_calculation_method_required') }}",
                    },
                    group_authorize_payroll: {
                        required: "{{ __('personel_personal_data.group_authorize_required') }}"
                    },
                    birth_place_info: {
                        required: "{{ __('personel_personal_data.birth_place_info_required') }}",
                    },
                    birth_date_info: {
                        required: "{{ __('personel_personal_data.birth_date_info_required') }}",
                    },
                    gender_info: {
                        required: "{{ __('personel_personal_data.gender_info_required') }}",
                    },
                    marital_status_info: {
                        required: "{{ __('personel_personal_data.marital_status_info_required') }}",
                    },
                    position_code_employment: {
                        required: "{{ __('personel_personal_data.position_code_employment_required') }}",
                    },
                    ranking_code_employment: {
                        required: "{{ __('personel_personal_data.ranking_code_employment_required') }}",
                    },
                    grade_code_employment: {
                        required: "{{ __('personel_personal_data.grade_code_employment_required') }}",
                    },
                    cost_center_code_employment: {
                        required: "{{ __('personel_personal_data.cost_center_code_employment_required') }}",
                    },
                    level1: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                    level2: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                    level3: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                    level4: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                    level5: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                    level6: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                    level7: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                    level8: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                    level9: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                    level10: {
                        required: "{{ __('personel_personal_data.level_required') }}",
                    },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-save-profile").prop("disabled", false);
                    $("#btn-save-profile").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
                    );

                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var myform = document.getElementById("personal_data_form");
                    var formdata = new FormData(myform);

                    $.ajax({
                        url: "{{ url('personnel/personal_data/proses') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-profile").prop("disabled", false);
                                $("#btn-save-profile").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personnel/personal_data') }}";
                                }, 3000);
                            } else {
                                $("#btn-save-profile").prop("disabled", false);
                                $("#btn-save-profile").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
                                );

                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $("#btn-save-profile").prop("disabled", false);
                            $("#btn-save-profile").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        // if ($("#employment_data_form").length > 0) {
        //     $("#employment_data_form").validate({
        //         rules: {
        //             seq_no_employment_data: {
        //                 required: true,
        //             },
        //             benefits_employment_data: {
        //                 required: true,
        //             },
        //         },
        //         messages: {
        //             seq_no_employment_data: {
        //                 required: "{{ __('personel_personal_data.seq_no_required') }}",
        //             },
        //             benefits_employment_data: {
        //                 required: "{{ __('personel_personal_data.benefits_required') }}",
        //             },
        //         },
        //         highlight: function (element) {
        //             $(element).addClass('is-invalid');
        //         },
        //         unhighlight: function (element) {
        //             $(element).removeClass('is-invalid');
        //         },
        //         errorElement: 'span',
        //         errorPlacement: function (error, element) {
        //             $("#btn-save-employment-data").prop("disabled", false);
        //             $("#btn-save-employment-data").html(
        //                 '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
        //             );

        //             error.addClass('invalid-feedback');
        //             element.closest('.form-group').append(error);
        //         },
        //         submitHandler: function (form) {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });
        //             $.ajax({
        //                 url: "{{ url('personnel/position/proses') }}",
        //                 type: "POST",
        //                 data: $('#employment_data_form').serialize(),
        //                 success: function (response) {
        //                     if (response.status == "true") {
        //                         $("#btn-save-employment-data").prop("disabled", false);
        //                         $("#btn-save-employment-data").html(
        //                             '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
        //                         );
                                
        //                         $('#notification_success').modal('show');
        //                         $('#message-notification-success').html(response
        //                             .message);
        //                         setTimeout(function () {
        //                             window.location =
        //                                 "{{ url('personnel/position') }}";
        //                         }, 3000);
        //                     } else {
        //                         $("#btn-save-employment-data").prop("disabled", false);
        //                         $("#btn-save-employment-data").html(
        //                             '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
        //                         );

        //                         $('#notification_error').modal('show');
        //                         if (response.message == null || response.message ==
        //                             '') {
        //                             $('#message-notification-error').html(
        //                                 "{{ __('login.error') }}");
        //                         } else {
        //                             $('#message-notification-error').html(response
        //                                 .message);
        //                         }
        //                     }
        //                 },
        //                 error: function (response) {
        //                     $("#btn-save-employment-data").prop("disabled", false);
        //                     $("#btn-save-employment-data").html(
        //                         '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
        //                     );

        //                     $('#notification_error').modal('show');
        //                     $('#message-notification-error').html(response);
        //                 }

        //             });
        //         }
        //     })
        // }

        // if ($("#family_dependent_data_form").length > 0) {
        //     $("#family_dependent_data_form").validate({
        //         rules: {
        //             seq_no_family_dependent_data: {
        //                 required: true,
        //             },
        //         },
        //         messages: {
        //             seq_no_family_dependent_data: {
        //                 required: "{{ __('personel_personal_data.seq_no_required') }}",
        //             },
        //         },
        //         highlight: function (element) {
        //             $(element).addClass('is-invalid');
        //         },
        //         unhighlight: function (element) {
        //             $(element).removeClass('is-invalid');
        //         },
        //         errorElement: 'span',
        //         errorPlacement: function (error, element) {
        //             $("#btn-save-family-dependent-data").prop("disabled", false);
        //             $("#btn-save-family-dependent-data").html(
        //                 '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
        //             );

        //             error.addClass('invalid-feedback');
        //             element.closest('.form-group').append(error);
        //         },
        //         submitHandler: function (form) {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });
        //             $.ajax({
        //                 url: "{{ url('personnel/data/family_dependent/proses') }}",
        //                 type: "POST",
        //                 data: $('#family_dependent_data_form').serialize(),
        //                 success: function (response) {
        //                     if (response.status == "true") {
        //                         $("#btn-save-family-dependent-data").prop("disabled", false);
        //                         $("#btn-save-family-dependent-data").html(
        //                             '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
        //                         );
        //                         $('#modal_add_family_dependent_data').modal('hide');
        //                         $('#family_dependent_data_table').DataTable().destroy();
        //                         load_table_family_dependent_data();
        //                         $('#notification_success').modal('show');
        //                         $('#message-notification-success').html(response
        //                             .message);
        //                         setTimeout(function () {
        //                             window.location =
        //                             $('#notification_success').modal('hide');
        //                         }, 3000);
        //                     } else {
        //                         $("#btn-save-family-dependent-data").prop("disabled", false);
        //                         $("#btn-save-family-dependent-data").html(
        //                             '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
        //                         );

        //                         $('#notification_error').modal('show');
        //                         if (response.message == null || response.message ==
        //                             '') {
        //                             $('#message-notification-error').html(
        //                                 "{{ __('login.error') }}");
        //                         } else {
        //                             $('#message-notification-error').html(response
        //                                 .message);
        //                         }
        //                     }
        //                 },
        //                 error: function (response) {
        //                     $("#btn-save-family-dependent-data").prop("disabled", false);
        //                     $("#btn-save-family-dependent-data").html(
        //                         '<i class="fa fa-floppy-o"></i> {{ __("personel_personal_data.btn_save") }}'
        //                     );

        //                     $('#notification_error').modal('show');
        //                     $('#message-notification-error').html(response);
        //                 }

        //             });
        //         }
        //     })
        // }

        // function load_table_dependent() {
        //     table = $('#family_dependent_data_table').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         orderCellsTop: true,
        //         ajax: "{{ url('personnel/personal_data/dependent/table') }}",
        //         error: function (jqXHR, ajaxOptions, thrownError) {
        //             alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
        //                 "\r\n" + ajaxOptions.responseText);
        //         },
        //         "sDom": 'lrtip',
        //         'sPaginationType': 'ellipses',
        //         columns: [{
        //                 data: 'dependent_name',
        //                 name: 'dependent_name'
        //             },
        //             {
        //                 data: 'relation',
        //                 name: 'relation'
        //             },
        //             {
        //                 data: 'birth_date',
        //                 name: 'birth_date'
        //             },
        //             {
        //                 data: 'gender',
        //                 name: 'gender'
        //             },
        //             {
        //                 data: 'blood_type',
        //                 name: 'blood_type'
        //             },
        //             {
        //                 data: 'family_card_number',
        //                 name: 'family_card_number'
        //             },
        //             {
        //                 data: 'occupation',
        //                 name: 'occupation'
        //             },
        //             {
        //                 data: 'medical_claim',
        //                 name: 'medical_claim'
        //             },
        //             {
        //                 data: 'tax',
        //                 name: 'tax'
        //             },
        //         ]
        //     });
        // }
    });

</script>

</html>
