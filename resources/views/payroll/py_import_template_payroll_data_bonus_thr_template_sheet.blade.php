<!DOCTYPE html>
<html>
    <head>
        <title>{{ __('payroll_import_data_from_excel.judul') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
        <style type="text/css">
            * { box-sizing: border-box; }
            body{
                margin-left: 30px;
                margin-right: 30px;
                margin-bottom: 25px;
                margin-top: 25px;
            }
        </style>
    </head>

    <body>
        <table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
            <thead>
                <tr>
                    <th>Employee No</th>
                    <th>Employee Name</th>
                    <th>Type (B/T)</th>
                    <th data-format="@">Process Date (YYYY-MM-DD)</th>
                    <th>Amount</th>
                    <th>Service Month</th>
                    <th>Performance Result</th>
                </tr>
            </thead>
        </table>
    </body>
</html>