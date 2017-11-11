<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Quotes extends CI_Model
{

	// The data comes from http://www.imdb.com/title/tt0094012/
	// expressed using long-form array notaiton in case students use PHP 5.x
	var $data = array(
		'home'	 => array('page'	 => 'home', 'content'	 => 'this is home',),
		'fleet'	 => array('page'	 => 'fleet', 'content'	 => 'this is fleet'),
		'flight' => array('page'	 => 'flight', 'content'	 => 'this is flight'),
		'about'	 => array('page'	 => 'about', 'content'	 => 'this is about')
		
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();

		// inject each "record" key into the record itself, for ease of presentation
		foreach ($this->data as $key => $record)
		{
			$record['key'] = $key;
			$this->data[$key] = $record;
		}
	}

	// retrieve a single quote, null if not found
	public function get($which)
	{
		return  $this->data[$which];
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}

}
