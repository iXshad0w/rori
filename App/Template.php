<?php


class Template
{
	private $_glyph = [
		"/\{\{([^\}]*)\}\}/" => "<?= $1; ?>",
		"/\{\!([^\}]*)\!\}/" => "<?= htmlspecialchars($1); ?>"
	];

	private function __construct(){}

	function parse(string $template) : string{
		$hash = hash('sha1', $template);
		$cache = __CACHE__.$hash.".php";
		if (!file_exists($cache) || filemtime($template) > filemtime($cache)) {
			$text = file_get_contents($template);
			foreach ($this->_glyph as $regex => $replace) {
				$text = preg_replace($regex, $replace, $text);
			}
			file_put_contents($cache, $text);
		}
		return $cache;
	}

	public static function view(string $view, array $data = []){
		$template = new self();
		foreach($data as $name => $value){
			$$name = $value;
		}
		require_once $template->parse(__VIEWS__.$view.".php");
	}
}

?>