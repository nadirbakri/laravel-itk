<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_personal_data.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
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

    </style>
</head>

<body>
    <div class="div-personel">
        <form id="employee_profile_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="div-profile">
                <div class="row div-row-profile">
                    <div class="col-2 subdiv-profile-image">
                        <!-- <img src="{{ isset($data[0]->photo) ? $photo : url('/pictures/profile-picture.png') }}"
                            alt="Profile"> -->
                        <img src="{{ url('/pictures/profile-picture.png') }}" alt="Profile">
                        <label class="btn btn-primary" id=""><i class="fa fa-edit"></i>
                            {{ __('personel_personal_data.btn_change_picture') }}
                            <input type="file" class="form-control" id="photo_profile" name="photo_profile" hidden>
                        </label>
                    </div>
                    <div class="col-9 subdiv-profile">
                        <p>{{ isset($data[0]->fullName) ? $data[0]->fullName : '-' }} &emsp; | &emsp;
                            {{ isset($data[0]->employeeNo) ? $data[0]->employeeNo : '-' }}</p>
                        <p class="small">{{ isset($data[0]->companyName) ? $data[0]->companyName : '-' }} &emsp; |
                            &emsp; {{ isset($data[0]->positionName) ? $data[0]->positionName : '-' }}</p>
                        <p class="small">
                            {{ isset($data[0]->companyEmailAddress) ? $data[0]->companyEmailAddress : '-' }} &emsp; |
                            &emsp; {{ isset($data[0]->personalHandphone) ? $data[0]->personalHandphone : '-' }}</p>
                    </div>
                </div>
            </div>
        </form>
        <div class="div-title">
            <a href="{{ url('personel/personal_data') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_personal_data.list_detail') }}</span>
            </a>
        </div>

        <div class="div-form">
            <form id="personal_data_form" method="post">
                @csrf
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
                                    <input type="text" class="form-control" id="employee_no_info"
                                        name="employee_no_info"
                                        placeholder="{{ __('personel_personal_data.label_employee_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fullname_info">{{ __('personel_personal_data.label_fullname') }}</label>
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
                                    <label
                                        for="birth_place_info">{{ __('personel_personal_data.label_birth_place') }}</label>
                                    <select class="form-control select2" id="birth_place_info"
                                        name="birth_place_info"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="birth_date_info">{{ __('personel_personal_data.label_birth_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="birth_date_info"
                                            name="birth_date_info"
                                            placeholder="{{ __('personel_personal_data.label_birth_date') }}">
                                        <div class="input-group-prepend">
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
                                    <select class="form-control" id="gender_info" name="gender_info">
                                        <option value="">{{ __('personel_personal_data.label_select_gender') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="blood_type_info">{{ __('personel_personal_data.label_blood_type') }}</label>
                                    <select class="form-control" id="blood_type_info" name="blood_type_info">
                                        <option value="">{{ __('personel_personal_data.label_select_blood_type') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="marital_status_info">{{ __('personel_personal_data.label_marital_status') }}</label>
                                    <select class="form-control" id="marital_status_info" name="marital_status_info">
                                        <option value="">{{ __('personel_personal_data.label_select_marital_status') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="religion_info">{{ __('personel_personal_data.label_religion') }}</label>
                                    <select class="form-control" id="religion_info" name="religion_info">
                                        <option value="">{{ __('personel_personal_data.label_select_religion') }}
                                        </option>
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
                                        <option value="">{{ __('personel_personal_data.label_select_nationality') }}
                                        </option>
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
                                        <div class="input-group-prepend">
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
                                        <div class="input-group-prepend">
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
                                        <div class="input-group-prepend">
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
                                        <option value="">
                                            {{ __('personel_personal_data.label_select_driving_license_car_type') }}
                                        </option>
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
                                        <div class="input-group-prepend">
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
                                        <div class="input-group-prepend">
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
                                        <div class="input-group-prepend">
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
                                        <div class="input-group-prepend">
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
                                                for="district_home">{{ __('personel_personal_data.label_district') }}</label>
                                            <input type="text" class="form-control" id="district_home"
                                                name="district_home"
                                                placeholder="{{ __('personel_personal_data.label_district') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="subdistrict_home">{{ __('personel_personal_data.label_subdistrict') }}</label>
                                            <input type="text" class="form-control" id="subdistrict_home"
                                                name="subdistrict_home"
                                                placeholder="{{ __('personel_personal_data.label_subdistrict') }}">
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
                                                for="district_other">{{ __('personel_personal_data.label_district') }}</label>
                                            <input type="text" class="form-control" id="district_other"
                                                name="district_other"
                                                placeholder="{{ __('personel_personal_data.label_district') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                for="subdistrict_other">{{ __('personel_personal_data.label_subdistrict') }}</label>
                                            <input type="text" class="form-control" id="subdistrict_other"
                                                name="subdistrict_other"
                                                placeholder="{{ __('personel_personal_data.label_subdistrict') }}">
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
                                        <option value="">
                                            {{ __('personel_personal_data.label_select_employment_status') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="employment_type_employment">{{ __('personel_personal_data.label_employment_type') }}</label>
                                    <select class="form-control" id="employment_type_employment"
                                        name="employment_type_employment">
                                        <option value="">{{ __('personel_personal_data.label_select_employment_type') }}
                                        </option>
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
                                        <div class="input-group-prepend">
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
                                        for="joining_date_employment">{{ __('personel_personal_data.label_joining_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="joining_date_employment"
                                            name="joining_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_joining_date') }}">
                                        <div class="input-group-prepend">
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
                                        <div class="input-group-prepend">
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
                                        <div class="input-group-prepend">
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
                                        <div class="input-group-prepend">
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
                                        for="termination_date_employment">{{ __('personel_personal_data.label_termination_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="termination_date_employment"
                                            name="termination_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_termination_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="effective_terminated_employment">{{ __('personel_personal_data.label_effective_terminated') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="effective_terminated_employment"
                                            name="effective_terminated_employment"
                                            placeholder="{{ __('personel_personal_data.label_effective_terminated') }}">
                                        <div class="input-group-prepend">
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
                                        for="termination_code_employment">{{ __('personel_personal_data.label_termination_code') }}</label>
                                    <select class="form-control" id="termination_code_employment"
                                        name="termination_code_employment">
                                        <option value="">
                                            {{ __('personel_personal_data.label_select_termination_code') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
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
                                        placeholder="{{ __('personel_personal_data.label_termination_remarks') }}"></textarea>
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
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="start_date_employment"
                                            name="start_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_start_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="end_date_employment">{{ __('personel_personal_data.label_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="end_date_employment"
                                            name="end_date_employment"
                                            placeholder="{{ __('personel_personal_data.label_end_date') }}">
                                        <div class="input-group-prepend">
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
                            <div class="col-9">
                                <table id="employment_data_table" class="table hover">
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
                                                <select class="form-control" id="absenteeism_type_absenteeism"
                                                    name="absenteeism_type_absenteeism">
                                                    <option value="">
                                                        {{ __('personel_personal_data.label_select_absenteeism_type') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="work_pattern_code_absenteeism">{{ __('personel_personal_data.label_work_pattern_code') }}</label>
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
                                                <input type="number" class="form-control" id="starting_day_absenteeism"
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
                                                <select class="form-control" id="tax_status_payroll"
                                                    name="tax_status_payroll">
                                                    <option value="">
                                                        {{ __('personel_personal_data.label_select_tax_status') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="tax_status_next_year_payroll">{{ __('personel_personal_data.label_tax_status_next_year') }}</label>
                                                <select class="form-control" id="tax_status_next_year_payroll"
                                                    name="tax_status_next_year_payroll">
                                                    <option value="">
                                                        {{ __('personel_personal_data.label_select_tax_status_next_year') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                                    <div class="input-group-prepend">
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
                                                    <div class="input-group-prepend">
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
                                                    for="tax_calculation_method_payroll">{{ __('personel_personal_data.label_tax_calculation_method') }}</label>
                                                <select class="form-control" id="tax_calculation_method_payroll"
                                                    name="tax_calculation_method_payroll">
                                                    <option value="">
                                                        {{ __('personel_personal_data.label_select_tax_calculation_method') }}
                                                    </option>
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
                                                    for="group_authorize_payroll">{{ __('personel_personal_data.label_group_authorize') }}</label>
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
                                                    <div class="input-group-prepend">
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
                                                    <div class="input-group-prepend">
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
                                                        name="work_related_accident_insurance_tenaga_kerja"
                                                        value="true">
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
                                                        name="work_related_accident_insurance_two_tenaga_kerja"
                                                        value="true">
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
                                                        name="work_related_accident_insurance_three_tenaga_kerja"
                                                        value="true">
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
                                                    <div class="input-group-prepend">
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
                                                    <div class="input-group-prepend">
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
                                                    <option value="">
                                                        {{ __('personel_personal_data.label_select_currency') }}
                                                    </option>
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
                                                <input type="text" class="form-control" id="percentage_primary"
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
                                                    <option value="">
                                                        {{ __('personel_personal_data.label_select_currency') }}
                                                    </option>
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
                                                <input type="text" class="form-control" id="percentage_optional_one"
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
                                                    <option value="">
                                                        {{ __('personel_personal_data.label_select_currency') }}
                                                    </option>
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
                                                <input type="text" class="form-control" id="percentage_optional_two"
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
                                <table id="family_dependent_data_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Seq No</th>
                                            <th>Name</th>
                                            <th>Relation</th>
                                            <th>Birth Date</th>
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
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-family-dependent-data"
                                    id="btn-add-family-dependent-data" style="width: 100%;" data-toggle="modal"
                                    data-target="#modal_add_family_dependent_data">
                                    <i class="fa fa-plus"></i> {{ __('personel_personal_data.btn_add') }}
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
                                        <div class="input-group-prepend">
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
    <div class="modal fade" id="modal_add_family_dependent_data" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <input type="text" class="form-control" id="seq_no_family_dependent_data"
                                        name="seq_no_family_dependent_data"
                                        placeholder="{{ __('personel_personal_data.label_seq_no') }}">
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
                                            {{ __('personel_personal_data.label_select_relation') }}
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
                                        <div class="input-group-prepend">
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
                                            {{ __('personel_personal_data.label_select_gender') }}
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
                                            {{ __('personel_personal_data.label_select_blood_type') }}
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
                                            id="include_medical_family_dependent_data" name="include_medical_family_dependent_data"
                                            value="true">
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
                                            id="include_tax_family_dependent_data" name="include_tax_family_dependent_data"
                                            value="true">
                                        <label class="form-check-label"
                                            for="include_tax_family_dependent_data">{{ __('personel_personal_data.label_include_tax') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-family-dependent-data" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> {{ __('personel_personal_data.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_personal_data.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_employment_data" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <input type="text" class="form-control" id="seq_no_employment_data"
                                        name="seq_no_employment_data"
                                        placeholder="{{ __('personel_personal_data.label_seq_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="benefits_employment_data">{{ __('personel_personal_data.label_benefits') }}</label>
                                    <select class="form-control" id="benefits_employment_data"
                                        name="benefits_employment_data">
                                        <option value="">
                                            {{ __('personel_personal_data.label_select_benefits') }}
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
                                        <div class="input-group-prepend">
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
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-employment-data" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> {{ __('personel_personal_data.btn_save') }}</button>
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = null;

        $('#fringe_benefit_data_table thead tr').clone(true).appendTo('#fringe_benefit_data_table thead');
        $('#fringe_benefit_data_table thead tr:eq(1) th').each(function (i) {
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

        $('#dependent_data_table thead tr').clone(true).appendTo('#dependent_data_table thead');
        $('#dependent_data_table thead tr:eq(1) th').each(function (i) {
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
                $('#dependent_data_table').DataTable().destroy();
                load_table_dependent();
            }
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

        $('#prefix_title_one, #prefix_title_two, #prefix_title_three, #suffix_title_one, #suffix_title_two, #suffix_title_three')
            .inputpicker({
                url: "{{ url('personel/personal_data/prefix_title') }}",
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

        function load_table_fringe_benefit() {
            table = $('#fringe_benefit_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "{{ url('personel/personal_data/fringe_benefit/table') }}",
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                columns: [{
                        data: 'seq_no',
                        name: 'seq_no'
                    },
                    {
                        data: 'benefits',
                        name: 'benefits'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                ]
            });
        }

        function load_table_dependent() {
            table = $('#dependent_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "{{ url('personel/personal_data/dependent/table') }}",
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                columns: [{
                        data: 'dependent_name',
                        name: 'dependent_name'
                    },
                    {
                        data: 'relation',
                        name: 'relation'
                    },
                    {
                        data: 'birth_date',
                        name: 'birth_date'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'blood_type',
                        name: 'blood_type'
                    },
                    {
                        data: 'family_card_number',
                        name: 'family_card_number'
                    },
                    {
                        data: 'occupation',
                        name: 'occupation'
                    },
                    {
                        data: 'medical_claim',
                        name: 'medical_claim'
                    },
                    {
                        data: 'tax',
                        name: 'tax'
                    },
                ]
            });
        }
    });

</script>

</html>
