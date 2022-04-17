<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("vendor/autoload.php");

use \chriskacerguis\RestServer\RestController;

class Users extends RestController {

	function __construct()
	{
			parent::__construct();
	}

	public function index_get()
	{
		$users = [
			['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
			['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
		];

		$id = $this->get( 'id' );

		if ( $id === null )
		{
				// Check if the users data store contains users
				if ( $users )
				{
						// Set the response and exit
						$this->response( $users, 200 );
				}
				else
				{
						// Set the response and exit
						$this->response( [
								'status' => false,
								'message' => 'No users were found'
						], 404 );
				}
		}
		else
		{
			if ( array_key_exists( $id, $users ) )
			{
				$this->response( $users[$id], 200 );
			}
			else
			{
				$this->response( [
					'status' => false,
					'message' => 'No such user found'
				], 404 );
			}
		}
	}
}
