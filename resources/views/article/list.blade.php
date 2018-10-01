<?php // print_r ($articles); ?>
@forelse($articles as $article)
	{{$article->id}}
	<a href="article/{{$article->id}}">{{$article->id}}</a><br>
@empty
@endforelse
