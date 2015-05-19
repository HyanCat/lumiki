<?php
/**
 * default.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>


<!DOCTYPE html>
<html lang="zh_CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name') }} -- @yield('title')</title>

	@yield('meta')


	<link href="http://cdn.bootcss.com/normalize/3.0.3/normalize.min.css" rel="stylesheet">
	<link href="http://cdn.bootcss.com/semantic-ui/1.12.2/semantic.min.css" rel="stylesheet">
	<link href="/css/app.css" rel="stylesheet">

	@yield('style')

</head>
<body>
<div class="body container">
	@include('components.navigation')
	<div class="main-section container">
		@yield('content')
	</div>
</div>

<div class="ui section divider"></div>

@include('components.footer')


<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/semantic-ui/1.12.2/semantic.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.ui.dropdown').dropdown();
		$('.ui.checkbox').checkbox();
		$('[data-content]').popup();
	});
</script>

@yield('script')

</body>
</html>