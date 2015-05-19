<?php
/**
 * register.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.default')

@section('title')
	{{ L('register') }}
@stop

@section('style')

@stop

@section('navtitle') {{ L('register') }} @stop

@section('content')
	<div class="header-section">
		<h2 class="ui header center aligned">
			<div class="content">
				{{ L('register') }} {{ config('app.name') }}
			</div>
		</h2>
	</div>

	<div class="ui section divider"></div>

	<div class="login-section">
		<div class="ui form segment">
			<form action="{{ route('register.post') }}" method="POST">

				<div class="field">
					<div class="ui left icon input">
						<input type="text" name="email" placeholder="{{ L('email_address') }}">
						<i class="mail icon"></i>
					</div>
				</div>

				<div class="field">
					<div class="ui left icon input">
						<input type="text" name="name" placeholder="{{ L('name') }}">
						<i class="user icon"></i>
					</div>
				</div>

				<div class="field">
					<div class="ui left icon input">
						<input type="password" name="password" placeholder="{{ L('password') }}">
						<i class="lock icon"></i>
					</div>
				</div>

				<div class="field">
					<div class="ui left icon input">
						<input type="text" name="token" placeholder="{{ L('token') }}">
						<i class="info circle icon"></i>
					</div>
				</div>

				<div class="ui error message">
					<div class="header">Register Failed with Error.</div>
				</div>

				<input type="submit" class="ui fluid green submit button centered" value="{{ L('register') }}"/>
			</form>
		</div>
	</div>
@stop


@section('script')
@stop
