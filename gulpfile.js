var elixir = require('laravel-elixir');

elixir(function (mix) {
	mix.less('app.less');
	mix.copy('resources/assets/css/markdown.css', 'public/css');
});