#!/usr/bin/php
<?php
if (isset($argv) && isset($argv[1])) {
    # array_shift permet de depiler un element du tableau 
    # ICI le 1er elem du tab argv est son nom
    array_shift($argv);
    # search est la clef recherchee (1er param)
	$search = array_shift($argv);
	foreach ($argv as $arg) {
		list($index, $value) = explode(':', $arg);
		if ($index == $search)
			$e = $value;
	}
	echo ("$e\n");
}
# echo ("\n");
?>
