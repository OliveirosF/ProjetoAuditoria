<?php
require_once 'classes/usuarios.php';
$u = new Usuario();


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu Auditor</title>
        <link rel="stylesheet"  href="css/styleMenu.css">
        <link rel="stylesheet"  href="css/estiloCadastro.css">
        <style type="text/css">
  			fieldset {
    			  border: none;
    			  padding: 0;
  			}
  		</style>
          <style type="text/css">
             fieldset {
	        border: none;
	        padding: 0;
        }
        </style>
       
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
       <br><br>
<div class="container" align= "center" >  

  <form class="form-contact" action="MostrarRelatorioAuditor.php" method="POST"  tabindex="1" >
  <br><br> 
	  <h2 > INTERVALO DE TEMPO</h2>
       <fieldset >
       <legend><b>Data Inicio </b></legend>
	   <input  class="form-contact-input" name="dataI" type="date"required>
       </fieldset>
       <legend align= "left"><b>Data Fim </b></legend>
       <input  class="form-contact-input" name="dataF" type="date"required>
	   </fieldset>
	 <button  type="submit" class="form-contact-button">Pesquisar</button>
	 <br>  
  </form>
    
</div>
	</body>
</html>