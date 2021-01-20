<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Menu Administrador</title>
		<link rel="stylesheet" href="css/styleMenu.css">
	</head>
	<body>
		<input type="checkbox" id="bt_menu">
		<label for="bt_menu">&#9776;</label>
		<nav class="menu">
			<ul>
				<li><a href="MenuAdmin.php">Home</a></li>
				<li><a href="#">Cadastrar</a>
					<ul>
						<li><a href="cadastrarUsuario.php">Cadastrar Usuario</a></li>
						<li><a href="cadastrarHospital.php">Cadastrar Hospital</a></li>
						<li><a href="cadastrarPaciente.php">Cadastrar Paciente</a></li>
						<li><a href="cadastrarPlanodesaude.php">Cadastrar Plano de Saúde</a></li>
					</ul>
				</li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>

		<div class="container" align= "center" >  

<form class="form-contact"  method="post" tabindex="1" >
<br><br> 
	<h2 > CPF JÁ CADASTRADO !! </h2>
	<br>  
</form>
  
</div>
	</body>
</html>