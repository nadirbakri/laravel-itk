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
                    <th>{{ $column_a }} *</th>
                    <th>{{ $column_b }} *</th>
                    <th>{{ $column_c }}</th>
                    <th>{{ $column_d }}</th>
                    <th>{{ $column_e }}</th>
                    <th>{{ $column_f }}</th>
                    <th>{{ $column_g }}</th>
                    <th>{{ $column_h }}</th>
                    <th>{{ $column_i }}</th>
                    <th>{{ $column_j }}</th>
                    <th>{{ $column_k }}</th>
                    <th>{{ $column_l }}</th>
                </tr>
            </thead>
        </table>
    </body>
</html>