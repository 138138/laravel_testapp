@extends('blade_file')

@section('content')
	<h2>content section from child file</h2>
	<?= $data ?> <!-- echo with corephp  --> 
	{!! $data !!} <!--NON Escape HTML --> 
	{{ $data }}<br><!--Escape HTML this is secure way --> 
	@{{ $data }}<br> <!--Escape Blade format - use while needed for js - Ex. mustache --> 

	{{ isset($data1) ? $data1 : 'Not assigned' }}<br> <!-- simple check -->
	{{ $data1 or 'Not assigned' }}<br> <!-- blade check --> <!-- try with change $data1 to data -->

{{--
	@if($check)
	@elseif($check)
	@else
	@endif
--}}	

	@for($i=0;$i<=5;$i++)
		{{$i}} <br>
	@endfor


	@foreach($mydata as $var)
		{{$var}} 
	@endforeach <br>


	@forelse($mydata as $abc)
		{{$abc}} 
	@empty 					{{-- load empty while $mydata has no value --}}
		Data not found
	@endforelse <br>

@endsection

@push('css')
	<style type="text/css">
		.container{border: 1px solid red}
	</style>
@endpush

@push('js')
	<script src="myjquery.js"></script>
@endpush

<!-- @section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection -->

<hr>