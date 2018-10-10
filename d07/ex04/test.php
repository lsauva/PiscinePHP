<?php

include_once('Lannister.class.php');
include_once('Jaime.class.php');
include_once('Tyrion.class.php');

class Stark {
}

class Cersei extends Lannister {
}

class Sansa extends Stark {
}

$j = new Jaime();
$c = new Cersei();
$t = new Tyrion();
$s = new Sansa();

$j->sleepWith($t); //Not even if I'm drunk !
$j->sleepWith($s); //Let's do this.
$j->sleepWith($c); //With pleasure, but only in a tower in Winterfell, then.

$t->sleepWith($j); //Not even if I'm drunk !
$t->sleepWith($s); //Let's do this.
$t->sleepWith($c); //Not even if I'm drunk !

?>
