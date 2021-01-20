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
  		</style>
          <script type="text/javascript">
			function formatar_mascara(src, mascara) {
 			var campo = src.value.length;
 			var saida = mascara.substring(0,1);
 			var texto = mascara.substring(campo);
 			if(texto.substring(0,1) != saida){

 				 src.value += texto.substring(0,1);
 				}
			}
		</script>
        
        
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
	  <h2 > Cadastrar Paciente </h2>
	  <br>
	  <fieldset >
       <legend><b>Nome Paciente </b></legend>
	   <input class="form-contact-input" name="nomeP" placeholder="Nome Paciente" type="text" required>
	   </fieldset>
	   <fieldset >
	   <legend><b>Cpf </b></legend>
	   <input placeholder="000.000.000-00" class="form-contact-input" name="cpf" type="text" maxlength="14" size="40" onkeypress="formatar_mascara(this,'###.###.###-##')" required>
       </fieldset>
       <fieldset >
	   <legend><b>Plano de Saude </b></legend>
	   <input class="form-contact-input" name="nomePlano" placeholder="Plano de Saude" type="text" required>
       </fieldset>
    <button  type="submit" class="form-contact-button" value="Cadastrar">Salvar</button>
    <br> 
  </form>
    
</div>



<?php
//verificar se clicou no botao
if(isset($_POST['nomeP']))
{
	$nomeP = addslashes($_POST['nomeP']);
    $cpf =  addslashes($_POST['cpf']);
    $planodesaude =  addslashes($_POST['nomePlano']);
	//verificar se esta preenchido
	if(!empty($nomeP) && !empty($cpf)&& !empty($planodesaude))
	{
		$u->conectar("engenharia2","localhost","admin","admin");
		if($u->msgErro == "")//se esta tudo ok
		{
				if($u->cadastrarPaciente($cpf,$nomeP,$planodesaude))
				{
					header("location: PacienteCadastrado.php");
					?>
					
					<?php
				}
				else
				{
					//header("location: PacientejaCadastrado.php");
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