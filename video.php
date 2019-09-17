<?php

use infrajs\config\Config;
use infrajs\load\Load;
use infrajs\access\Access;
use infrajs\ans\Ans;
use akiyatkin\boo\Cache;

$id = Ans::get('id');

if (!$id) return Ans::err($ans,'Требуется указать id');

$ans = array();

$data = Cache::func(function ($id) {
	$conf = Config::get('youtube');
	$key = $conf['key'];
	$service = 'https://www.googleapis.com/youtube/v3/videos?key='.$key.'&';
	
	$d=array('id'=>$id);

	$srcinfo = $service.'id='.$id.'&part=snippet';
	$data = file_get_contents($srcinfo);
	$data = Load::json_decode($data);
	if (empty($d['title'])) $d['title'] = $data['items'][0]['snippet']['localized']['title'];
	if (empty($d['description'])) $d['description'] = $data['items'][0]['snippet']['localized']['description'];
	if (empty($d['img'])) $d['img'] = $data['items'][0]['snippet']['thumbnails']['high']['url'];
	
	return $d;
	
}, array($id));

$ans['data'] = $data;
return Ans::ret($ans);
