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
	<div class="ui list">
		@foreach($category->docs as $doc)
			<div class="item">
				<i class="text file outline icon"></i>
				<div class="content">
					<a href="{{ route('doc.show', ['id' => $doc->id]) }}" class="header"> {{ $doc->title }} </a>
				</div>
			</div>
		@endforeach
	</div>

@stop


@section('script')
@stop

