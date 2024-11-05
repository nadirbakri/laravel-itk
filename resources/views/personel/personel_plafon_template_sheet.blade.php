<!DOCTYPE html>
<html>
    <head>
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
                    <th>Plafon Year *</th>
                    {{-- <th>Plafon Type *</th> --}}
                    <th>Plafon Code *</th>
                    <th>Plafon Status *</th>
                    <th>Nominal *</th>
                    <th>Ranking Code *</th>
                    @if($type === 'BUSINESSTRIP')
                        <th>Is Duty (Kedinasan / Non Kedinasan) *</th>
                    @endif
                </tr>
            </thead>
        </table>
    </body>
</html>