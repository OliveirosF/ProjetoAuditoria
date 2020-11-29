<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Menu Dropdown Responsivo</title>
		<link rel="stylesheet" href="css/styleMenu.css">
	</head>
	<body>
		<input type="checkbox" id="bt_menu">
		<label for="bt_menu">&#9776;</label>
		<nav class="menu">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Internação</a>
					<ul>
						<li><a href="menuAtendenteCadInter.php">Cadastrar</a></li>
						<li><a href="#">Arte Visual</a></li>
					</ul>
				</li>
				<li><a href="#">Contato</a></li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>
	</body>
</html>