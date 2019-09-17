<?php

use infrajs\config\Config;
use infrajs\load\Load;
use infrajs\access\Access;
use infrajs\ans\Ans;

if (!is_file('vendor/autoload.php')) {
    chdir('../../../'); //Согласно фактическому расположению файла
    require_once('vendor/autoload.php');
}

$ans = array();

$list = Access::cache('youtube.php', function () {
	$conf = Config::get('youtube');
	$key = $conf['key'];
	$service = 'https://www.googleapis.com/youtube/v3/videos?key='.$key.'&';
	
	$list = Load::loadJSON('~youtube.json');
	if(!$list['show']) return;
	foreach($list['list'] as &$d){
		$data = Load::loadJSON('-youtube/video.php?id='.$d['id']);
		$d = $data['data'];
	}
	return $list;
});
$ans['list'] = $list['list'];
return Ans::ret($ans);
