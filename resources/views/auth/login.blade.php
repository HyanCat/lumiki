<?php
/**
 * login.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/18.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.default')

@section('title')
	{{ L('login') }}
@stop

@section('style')

@stop

@section('navtitle') {{ L('login') }} @stop

@section('content')
	<div class="header-section">
		<h2 class="ui header center aligned">
			<div class="content">
				{{ L('login') }} Lumiki
			</div>
		</h2>
	</div>

	<div class="ui section divider"></div>

	<div class="login-section">
		<div class="ui form segment">
			<form action="{{ route('login.post') }}" method="POST">
				<div class="field">
					<label>{{ L('email') }}</label>
					<div class="ui left icon input">
						<input type="text" name="email" placeholder="{{ L('email_address') }}">
						<i class="user icon"></i>
					</div>
				</div>

				<div class="field">
					<label>{{ L('password') }}</label>
					<div class="ui left icon input">
						<input type="password" name="password" placeholder="{{ L('password') }}">
						<i class="lock icon"></i>
					</div>
				</div>

				<div class="inline field">
					<div class="ui checkbox">
						<input type="checkbox" name="remember" checked>
						<label>{{ L('remember_me') }}</label>
					</div>
				</div>

				<div class="ui error message">
					<div class="header">Login Failed with Error.</div>
				</div>

				<input type="submit" class="ui green submit button" value="{{ L('login') }}"/>
			</form>
		</div>
	</div>
@stop


@section('script')
@stop