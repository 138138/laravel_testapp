@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Student</h3>
                        <a href="{{url('')}}/student/create" class="float-right"><button>Add Student</button></a>
                    </div>
                    <div class="card-body">
                        @if (session('success-add'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Added!</strong> {{ session('success-add') }}
                            </div>
                        @endif
                        @if (session('success-update'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Updated!</strong> {{ session('success-update') }}
                            </div>
                        @endif
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <th>Index</th>
                                    <th>Roll no.</th>
                                    <th>Name</th>
                                    <th>Marks</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @forelse($students as  $student)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $student->roll_no }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->marks }}</td>
                                        <td><a href="student/{{$student->id}}/edit">Edit</a>|
                                            <a href="javascript:void(0);" onclick="delete_call('student/{{$student->id}}')">Delete</a>
                                            <form action='student/{{$student->id}}' method="post" style="display: inline;">
                                                {{csrf_field()}}
                                                {{method_field('delete')}}
                                                <input type="submit" value="delete">
                                            </form>
                                        </td>
                                    </tr>
                                 <?php $i++; ?>
                                @empty
                                    <tr>
                                        <td>No Students Found.</td>
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
            <div class="col-md-2"></div>
        </div>
    </div>

    <script type="text/javascript">
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        //     }
        // });

        function delete_call(link)
        {
            // $.ajax({
            //     type: "DELETE",
            //     url: link,
            //     data:{
            //         "_token": "{{ csrf_token() }}"
            //         },
            //     success: function(result) {
            //         alert('asaas');
            //     }
            // });

            $.ajax({
                   type: 'DELETE',
                   url: link,
                   headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                   data: {"_token": "{{ csrf_token() }}"},

                   success: function (data) {
                          ajaxLoad('/student');
                   },
                   error: function (data) {
                         alert(data);
                   }
             });
        }        
    </script>
@endsection
