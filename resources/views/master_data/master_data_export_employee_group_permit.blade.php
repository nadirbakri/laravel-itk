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
            <th>Company Code</th>
            <th>Type</th>
            <th>Group Code</th>
            <th>Group Name</th>
            <th>Direct Superior Group Code</th>
            <th>Line Approval</th>
            <th>Delegate Group</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $value)
        <tr>
            <td>{{ $value->companyCode }}</td>
            <td>{{ $value->type }}</td>
            <td>{{ $value->groupCode }}</td>
            <td>{{ $value->groupName }}</td>
            <td>{{ $value->directSuperiorGroupCode }}</td>
            <td>{{ $value->lineApproval }}</td>
            <td>{{ $value->delegateGroup }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>