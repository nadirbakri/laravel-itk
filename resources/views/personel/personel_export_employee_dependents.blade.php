<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_employee_dependents.judul') }}</title>
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
                <th>Family Name</th>
                <th>Relation</th>
                <th>Birth Date</th>
                <th>Birth Place</th>
                <th>Gender</th>
                <th>Blood Type</th>
                <th>Family Card</th>
                <th>Occu</th>
                <th>Medical</th>
                <th>Payroll</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($data as $emp)
                <?php
                    $deps = is_array($emp->dependents ?? null) ? $emp->dependents : [];
                ?>
                @if (count($deps))
                    @foreach ($deps as $dep)
                        <tr>
                            <td style="text-align:center">{{ $no++ }}</td>
                            <td>{{ $emp->employeeNo ?? '' }}</td>
                            <td>{{ $emp->fullName ?? '' }}</td>
                            <td>{{ $dep->dependentName ?? '' }}</td>
                            <td>{{ $dep->relation ?? '' }}</td>
                            <td>
                                @if (!empty($dep->birthDate))
                                    {{ \Carbon\Carbon::parse($dep->birthDate)->format('Y-m-d') }}
                                @endif
                            </td>
                            <td>{{ $dep->birthPlace ?? '-' }}</td>
                            <td>{{ $dep->gender ?? '' }}</td>
                            <td>{{ $dep->bloodType ?? '' }}</td>
                            <td>{{ $dep->familyCardNumber ?? '' }}</td>
                            <td>{{ $dep->occupation ?? '' }}</td>
                            <td>{{ !empty($dep->flagMedical) ? 'Yes' : 'No' }}</td>
                            <td>{{ !empty($dep->payroll) ? 'Yes' : 'No' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td style="text-align:center">{{ $no++ }}</td>
                        <td>{{ $emp->employeeNo ?? '' }}</td>
                        <td>{{ $emp->fullName ?? '' }}</td>
                        <td colspan="10" style="text-align:center">No dependents</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
