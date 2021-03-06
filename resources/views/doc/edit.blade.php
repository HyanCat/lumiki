<?php
/**
 * edit.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.default')

@section('title')
	{{ L('edit_document') }}
@stop

@section('style')

@stop

@section('navtitle') {{ L('edit_document') }} @stop

@section('content')
	<div class="header-section">
		<h2 class="ui header">
			<i class="edit icon"></i>
			<div class="content">
				{{ L('edit_document') }}
			</div>
		</h2>
	</div>

	<div class="ui section divider"></div>

	<div class="ui form">
		<form action="{{ route('doc.update', ['id' => $document->id]) }}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<div class="ui selection dropdown field">
				<input type="hidden" name="category_id" value="{{ $document->category_id }}">
				<div class="text">{{ $document->category->name }}</div>
				<i class="dropdown icon"></i>
				<div class="menu">
					@foreach($categories as $cate)
						<div class="item {{ $document->category_id == $cate->id ? 'active' : '' }}" data-value="{{ $cate->id }}">{{ $cate->name }}</div>
					@endforeach
				</div>
			</div>

			<div class="field">
				<input type="text" name="title" placeholder="{{ L('title') }}" value="{{ $document->title }}">
			</div>

			<div class="field">
				<textarea name="content" placeholder="{{ L('content') }} ( {{ L('markdown_lang') }} ) ...">{{ $document->content }}</textarea>
			</div>

			<div class="field">
				<input type="text" name="tags" placeholder="{{ L('tags') }} ( {{ L('seperate_comma_space') }} ) ..." value="{{ $document->tags }}">
			</div>

			<input type="submit" class="ui green submit button" value="{{ L('update_it') }}"/>
		</form>
	</div>

@stop


@section('script')
	<script src="https://cdn.bootcss.com/autosize.js/1.18.18/jquery.autosize.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
			$('.ui.selection.dropdown').dropdown();
			$('textarea').autosize();
		});
	</script>
@stop
