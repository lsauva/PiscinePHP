#!/usr/bin/php
<?php
    foreach ($argv as $value ) {
        if ($value != $argv[0]) {
            $tab = explode(' ', $value);
            foreach ($tab as $value) {
                $tab2[] = $value;
            }
        }
    }
    sort($tab2);
    foreach ($tab2 as $value) {
        echo("$value\n");
    }
?>
