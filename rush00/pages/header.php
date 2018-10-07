<html>
	<head>
		<title>Rush Boutique</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<link rel = "stylesheet" type = "text/css" href = "../rush.css"/>
	</head>
	<body>
		<header class = "header">
			<nav class = "container">
				<a class = "header-link" href = "/">Rush Boutique</a>
				<div class = "align-right">
<?php if ($user) { ?>
				<a class = "header-link" href = "/user/account"><?=$user['username']?></a>
<?php } else { ?>
				<a class = "header-link" href = "/login">Login</a>
				<a class = "header-link" href = "/register">Register</a>
<?php } ?>
				</div>
			</nav>
		</header>
<?php
?>
