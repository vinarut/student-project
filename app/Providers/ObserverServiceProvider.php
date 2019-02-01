<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Info;
use App\Observers\InfoObserver;

class ObserverServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Info::observe(InfoObserver::class);
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
