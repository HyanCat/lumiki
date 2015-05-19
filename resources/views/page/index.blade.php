<?php
/**
 * index.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.default')

@section('title')
	{{ L('home') }}
@stop

@section('style')

@stop

@section('navtitle') @stop


@section('content')

	@foreach($categories as $category)
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
	@endforeach

@stop


@section('script')
@stop