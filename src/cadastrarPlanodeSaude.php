<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario();
?>

<html lang="pt-br">
<head>
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Menu Adminstrador</title>
		<link rel="stylesheet"  href="css/styleMenu.css">
        <link rel="stylesheet"  href="css/estiloCadastro.css">
		<style type="text/css">
  			fieldset {
    			  border: none;
    			  padding: 0;
  			}
  		</style><style type="text/css">

  		
  
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
<br><br>                        
  <form class="form-contact"  method="post" tabindex="1" > 
	  <h2 > Cadastrar Plano de Saúde </h2>
	  <br>
	  <fieldset >
       <legend><b>Nome Plano </b></legend>
	   <input class="form-contact-input" name="nomeP" placeholder="Nome Plano de Saúde" type="text" required>
	   </fieldset>
	   <fieldset >
	   <legend><b>Cobertura Plano </b></legend>
	   <input class="form-contact-input" name="cobertura" placeholder="Cobertura Plano" type="text" required>
       </fieldset>
       <fieldset >
	   <legend><b>Nome Hospital </b></legend>
	   <input class="form-contact-input" name="nomeH" placeholder="Nome Hospital" type="text" required>
       </fieldset>
       <fieldset >
	   <legend><b>Tipo de Visita </b></legend>
	   <input class="form-contact-input" name="tipo" placeholder="Tipo de Visita" type="text" required>
       </fieldset>
    <button  type="submit" class="form-contact-button" value="Cadastrar">Salvar</button>
	<br>  
  </form>
    
</div>



<?php
//verificar se clicou no botao
if(isset($_POST['nomeP']))
{
	$nomePlanodeSaude = addslashes($_POST['nomeP']);
    $cobertura =  addslashes($_POST['cobertura']);
    $nomeHospital =  addslashes($_POST['nomeH']);
    $tipo =  addslashes($_POST['tipo']);
	//verificar se esta preenchido
	if(!empty($nomePlanodeSaude) && !empty($cobertura) && !empty($nomeHospital) && !empty($tipo))
	{
		$u->conectar("engenharia2","localhost","admin","admin");
		if($u->msgErro == "")//se esta tudo ok
		{
				if($u->cadastrarPlanoSaude($nomePlanodeSaude,$cobertura,$nomeHospital,$tipo))
				{
					header("location: PlanodesaudeCadastrado.php");
					?>
					
					<?php
				}
				else
				{
					//header("location: Planodesaudejacadastrado.php");
					?>
			 	
					<?php
				}
			
		}
		else
		{
			?>
			<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro;?>
			</div>
			<?php
		}
	}else
	{
		?>
		<div class="msg-erro">
			Preencha todos os campos!
		</div>
		<?php
	}
}

?>














</body>
</html>