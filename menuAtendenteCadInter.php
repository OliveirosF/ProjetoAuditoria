<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Menu Dropdown Responsivo</title>
        <link rel="stylesheet" href="css/styleMenu.css">
        <link rel="stylesheet" type="text/css" href="css/estiloCadastro.css">
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

       <br><br>
<div class="container">  
  <form action="#" class="form-contact" method="post" tabindex="1">  
     <input type="nome" class="form-contact-input" name="nome" placeholder="Nome Paciente" required />  
     <input type="medico" class="form-contact-input" name="medico" placeholder="Médico" required />  
     <input type="plano" class="form-contact-input" name="plano" placeholder="Plano de Saúde" /> 
     <input type="data" class="form-contact-input" name="data" placeholder="Data Internação" /> 
     <textarea class="form-contact-textarea" name="conteudo" placeholder="Deixe uma mensagem" required></textarea>  
     <button type="submit" class="form-contact-button">Enviar</button>  
  </form>  
</div> 
	</body>
</html>