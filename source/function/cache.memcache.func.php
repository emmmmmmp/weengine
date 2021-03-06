<?php 
/**
 * MemCached缓存
 * 
 * [WeEngine System] Copyright (c) 2013 WE7.CC
 */
defined('IN_IA') or exit('Access Denied');

function cache_get($key, $namespace = '') {
	$file=$dir?"{$GLOBALS['config']['cache']['dir']}/{$dir}/{$file}":"{$GLOBALS['config']['cache']['dir']}/{$file}";
	if(!is_file($file)) return array();
	return $include?include $file:file_get_contents($file);
}

function cache_set($key, $data, $namespace = '') {
	if(!is_string($data))
		$data="<?php \r\ndefined('CURRENT_VERSION') or exit('Access Denied');\r\nreturn ".var_export($data, true).';';
	$file=$dir?"{$GLOBALS['config']['cache']['dir']}/{$dir}/{$file}":"{$GLOBALS['config']['cache']['dir']}/{$file}";
	return file_put($file,$data);
}

function cache_delete($key, $namespace = '') {
	$file=$dir?"{$GLOBALS['config']['cache']['dir']}/{$dir}/{$file}":"{$GLOBALS['config']['cache']['dir']}/{$file}";
	@unlink($file);
}

function cache_clean($namespace = '') {
	$dir=$dir?"{$GLOBALS['config']['cache']['dir']}/{$dir}":"{$GLOBALS['config']['cache']['dir']}";
	rmdirs($dir,true);
}
