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
	Lumiki -- Home
@stop

@section('style')

@stop

@section('navtitle') Lumiki @stop


@section('content')

	@foreach($categories as $category)
		<h3> {{ $category->name }} </h3>
		<ul class="doc-list ui segment">
			@foreach($category->docs as $doc)
				<li class="doc-item">
					<a href="{{ route('doc.show', ['id' => $doc->id]) }}"> {{ $doc->title }} </a>
				</li>
			@endforeach
		</ul>
	@endforeach

@stop


@section('script')
@stop