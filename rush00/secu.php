<?php
mysql_connect("localhost:/Users/lsauvage/Applications/Mamp/mysql/tmp/mysql.sock", "root", $_ENV['PASS']) or die('Error : '.mysql_error());

mysql_select_db("rush00");

$res = mysql_query("SELECT 1 FROM User WHERE nom = '" . mysql_real_escape_string($argv[1]) . "' and pass = '" . mysql_real_escape_string($argv[2]). "';");
$res = mysql_fetch_array($res);

if ($res == false)
    print "Wrong password\n";
else
    print "Good password\n";
?>
