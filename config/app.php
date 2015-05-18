<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key'             => env('APP_KEY', 'SomeRandomString!!!'),
	'cipher'          => MCRYPT_RIJNDAEL_128,
	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	|
	| The application locale determines the default locale that will be used
	| by the translation service provider. You are free to set this value
	| to any of the locales which will be supported by the application.
	|
	*/

	'locale'          => env('APP_LOCALE', 'en'),
	/*
	|--------------------------------------------------------------------------
	| Application Fallback Locale
	|--------------------------------------------------------------------------
	|
	| The fallback locale determines the locale to use when the current one
	| is not available. You may change the value to correspond to any of
	| the language folders that are provided through your application.
	|
	*/

	'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
	/*
	|--------------------------------------------------------------------------
	| Application Public Configuration
	|--------------------------------------------------------------------------
	|
	| The public configuration determines the make your lumiki app to be public
	| to all visitors or to valid users only.
	|
	*/

	'public'          => env('APP_PUBLIC', false),
];
