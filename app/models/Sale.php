<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Nicolaslopezj\Searchable\SearchableTrait;

class Sale extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use SearchableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sales';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
