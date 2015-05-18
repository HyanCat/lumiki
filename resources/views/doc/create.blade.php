<?php
/**
 * create.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.default')

@section('title')
	Lumiki -- New Document
@stop

@section('style')

@stop

@section('navtitle') New Document @stop

@section('content')
	<div class="header-section">
		<h2 class="ui header">
			<i class="edit icon"></i>
			<div class="content">
				New Document
			</div>
		</h2>
	</div>

	<div class="ui section divider"></div>

	<div class="ui form">
		<form action="{{ route('doc.store') }}" method="POST">

			<div class="ui selection dropdown field">
				<input type="hidden" name="category_id">
				<div class="text">Select Category</div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($categories as $cate)
						<div class="item" data-value="{{ $cate->id }}">{{ $cate->name }}</div>
					@endforeach
				</div>
			</div>

			<div class="field">
				<input type="text" name="title" placeholder="Title">
			</div>

			<div class="field">
				<textarea name="content" placeholder="Content ( Markdown language ) ..."></textarea>
			</div>

			<div class="field">
				<input type="text" name="tags" placeholder="Tags ( Seperate with comma or space ) ...">
			</div>

			<input type="submit" class="ui green submit button" value="Publish"/>
		</form>
	</div>

@stop


@section('script')
	<script src="http://cdn.bootcss.com/autosize.js/1.18.18/jquery.autosize.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('textarea').autosize();
		});
	</script>
@stop