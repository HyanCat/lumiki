<?php
/**
 * show.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/18.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.default')

@section('title')
	{{ $category->name }}
@stop

@section('style')

@stop

@section('navtitle') {{ $category->name }} @stop


@section('content')

	<div class="ui breadcrumb">
		<a class="section" href="{{ route('index') }}"> {{ L('home') }} </a>
		<i class="right arrow icon divider"></i>
		<div class="active section">{{ $category->name }}</div>
	</div>

	<h2> {{ $category->name }} </h2>
	<ul class="doc-list">
		@foreach($category->docs as $doc)
			<li class="doc-item">
				<a href="{{ route('doc.show', ['id' => $doc->id]) }}"> {{ $doc->title }} </a>
			</li>
		@endforeach
	</ul>

@stop


@section('script')
@stop

