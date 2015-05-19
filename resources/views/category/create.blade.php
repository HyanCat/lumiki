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
	{{ L('new_category') }}
@stop

@section('style')

@stop

@section('navtitle') {{ L('new_category') }} @stop

@section('content')
	<div class="header-section">
		<h2 class="ui header">
			<i class="open folder outline icon"></i>
			<div class="content">
				{{ L('new_category') }}
			</div>
		</h2>
	</div>

	<div class="ui section divider"></div>

	<div class="ui form">
		<form action="{{ route('cate.store') }}" method="POST">

			<div class="field">
				<label>{{ L('name_colon') }}</label>
				<input type="text" name="name" placeholder="{{ L('name') }}">
			</div>

			<div class="field">
				<label>{{ L('slug_colon') }}</label>
				<input type="text" name="slug" placeholder="{{ L('slug') }}">
			</div>

			<input type="submit" class="ui green submit button" value="{{ L('confirm') }}"/>
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