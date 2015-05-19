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

	<h3> {{ $category->name }} </h3>
	<div class="ui animated selection list">
		@foreach($category->docs as $doc)
			<a class="item" href="{{ route('doc.show', ['id' => $doc->id]) }}">
				<i class="text file outline icon"></i>
				<div class="content">
					{{ $doc->title }}
				</div>
			</a>
		@endforeach
	</div>

@stop


@section('script')
@stop

