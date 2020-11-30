<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cadastro Atentende</title>
        <link rel="stylesheet"  href="css/styleMenu.css">
        <link rel="stylesheet"  href="css/estiloCadastro.css">
	</head>
	<body>
		<input type="checkbox" id="bt_menu">
		<label for="bt_menu">&#9776;</label>
		<nav class="menu">
			<ul>
				<li><a href="menuAtendente.php">Home</a></li>
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
<div class="container" align= "center" >  

  <form action="#" class="form-contact" method="post" tabindex="1" >
  <br><br> 
	  <h2 > Cadastro Internação</h2>
	   <br>  
     <input  type="nome" class="form-contact-input" name="nome" placeholder="Nome Paciente" required />  
	 <input type="hospital" class="form-contact-input" name="hospital" placeholder="Hospital" required />
	 <select  class="form-contact-input" id="procedimento" name="procedimento">
          <option value="internacao">Internação</option>
          <option value="outro">Outro</option>
	</select>  
	<br> 
	 <button  type="submit" class="form-contact-button">Enviar</button>
	 <br>  
  </form>
    
</div> 
	</body>
</html>