<?php
/**
 * default.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>


@extends('layout.base')

@section('body')

	@yield('header')

	<div class="body container">
		@include('components.navigation')
		<div class="main-section container">
			@yield('content')
		</div>
	</div>

	<div class="ui section divider"></div>

	@yield('footer')

	@include('components.footer')

@stop
