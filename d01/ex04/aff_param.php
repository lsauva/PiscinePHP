#!/usr/bin/php
<?php 
    foreach ($argv as $value ) {
        if ($value != $argv[0]) {
            echo($value."\n");
        }
    }
?>
