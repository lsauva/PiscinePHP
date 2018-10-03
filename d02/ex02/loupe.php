#!/usr/bin/php
<?PHP
function between($matches)
{
	return preg_replace("/$matches[1]/", strtoupper($matches[1]), $matches[0]);
}
function upper_text($matches)
{
	return preg_replace_callback("/>(.*)</sU", 'between', $matches[0]);
}
function title($matches)
{
	return preg_replace("/$matches[1]/", strtoupper($matches[1]), $matches[0]);
}
function upper_title($matches)
{
	return preg_replace_callback("/title=(\".+\")/sU", 'title', $matches[0]);
}
if (!file_exists($argv[1]))
	exit();
if ($argc == 2)
{
	$file = file_get_contents($argv[1]);
	$file = preg_replace_callback('/<a href=(.+)<\/a>/sU', 'upper_title', $file);
	$file = preg_replace_callback('/<a href=(.+)<\/a>/sU', 'upper_text', $file);
}
echo ($file);
?>
