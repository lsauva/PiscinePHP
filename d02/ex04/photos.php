#!/usr/bin/php
<?php
function getimg($url)
{
	$headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
    $headers[] = 'Connection: Keep-Alive';         
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
    $user_agent = 'Chrome/66.0 (compatible; MSIE 6.0; Windows NT 5.1)';         
    $process = curl_init($url);         
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);         
    curl_setopt($process, CURLOPT_HEADER, 0);         
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent);         
    curl_setopt($process, CURLOPT_TIMEOUT, 30);         
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
    $return = curl_exec($process);         
    curl_close($process);         
    return $return;     
}
if ($argc == 2)
{
	$url = $argv[1];
	preg_match('/(http[s]?:\/\/)([^\/]*)/', $url, $matches);
	$dir = $matches[2];
	if (file_exists($dir) == false)
		mkdir ($dir);
	$file = file_get_contents($argv[1]);
	$file = substr($file, strpos($file, "<body"));
	preg_match_all('/(?:<img [^>]*src=")([^"]+)/', $file, $matches);
	foreach ($matches[1] as $img_path) 
	{
		if ($img_path[0] == "/")
			$img_path = $url.$img_path;
		$img_url = $img_path;
		$img_name = basename($img_url);
		$img = getimg($img_url);
		file_put_contents("./".$dir."/".$img_name,$img);
	}
}
?>
