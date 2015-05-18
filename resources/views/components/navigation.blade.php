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
			Lumiki
		</a>
		<div class="subtitle item center">
			@yield('navtitle')
		</div>
		<div class="right menu">

			@if ($currentUser)
				<div class="ui teal buttons">
					<div class="ui pointing dropdown link item">
						<i class="icon file"></i> New <i class="dropdown icon"></i>
						<div class="menu">
							<a href="{{ route('doc.create') }}" class="item"><i class="edit icon"></i> New Document </a>
							<a href="{{ route('cate.create') }}" class="item"><i class="open folder outline icon"></i> New Category </a>
						</div>
					</div>
				</div>
				<span class="item">{{ $currentUser->name }}</span>
				<a href="{{ route('logout') }}" class="item"> Logout </a>
			@endif
		</div>
	</div>
</div>
<div class="navigation-space"></div>
