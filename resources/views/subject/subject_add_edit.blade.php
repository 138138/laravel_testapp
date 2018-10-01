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
                        <form class="form-horizontal" method="POST" action="@if(isset($subject)){{url('')}}/subject/{{$subject->id}} @else{{url('')}}/subject @endif">
                            @if(isset($subject))
                                {{method_field('PUT')}}
                            @endif

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="code" class="col-md-4 control-label">Code</label>
                                <input id="code" type="text" class="form-control" name="code" value="@if(old('code')){{old('code')}}@elseif(isset($subject)){{$subject->code}}@endif" required autofocus>

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="@if(old('name')){{old('name')}}@elseif(isset($subject)){{$subject->name}}@endif" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if(isset($subject))
                                            Update
                                        @else
                                            Submit
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