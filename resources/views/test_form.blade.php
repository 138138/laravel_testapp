@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Test Form</h3>

                        <pre>
                        <?php
                            print_r($errors);
                        ?>
                        </pre>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{url('')}}/test_form_post">
                            
                            {{-- method_field('PUT') --}}

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="@if(old('name')){{old('name')}}@endif" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                <label for="first" class="col-md-4 control-label">Surname</label>
                                <input id="surname" type="text" class="form-control" name="surname" value="@if(old('surname')){{old('surname')}}@endif" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('roll_no') ? ' has-error' : '' }}">
                                <label for="roll_no" class="col-md-4 control-label">Roll No.</label>
                                <input id="roll_no" type="text" class="form-control" name="roll_no" value="@if(old('roll_no')){{old('roll_no')}}@endif" autofocus>

                                @if ($errors->has('roll_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roll_no') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                                <label for="language" class="col-md-4 control-label">Language.</label>
                                <input type="checkbox" name="language[]" value="Bike"> English &emsp;
                                <input type="checkbox" name="language[]" value="Car"> Hindi &emsp;
                                <input type="checkbox" name="language[]" value="Car"> Gujarati &emsp;
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                            Submit
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