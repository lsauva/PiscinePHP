#!/usr/bin/php
<?php
    foreach ($argv as $value ) {
        if ($value != $argv[0]) {
            $tab = explode(' ', $value);
            //$tab = array_filter($tab);
            foreach ($tab as $value) {
                //echo("$value\n");
                $tab2[] = $value;
            }
        }
    }
    sort($tab2);
    foreach ($tab2 as $value) {
        echo("$value\n");
    }
?>
