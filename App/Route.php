<?php 

class Route
{

	private static $_methods = [];
	private static $_prefix = "";

	private function __construct(){}

	private static function addMethod(string $method){
		if(!isset(self::$_methods[$method])){
			self::$_methods[$method] = [];
		}
	}

	public static function prefix(string $prefix, closure $callback){
		self::$_prefix .= $prefix;
		$callback();
		self::$_prefix = rtrim(self::$_prefix, $prefix);
	}

	public static function __callStatic(string $name, array $args){
		$method = strtoupper($name);
		self::addMethod($method);

		$handler = explode("@", $args[1]);
		$uri = preg_replace("/@([\w]+)/", "([^\/]+)", preg_quote(self::$_prefix.$args[0], "/"));

		self::$_methods[$method][$uri] = [
			'class' => '\Controllers\\'.$handler[0],
			'handler' => $handler[1],
			'middleware' => null
		];

	}

	public static function API(){

	}

	public static function exec(){
		$uri = $_SERVER["REQUEST_URI"];
		$uri = $uri == "/" ? $uri : $uri."/";
		$method = $_SERVER["REQUEST_METHOD"];

		foreach (self::$_methods[$method] as $pattern => $data)
		{
			if (preg_match("/^$pattern$/U", $uri, $match))
			{
				unset($match[0]);
				$class = new self::$_methods[$method][$pattern]['class']();
				call_user_func_array(array($class, self::$_methods[$method][$pattern]['handler']), $match);
				return;
			} 
		}
		Request::error(404);
	}
}