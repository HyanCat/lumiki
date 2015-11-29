<?php
/**
 * show.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.pusher')

@section('title')
	{{ $document->title }}
@stop

@section('style')
	<link href="/css/markdown.css" rel="stylesheet"/>
	<link href="https://cdn.bootcss.com/highlight.js/8.5/styles/tomorrow.min.css" rel="stylesheet"/>
@stop

@section('navtitle') {{ $document->title }} @stop

@section('sidebar')
	@include('components.tree')
@stop

@section('header')
	@include('components.navigation')
@stop

@section('content')

	<div class="ui animated fade button sidebar-trigger">
		<div class="visible content">
			<i class="icon list layout"></i>
		</div>
		<div class="hidden content">{{ L('catelog') }}</div>
	</div>

	<div class="ui breadcrumb">
		<a class="section" href="{{ route('index') }}"> {{ L('home') }} </a>
		<i class="right arrow icon divider"></i>
		<a class="section" href="{{ route('cate', ['slug' => $document->category->slug]) }}">
			{{ $document->category->name }}
		</a>
		<i class="right arrow icon divider"></i>
		<div class="active section">{{ $document->title }}</div>
	</div>

	<h2 class="ui header center aligned">
		{{ $document->title }}
	</h2>

	<div class="doc-meta ui menu">
		<span class="item gray">
			<i class="user icon"></i>{{ $document->user->name }}
		</span>
		<span class="item gray">
			<i class="clock icon"></i>{{ semanticDate($document->created_at) }}
		</span>
		@if ($currentUser)
			<a href="{{ route('doc.edit', ['id' => $document->id]) }}" class="right item gray">
				<i class="edit icon"></i> {{ L('edit') }}
			</a>
		@endif
	</div>

	<div class="doc-body markdown-body ui segment">
		{!! $document->body !!}
	</div>

	<div class="doc-tags ui menu">
		<span class="item gray">
			<i class="clock icon"></i>{{ L('updated_at') }}{{ semanticDate($document->updated_at) }}
		</span>
		<span class="item gray">
			<i class="tags icon"></i>
			@foreach($document->tags as $tag)
				@unless(empty($tag))
					<div class="ui label">{{ $tag }}</div>
				@endunless
			@endforeach
		</span>
		@if ($currentUser && $currentUser->id == $document->user_id)
			<form action="{{ route('doc.destroy', ['id' => $document->id]) }}" method="POST" name="deleteForm" class="right menu">
				<input type="hidden" name="_method" value="DELETE">
				<a href="javascript:document.deleteForm.submit();" class="item gray">
					<i class="delete icon"></i>
					{{ L('delete') }}
				</a>
			</form>
		@endif
	</div>
@stop

@section('script')
	<script src="https://cdn.bootcss.com/highlight.js/8.5/highlight.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('pre code').each(function(i, block) {
				hljs.highlightBlock(block);
			});
		});
	</script>
@stop
