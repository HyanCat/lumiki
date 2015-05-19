<?php
/**
 * pusher.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.base')

@section('body')

	@yield('sidebar')

	<div class="pusher">
		<div class="body container">
			@yield('header')
			<div class="main-section container">
				@yield('content')
			</div>

			<div class="ui section divider"></div>
			@yield('footer')

			@include('components.footer')

		</div>
	</div>

@stop
