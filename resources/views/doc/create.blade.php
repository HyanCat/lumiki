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
	{{ L('new_document') }}
@stop

@section('style')

@stop

@section('navtitle') {{ L('new_document') }} @stop

@section('content')
	<div class="header-section">
		<h2 class="ui header">
			<i class="file outline icon"></i>
			<div class="content">
				{{ L('new_document') }}
			</div>
		</h2>
	</div>

	<div class="ui section divider"></div>

	<div class="ui form">
		<form action="{{ route('doc.store') }}" method="POST">

			<div class="ui selection dropdown field">
				<input type="hidden" name="category_id">
				<div class="text"> {{ L('select_category') }} </div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($categories as $cate)
						<div class="item" data-value="{{ $cate->id }}">{{ $cate->name }}</div>
					@endforeach
				</div>
			</div>

			<div class="field">
				<input type="text" name="title" placeholder="{{ L('title') }}">
			</div>

			<div class="field">
				<textarea name="content" placeholder="{{ L('content') }} ( {{ L('markdown_lang') }} ) ..."></textarea>
			</div>

			<div class="field">
				<input type="text" name="tags" placeholder="{{ L('tags') }} ( {{ L('seperate_comma_space') }} ) ...">
			</div>

			<input type="submit" class="ui green submit button" value="{{ L('publish') }}"/>
		</form>
	</div>

@stop


@section('script')
	<script src="https://cdn.bootcss.com/autosize.js/1.18.18/jquery.autosize.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('textarea').autosize();
		});
	</script>
@stop