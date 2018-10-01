@extends('test_blade_file.2_child')

@section('parent_section')
	@parent   {{-- use only if we need to override parent section --}}
	<h1 class="brdr_Cls"> Grand Child text data </h1>
@endsection

@include('include_blade',['pass_data'=>'some text data'])
{{-- Include file load first as display in browser --}}

@each('notempty_blade',$names,'pass_data','empty_blade')
{{-- 
	first arg = view file that we need to repeat
	seconfd arg = variable on that perform foreach operation
	third arg = pass second arg data as key as variable name
	forth arg = if data is not found than load view as defined in forth arg
--}}

@stack('asd')