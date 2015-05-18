<?php
/**
 * create.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/18.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>


@extends('layout.default')

@section('title')
	Lumiki -- New Category
@stop

@section('style')

@stop

@section('navtitle') New Category @stop

@section('content')
	<div class="header-section">
		<h2 class="ui header">
			<i class="open folder outline icon"></i>

			<div class="content">
				New Category
			</div>
		</h2>
	</div>

	<div class="ui section divider"></div>

	<div class="ui form">
		<form action="{{ route('cate.store') }}" method="POST">

			<div class="field">
				<label>Name:</label>
				<input type="text" name="name" placeholder="name">
			</div>

			<div class="field">
				<label>Slug:</label>
				<input type="text" name="slug" placeholder="slug">
			</div>

			<input type="submit" class="ui green submit button" value="Confirm"/>
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