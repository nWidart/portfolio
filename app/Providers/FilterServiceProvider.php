<?php namespace Nwidart\Providers;

use Illuminate\Routing\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'Nwidart\Http\Filters\MaintenanceFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'Nwidart\Http\Filters\AuthFilter',
		'auth.basic' => 'Nwidart\Http\Filters\BasicAuthFilter',
		'csrf' => 'Nwidart\Http\Filters\CsrfFilter',
		'guest' => 'Nwidart\Http\Filters\GuestFilter',
	];

}