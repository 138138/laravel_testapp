<html>
<head>
    <title>Alert file</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/mycss.css') }}" />
</head>

<body>
{{$pass_data}}
<div class="myclass">
    {{ $slot }}
    {{ $slotvar }}
    {{ $slotvar2 }}
</div>

@section('sidebar')
    This is the sidebar in alert.
@show

</body>
</html>