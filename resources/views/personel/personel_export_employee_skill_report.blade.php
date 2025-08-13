<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_employee_skill_report.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <style type="text/css">
        * {
            box-sizing: border-box;
        }

        body {
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
                <th>No</th>
                <th>Employee No</th>
                <th>Employee Name</th>
                <th>Ability</th>
                <th>Skill Description</th>
                <th>Proficiency</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($data as $value)
                @php
                    $skills = is_array($value->skills ?? null) ? $value->skills : [];
                @endphp

                @if (count($skills))
                    @foreach ($skills as $s)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $value->employeeNo ?? '' }}</td>
                            <td>{{ $value->fullname ?? '' }}</td> {{-- << was fullName --}}
                            <td>{{ $s->ability ?? '' }}</td>
                            <td>{{ $s->skillDescription ?? '' }}</td> {{-- << was skilldescription --}}
                            <td>{{ $s->proficiency ?? '' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $value->employeeNo ?? '' }}</td>
                        <td>{{ $value->fullname ?? '' }}</td>
                        <td colspan="3" style="text-align:center">No skills</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
