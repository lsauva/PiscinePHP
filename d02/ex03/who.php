#!/usr/bin/php
<?php
	date_default_timezone_set('CET');
	$usr = get_current_user();
	$file = file_get_contents("/var/run/utmpx");
	$sub = substr($file, 1256);
	$tab = array();
	$typedef = 'a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad';
	while ($sub)
	{
		$array = unpack($typedef, $sub);
		if (strcmp(trim($array[user]), $usr) == 0 && $array[type] == 7)
		{
			$date = date("M j H:i", $array["time1"]);
			$line = trim($array[line]);
			$line = $line . " ";
			$usr_trim = trim($array[user]);
			$usr_trim = $usr_trim . " ";
			echo "$usr_trim  $line $date \n";
		}
		$sub = substr($sub, 628);
	}
?>
