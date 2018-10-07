<?php
# on set les variables pour la connexion a la DB
$db_server = 'localhost';
$db_name = 'rush00';
$db_username = 'root';
$db_password = 'root42';

# on recupere les fonctions utiles
require('functions.php');

# on verifie si un user est connecte
$user = NULL;
# important pour avoir toutes les variables de session !!
session_start();
if (isset($_SESSION['user']))
	$user = $_SESSION['user'];
else
	$_SESSION['user'] = NULL;

# on prepare les pages a afficher
include('pages/header.php');



include('pages/footer.php');

?>
