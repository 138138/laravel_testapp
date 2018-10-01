@extends('layouts.master')

@section('content')

	<div class="container">

		<div class="row">
			<div class="col-md-3"></div>
    		<div class="col-md-6">
			  	<div class="card">
			    	<div class="card-header">
			    		<h3>Student</h3>
			    	</div>
				    <div class="card-body">
			    	  	<form method="POST" action="@if(isset($student)){{url('')}}/student/{{$student->id}} @else{{url('')}}/student @endif">
			    	  		@if(isset($student))
			                    {{method_field('PUT')}}
			                @endif

			                {{ csrf_field() }}

			                <div class="form-group{{ $errors->has('roll_no') ? ' has-error' : '' }}">
			                    <label for="roll_no" class="control-label">Roll No.</label>
		                        <input id="roll_no" type="text" class="form-control {{ $errors->has('roll_no') ? ' is-invalid' : '' }}" name="roll_no" value="@if(old('roll_no')){{old('roll_no')}}@elseif(isset($student)){{$student->roll_no}}@endif" required autofocus>

		                        @if ($errors->has('roll_no'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('roll_no') }}</strong>
		                            </span>
		                        @endif
			                </div>

			                <div class="form-group">
			                    <label for="name" class="control-label">Name</label>
			                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="@if(old('name')){{old('name')}}@elseif(isset($student)){{$student->name}}@endif" required autofocus>
			                    @if ($errors->has('name'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('name') }}</strong>
			                        </span>
			                    @endif
			                </div>

			                <div class="form-group">
			                    <label for="marks" class="control-label">Marks</label>
			                    <input id="marks" type="text" class="form-control {{ $errors->has('marks') ? ' is-invalid' : '' }}" name="marks" value="@if(old('marks')){{old('marks')}}@elseif(isset($student)){{$student->marks}}@endif">

			                    @if ($errors->has('marks'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('marks') }}</strong>
			                        </span>
			                    @endif
			                </div>
			                
			                <div class="form-group">
			                    <div class="col-md-6 col-md-offset-4">
			                        <button type="submit" class="btn btn-primary">
			                            @if(isset($student))
			                                Update
			                            @else
			                                Register
			                            @endif
			                        </button>
			                    </div>
			                </div>
				  		</form>
				    </div>
				    <div class="card-footer">
				    </div>
				</div>	
    		</div>
    		<div class="col-md-3"></div>
    	</div>
	</div>
@endsection