<?php
/**
 * show.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.default')

@section('title')
	{{ $document->title }}
@stop

@section('style')
	<link href="/css/markdown.css" rel="stylesheet"/>
@stop

@section('navtitle') {{ $document->title }} @stop


@section('content')
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
		<span class="item">
			<i class="user icon"></i>{{ $document->user->name }}
		</span>
		<span class="item">
			<i class="clock icon"></i>{{ $document->created_at }}
		</span>

		@if ($currentUser)
			<span class="right item">
				<a href="{{ route('doc.edit', ['id' => $document->id]) }}">
					<i class="edit icon"></i> {{ L('edit') }}
				</a>
			</span>
		@endif
	</div>

	<div class="doc-body markdown-body ui segment">
		{!! $document->body !!}
	</div>

@stop


@section('script')
@stop
