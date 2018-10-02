#!/usr/bin/php
<?php
    if ($argc == 2) {
        $tab = explode(' ',$argv[1]);
        $tab = array_filter($tab);
        $str = implode(" ",$tab);
        echo("$str\n");
    }
?>
