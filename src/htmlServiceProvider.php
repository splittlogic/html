<?php

namespace splittlogic\html;

use Illuminate\Support\ServiceProvider;

class htmlServiceProvider extends ServiceProvider
{


	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'html');
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');

		if ($this->app->runningInConsole()) {
			$this->bootForConsole();
		}
	}


	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../config/html.php', 'html');

		$this->app->singleton('html', function ($app) {
			return new html;
		});
	}


	public function provides()
	{
		return ['html'];
	}


	protected function bootForConsole()
	{
		$this->publishes([
			__DIR__.'/../config/html.php' => config_path('html.php'),
		], 'html.config');
	}


}
