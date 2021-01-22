<?php 
require_once 'classes/usuarios.php';
$u = new Usuario();
session_start();

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Menu Auditor</title>
		<link rel="stylesheet" href="css/styleMenu.css">
	</head>
	<body>
		<input type="checkbox" id="bt_menu">
		<label for="bt_menu">&#9776;</label>
		<nav class="menu">
			<ul>
				<li><a href="menuMedico.php">Home</a></li>
				<li><a href="AgendaMedico.php">Minha Agenda</a></li>
				<li><a href="menuPesquisaAuditor.php">Pesquisar</a></li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>
	</body>
</html>
