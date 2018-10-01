@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Subject</h3>
                        <a href="{{url('')}}/subject/create" class="float-right"><button>Add Subject</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <th>Index</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @forelse($subjects as  $subject)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $subject->code }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td><a href="subject/{{$subject->id}}/edit">Edit</a>|
                                            <a href="javascript:void(0);" onclick="delete_call('subject/{{$subject->id}}')">Delete</a>
                                            <form action='subject/{{$subject->id}}' method="post" style="display: inline;">
                                                {{csrf_field()}}
                                                {{method_field('delete')}}
                                                <input type="submit" value="delete">
                                            </form>
                                        </td>
                                    </tr>
                                 <?php $i++; ?>
                                @empty
                                    <tr>
                                        <td>No Subject Found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
