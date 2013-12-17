<?php namespace Fbf\LaravelFood;

class BaseController extends \BaseController {

	/**
	 * Redirects the user to the posted URL. This is the accessible handler for the mobile form
	 *
	 * @return
	 */
	public function redirector()
	{
		return \Redirect::to(\Input::get('url'));
	}

}
