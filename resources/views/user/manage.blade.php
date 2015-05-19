<?php
/**
 * manage.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

@extends('layout.default')

@section('title')
	{{ L('manage_user') }}
@stop

@section('style')

@stop

@section('navtitle') {{ L('manage_user') }} @stop

@section('content')
	<div class="header-section">
		<h2 class="ui header center aligned">
			<div class="content">
				{{ L('manage_user') }}
			</div>
		</h2>
	</div>

	<div class="ui section divider"></div>

	<div class="user-section">
		<table class="ui celled table" id="userTable">
			<thead>
				<tr>
					<th>{{ L('name') }}</th>
					<th>{{ L('email') }}</th>
					<th>{{ L('token') }}</th>
					<th>{{ L('operation') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td class="{{ isset($user->token->token) ? 'positive' : 'negative' }}">
							{{ isset($user->token->token) ? $user->token->token : '' }}
						</td>
						<td>
							@unless ($currentUser->id == $user->id)
								<div class="ui mini negative button delete-button" data-id="{{ $user->id }}">删除</div>
							@endunless
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="ui section divider"></div>

	<div class="token-section">
		<div class="segment">
			<h3 class="ui header">{{ L('token_unused') }}</h3>

			<table class="ui celled table" id="tokenTable">
				<thead>
					<tr>
						<th>{{ L('token') }}</th>
						<th>{{ L('operation') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tokens as $token)
						<tr>
							<td>{{ $token->token }}</td>
							<td>
								<div class="ui mini negative button delete-button" data-id="{{ $token->id }}">删除</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="ui blue button generate-token">{{ L('token_generate') }}</div>
		</div>
	</div>
@stop


@section('script')
	<script src="/js/app.js" type="text/javascript"></script>
@stop