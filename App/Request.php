<?php
class Request
{
	
	protected function __construct(String $key){

	}

	private static function allowHeaders(){
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: API_KEY, Content-Type");
	}

	public static function json(array $data = []){
		header('Content-Type: application/json');
		header("HTTP/1.0 200 Ok");
		echo json_encode($data);
		exit();
	}

	public static function error(int $code){
		header("HTTP/1.0 $code Not Found");
		exit();
	}

	public static function redirect(string $path){
		header("Location: $path");
		exit();
	}
}