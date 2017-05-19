<?php

namespace Controllers;
use \Request;
use \Template;

use \Models\Example;

class SpelerController
{
	function get(){
		Template::view("index");
	}

	function post(){
		$name = $_POST['name'];
		$example = Example::insert($name);
		Request::redirect("/examples/");
	}

	function put(int $id){
		$name = $_POST['name'];
		$example = Example::update($id, $name);
		Request::json([
			'Update': true
		]);
	}

	function delete(int $id){
		$spelers = Example::delete($id);
		Request::json([
			'Delete': true
		]);
	}
}