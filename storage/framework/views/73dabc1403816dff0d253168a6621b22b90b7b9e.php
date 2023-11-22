<!DOCTYPE html>
<html>

<head>
    <title><?php echo e(__('payroll_spt_format.judul')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo e(asset('css/personel_detail_data.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.inputpicker.css')); ?>">
    <style type="text/css">
        .div-payroll_spt_format {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .col-0-5 {
            @extend  .col;
            flex: 0 0 4.16666667%;
            max-width: 4.16666667%;
        }

        .col-1-5 {
            @extend  .col;
            flex: 0 0 8.5%;
            max-width: 12.5%;
        }

        .no-border {
            border-width:0px; 
            border:none;
        }

        .loading {
            background-color: #ffffff;
            background-image: url("https://c.tenor.com/tEBoZu1ISJ8AAAAC/spinning-loading.gif");
            background-size: 60px 40px;
            background-position: right center;
            background-repeat: no-repeat;
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }

        .center{
            text-align: center;
        }

        .required {
            color: red;
        }

    </style>
</head>

<body>
    <div class="div-payroll_spt_format">
        <div class="div-title">
            <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="<?php echo e(url('/pictures/arrow-square-left.png')); ?>" alt="Back">
                <span class="title-text"><?php echo e(__('payroll_spt_format.list')); ?></span>
            </a>
        </div>
        <div class="div-form">
            <form id="spt_format_form" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">RINCIAN PENGHASILAN DAN PERHITUNGAN PPh PASAL 21 SEBAGAI BERIKUT :</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">JUMLAH RUPIAH</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label><u>PENGHASILAN BRUTO</u></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no1" name="no1" data-seq="1" data-toggle="modal"
                            data-target="#modal_spt_format">1 Gaji/PENSIUN ATAU THT/JHT </label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>1.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no2" name="no2" data-seq="2" data-toggle="modal"
                            data-target="#modal_spt_format">2 TUNJANGAN PPh</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>2.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no3" name="no3" data-seq="3" data-toggle="modal"
                            data-target="#modal_spt_format">3 TUNJANGAN LAINNYA, UANG LEMBUR, DAN SEBAGAINYA</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>3.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no4" name="no4" data-seq="4" data-toggle="modal"
                            data-target="#modal_spt_format">4 HONORARIUM DAN IMBALAN LAIN SEJENISNYA</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>4.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no5" name="no5" data-seq="5" data-toggle="modal"
                            data-target="#modal_spt_format">5 PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>5.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no6" name="no6" data-seq="6" data-toggle="modal"
                            data-target="#modal_spt_format">6 PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONG PPh PASAL 21</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>6.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no7" name="no7" data-seq="7" data-toggle="modal"
                            data-target="#modal_spt_format">7 TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>7.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">8 JUMLAH PENGHASILAN BRUTO (1 S.D. 7)</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">8.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">99.999.999.999,99</label>    
                        </div>            
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label><u>PENGURANGAN</u></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no9" name="no9" data-seq="9" data-toggle="modal"
                            data-target="#modal_spt_format">9 BIAYA JABATAN/BIAYA PENSIUN ATAS PENGHASILAN PADA ANGKA 7</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>9.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no10" name="no10" data-seq="10" data-toggle="modal"
                            data-target="#modal_spt_format">10 IURAN PENSIUN ATAU IURAN THT/JHT</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>10.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">11 JUMLAH PENGURANGAN (9 S.D. 10)</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">11.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label><u>PENGHITUNGAN PPh PASAL 21</u></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">12 JUMLAH PENGHASILAN NETO (8-11)</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">12.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no13" name="no13" data-seq="13" data-toggle="modal"
                            data-target="#modal_spt_format">13 PENGHASILAN NETO MASA SEBELUMNYA</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>13.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no14" name="no14" data-seq="14" data-toggle="modal"
                            data-target="#modal_spt_format">14 JUMLAH PENGHASILAN NETO UNTUK PENGHITUNGAN PPh PASAL 21 (SETAHUN/DISETAHUNKAN)</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>14.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">15 PENGHASILAN TIDAK KENA PAJAK</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">15.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">16 PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN (14-15)</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">16.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no17" name="no17" data-seq="17" data-toggle="modal"
                            data-target="#modal_spt_format">17 PPh PASAL 21 ATAS PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>17.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no18" name="no18" data-seq="18" data-toggle="modal"
                            data-target="#modal_spt_format">18 PPh PASAL 21 YANG TELAH DIPOTONG PADA MASA SEBELUMNYA</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>18.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label type="button" id="no19" name="no19" data-seq="19" data-toggle="modal"
                            data-target="#modal_spt_format">19 PPh PASAL 21 TERUTANG</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>19.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label>99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">20 PPh PASAL 21 DAN PPh PASAL 26 YANG TELAH DIPOTONG DAN DILUNASI</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">20.</label>
                        </div>
                    </div>
                    <div class="col-2 center">
                        <div class="form-group">
                            <label style="font-family:'Montserrat-Medium'">99.999.999.999,99</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_spt_format"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('payroll_spt_format.list')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modal_spt_format_form" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_no"><?php echo e(__('payroll_spt_format.label_column_no')); ?></label>
                                    <input class="form-control" id="column_no" name="column_no" 
                                    placeholder="<?php echo e(__('payroll_spt_format.label_column_no')); ?>" disabled>
                                </div>
                                <input type="text" class="form-control" id="column_no_hidden" name="column_no_hidden" hidden>
                                <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="field_name"><?php echo e(__('payroll_spt_format.label_field_name')); ?></label>
                                    <span class="required">*</span>
                                    <input class="form-control" id="field_name" name="field_name"
                                    placeholder="<?php echo e(__('payroll_spt_format.label_field_name')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="operator"><?php echo e(__('payroll_spt_format.label_operator')); ?></label>
                                    <select class="form-control select2" id="operator" name="operator"></select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <br>
                                    <button type="button" class="btn btn-primary" name="btn-add" id="btn-add">
                                        <?php echo e(__('payroll_spt_format.btn_add')); ?>

                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <br>
                                <button type="button" class="btn btn-primary" name="btn-plus" id="btn-plus">
                                    +
                                </button>
                                <button type="button" class="btn btn-primary" name="btn-min" id="btn-min">
                                    -
                                </button>
                                <button type="button" class="btn btn-primary" name="btn-star" id="btn-star">
                                    *
                                </button>
                                <button type="button" class="btn btn-primary" name="btn-slice" id="btn-slice">
                                    /
                                </button>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="field_label"><?php echo e(__('payroll_spt_format.label_field_label')); ?></label>
                                    <span class="required">*</span>
                                    <input class="form-control" id="field_label" name="field_label"
                                    placeholder="<?php echo e(__('payroll_spt_format.label_field_label')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="format"><?php echo e(__('payroll_spt_format.label_format')); ?></label>
                                    <select class="form-control select2" id="format" name="format">
                                        <option value="" disabled selected></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> <?php echo e(__('payroll_spt_format.btn_save')); ?></button>
                                    <button type="button" id="btn-remove" class="btn btn-danger w-25"><i 
                                    class="fa fa-times"></i> <?php echo e(__('payroll_spt_format.btn_remove')); ?></button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> <?php echo e(__('payroll_spt_format.btn_cancel')); ?></button>
                        </div>
                    </form>
                </div>
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
                    <span id="message-notification-error"><?php echo e($errors->first()); ?></span>
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
                        <img src="<?php echo e(url('/pictures/checklist-green-confirm-password.svg')); ?>" alt="Password">
                        <span class="title-text-notification"><?php echo e(__('payroll_report_format.alert_success')); ?></span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="<?php echo e(asset('js/jquery.inputpicker.js')); ?>"></script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURL')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURL', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURL');

        sessionStorage.removeItem('previousURL');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var operator = null;
        var isData = 0;

        $('#no1').on('click', function () {
            $("#column_no").val('1');
            $("#column_no_hidden").val('1');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                        loadDataFormat();
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no2').on('click', function () {
            $("#column_no").val('2');
            $("#column_no_hidden").val('2');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });
        
        $('#no3').on('click', function () {
            $("#column_no").val('3');
            $("#column_no_hidden").val('3');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no4').on('click', function () {
            $("#column_no").val('4');
            $("#column_no_hidden").val('4');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no5').on('click', function () {
            $("#column_no").val('5');
            $("#column_no_hidden").val('5');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no6').on('click', function () {
            $("#column_no").val('6');
            $("#column_no_hidden").val('6');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no7').on('click', function () {
            $("#column_no").val('7');
            $("#column_no_hidden").val('7');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no9').on('click', function () {
            $("#column_no").val('9');
            $("#column_no_hidden").val('9');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no10').on('click', function () {
            $("#column_no").val('10');
            $("#column_no_hidden").val('10');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no13').on('click', function () {
            $("#column_no").val('13');
            $("#column_no_hidden").val('13');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no14').on('click', function () {
            $("#column_no").val('14');
            $("#column_no_hidden").val('14');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no17').on('click', function () {
            $("#column_no").val('17');
            $("#column_no_hidden").val('17');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no18').on('click', function () {
            $("#column_no").val('18');
            $("#column_no_hidden").val('18');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#no19').on('click', function () {
            $("#column_no").val('19');
            $("#column_no_hidden").val('19');
            var column_no_hidden = $('#column_no_hidden').val();
            $.ajax({
                url: "<?php echo e(url('/payroll/spt_format/detail_data')); ?>",
                type: "GET",
                data: {
                    'columnNo' : column_no_hidden
                },
                success: function (response) {
                    isData = Object.keys(response).length;
                    $('#operator').val(null).trigger('change');
                    if (Object.keys(response).length !== 0) {
                        $('#record_function').val('Edit');
                        $('#field_name').val((typeof response[0].fieldName !== 'undefined') ? response[0].fieldName : '');
                        $('#field_label').val((typeof response[0].label !== 'undefined') ? response[0].label : '');
                        $('#format').val((typeof response[0].format !== 'undefined') ? response[0].format : '');
                    }
                    else {
                        $('#record_function').val('New');
                        $('#field_name').val("");
                        $('#field_label').val("");
                        $('#format').val("");
                    }
                },
                error: function (response) {
                    console.log(response);
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#operator').on('select2:select', function () {
            operator = $('#operator').val();
        });

        $('#btn-add').on('click', function () {
            if (typeof operator !== 'undefined' && operator !== null) {
                $('#field_name').val($('#field_name').val() + operator);
            }
        });

        $('#btn-plus').on('click', function () {
            $('#field_name').val($('#field_name').val() + '+');
        });

        $('#btn-min').on('click', function () {
            $('#field_name').val($('#field_name').val() + '-');
        });

        $('#btn-star').on('click', function () {
            $('#field_name').val($('#field_name').val() + '*');
        });

        $('#btn-slice').on('click', function () {
            $('#field_name').val($('#field_name').val() + '/');
        });

        loadDataOperator();
        loadDataFormat();

        function loadDataOperator() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.fieldName + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#operator').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Field Name</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#operator').select2({
                width: '100%',
                placeholder: 'Choose Field Name',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/field_name_salary_component/api')); ?>",
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
                                    text: item.fieldName,
                                    id: item.fieldName,
                                    title: item.description,
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

        function loadDataFormat() {
            var listFormat = [
                {id:"#,##0", text:"#,##0"},
                {id:"#,##0.00", text:"#,##0.00"}
            ];

            $('#format').select2({
                data : listFormat,
                width : '100%',
                placeholder : "Choose Format",
                allowClear : true
            });
        }

        $('#btn-remove').on('click', function () {
            $('#record_function').val('Remove');

            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $("#modal_spt_format_form").submit();
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#modal_spt_format_form").submit();
        });

        $("#btn-remove").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#modal_spt_format_form").submit();
        });

        if ($("#modal_spt_format_form").length > 0) {
            $("#modal_spt_format_form").validate({
            rules: {
                    field_name: {
                        required: true,
                    },
                    field_label: {
                        required: true,
                    },
                },
                messages: {
                    field_name: {
                        required: "<?php echo e(__('payroll_spt_format.field_mandatory')); ?>",
                    },
                    field_label: {
                        required: "<?php echo e(__('payroll_spt_format.field_mandatory')); ?>",
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
                    $("#btn-save").prop("disabled", false);
                    $("#btn-save").html(
                        '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_save")); ?>'
                    );

                    $("#btn-remove").prop("disabled", false);
                    $("#btn-remove").html(
                        '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_remove")); ?>'
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
                    $.ajax({
                        url: "<?php echo e(url('payroll/spt_format/proses')); ?>",
                        type: "POST",
                        data: $('#modal_spt_format_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_save")); ?>'
                                );

                                $("#btn-remove").prop("disabled", false);
                                $("#btn-remove").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_remove")); ?>'
                                );
                                
                                $('#modal_spt_format').modal('hide');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_save")); ?>'
                                );

                                $("#btn-remove").prop("disabled", false);
                                $("#btn-remove").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_remove")); ?>'
                                );

                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "<?php echo e(__('login.error')); ?>");
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $("#btn-save").prop("disabled", false);
                            $("#btn-save").html(
                                '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_save")); ?>'
                            );

                            $("#btn-remove").prop("disabled", false);
                            $("#btn-remove").html(
                                '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_remove")); ?>'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            });
        }

        if ($("#modal_spt_format_form").length > 0) {
            $("#modal_spt_format_form").validate({
            rules: {
                    field_name: {
                        required: true,
                    },
                    field_label: {
                        required: true,
                    },
                },
                messages: {
                    field_name: {
                        required: "<?php echo e(__('payroll_spt_format.field_mandatory')); ?>",
                    },
                    field_label: {
                        required: "<?php echo e(__('payroll_spt_format.field_mandatory')); ?>",
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
                    $("#btn-remove").prop("disabled", false);
                    $("#btn-remove").html(
                        '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_remove")); ?>'
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
                    $.ajax({
                        url: "<?php echo e(url('payroll/spt_format/proses')); ?>",
                        type: "POST",
                        data: $('#modal_spt_format_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-remove").prop("disabled", false);
                                $("#btn-remove").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_remove")); ?>'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "<?php echo e(url('payroll/spt_format')); ?>";
                                }, 3000);
                            } else {
                                $("#btn-remove").prop("disabled", false);
                                $("#btn-remove").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_remove")); ?>'
                                );

                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "<?php echo e(__('login.error')); ?>");
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $("#btn-remove").prop("disabled", false);
                            $("#btn-remove").html(
                                '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_spt_format.btn_remove")); ?>'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            });
        }
    });
</script>

</html>
<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/payroll/py_spt_format.blade.php ENDPATH**/ ?>