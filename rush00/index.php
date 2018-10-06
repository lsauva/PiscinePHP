<?php

$_SESSION['login'] = $_GET['login'];

?>

<HTML>
<HEAD>
	<TITLE>Rushing</TITLE>
		<link rel="stylesheet" type="text/css" href="rush.css">
</HEAD>

<BODY style="background-color: white">
	<img class="img_title" src="./img/rush.png">
	<div class="horizontal">
		<div id="left">Votre porte-monnaie rush : 
			<?php
			if (isset($_SESSION['wallet']))
				echo $_SESSION['wallet'];
			else
				echo "0.00"; ?> &euro;<BR />
		</div>
		<div style="margin-right: 5vw;">Bienvenue 
			<?PHP 
			if (isset($_SESSION['login']))
				echo $_SESSION['login'];
			else
				echo "Invit&eacute;";?>
		</div>
		<div><?PHP 
			if (!isset($_SESSION['login'])){?>
				<div style="margin-right: 1vw">
					<div class="dropdown">
						<div class="dropbtn">Connectez-vous</div>
						<div class="dropdown-content">
							<p>Adresse e-mail<BR /><input style="margin : .3vw" type="text" name="login"/></p>
							<p>Mot de passe<input style="margin : .3vw" type="password" name="passwd"/></p>
							<input type="submit" name="submit" value="Connexion">
						</div>
					</div>
				<input type="submit" name="subscribe" value="Inscrivez-vous">
				</div>
		<?php }else { ?>
			<div style="margin-right: 3vw; margin-top: 2vw">//INSERER LIENGérer votre compte
			<?php } ?>
		</div>
	</div>
	<BR /><BR />
	Scrollbar categories<BR /><BR />
	Nouveautes<BR /><BR />
	Meilleures ventes<BR /><BR />

</BODY>
</HTML>