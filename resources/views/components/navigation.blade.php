<?php
/**
 * navigation.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/18.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>

<div class="navigation ui fixed transparent inverted main menu">
	<div class="inner container">
		<a href="{{ route('index') }}" class="title item">
			{{ config('app.name') }}
		</a>

		<div class="subtitle item center">
			@yield('navtitle')
		</div>
		<div class="right menu">
			@if ($currentUser)

				<span class="item">{{ $currentUser->name }}</span>

				<div class="ui teal buttons">
					<div class="ui pointing dropdown link item">
						<i class="icon add"></i> {{ L('new') }} <i class="dropdown icon"></i>
						<div class="menu">
							<a href="{{ route('doc.create') }}" class="item">
								<i class="file outline icon"></i> {{ L('new_document') }}
							</a>
							<a href="{{ route('cate.create') }}" class="item">
								<i class="open folder outline icon"></i> {{ L('new_category') }}
							</a>
						</div>
					</div>
				</div>

				@if ($currentUser->id == 1) // We assumed the founder's id is 1 here.
					<a href="{{ route('user.manage') }}" class="item" data-content="{{ L('manage_user') }}" data-variation="inverted">
						<i class="users icon"></i>
					</a>
				@endif

				<a href="{{ route('logout') }}" class="item" data-content="{{ L('logout') }}" data-variation="inverted">
					<i class="sign out icon"></i>
				</a>

			@else

				<a href="{{ route('login') }}" class="item">{{ L('login') }}</a>

				<a href="{{ route('register') }}" class="item">{{ L('register') }}</a>

			@endif
		</div>
	</div>
</div>
<div class="navigation-space"></div>
