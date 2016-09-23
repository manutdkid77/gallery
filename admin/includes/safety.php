<?php

function __autoload($class_name){
	$class_name=strtolower($class_name);
	$path='includes/{$class_name}';
	if(file_exists($path))
		require_once($path);
	else
		die($class_name.'.php does not exist');
}

function redirect($url){
	header("Location: $url");
}

?>