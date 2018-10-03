#!/usr/bin/php
<?php
# Ordre de tri des caracteres confirmé par Ol sur le forum :
# https://forum.intra.42.fr/topics/1885/messages?page=1#34247
# abcdefghijklmnopqrstuvwxyz0123456789 !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~
# comportement attendu :
# >./ssap2.php %D a3 a1 "4?" _4 a+ ab 42 A2
# ab
# a1
# A2
# a3
# a+
# 42
# 4?
# %D
# _4
function custom_sort($s1,$s2)
{
	$cs1=strtolower($s1);
	$cs2=strtolower($s2);
	$ref="abcdefghijklmnopqrstuvwxyz0123456789 !\"\#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
    // for ($i=0; $i < min(strlen($cs2), strlen($cs1)); $i++) { 
    //     $p1 = strpos($ref, ord($cs1[$i]));
    //     $p2 = strpos($ref, ord($cs2[$i]));
    //     return ($p1 < $p2) ? -1 : 1;
    // }
    $i = 0;
    while ($i < strlen($cs2) || $i < strlen($cs1)) 
	{
		$poss1 = strpos($ref, ord($cs1[$i]));
		$poss2 = strpos($ref, ord($cs2[$i]));
		if ($poss1 < $poss2)
			return (-1);
		else if ($poss1 > $poss2)
			return (1);
		else
			$i++;
	}
}

foreach ($argv as $param ) {
    if ($param != $argv[0]) {
        $tab = explode(' ', $param);
        foreach ($tab as $param) {
            $tab_param[] = $param;
        }
    }
}
if ($tab_param) {
    usort($tab_param, "custom_sort");
    foreach ($tab_param as $mot) {
        echo("$mot\n");
    }
}
?>
