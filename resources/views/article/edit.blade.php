{{-- {{'create blade called'}} --}}

@extends('layouts.app');


@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">

				<div class="panel-heading">
					Edit Article
				</div>

				<div class="panel-body">
					
					<form action="../{{$article->id}}" method="POST">
						{{method_field('PUT')}}
						{{ csrf_field() }}

						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

						<div class="form-group">
							<label for="content">Content</label>
							<textarea name="content" class="form-control"></textarea>
						</div>

						<div class="checkbox">
							<label><input type="checkbox" name="live">Live</label>
						</div>
						
						<div class="form-group">
							<label for="post_on">Post on</label>
							<input class="form-control" type="datetime-local" name="post_on">
						</div>

						<input class="btn btn-success" type="submit" name="submit">
					</form>

				</div>

			</div>
		</div>
	</div>
@endsection
