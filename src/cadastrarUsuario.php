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
	  <h2 > Cadastrar Usuário </h2>
	  <br>
	  <fieldset >
       <legend><b>Nome Completo </b></legend>
	   <input class="form-contact-input" name="nomec" placeholder="Nome Completo" type="text" required>
	   </fieldset>
	   <fieldset >
	   <legend><b>Usuário </b></legend>
	   <input class="form-contact-input" name="nome" placeholder="Usuário" type="text" required>
       </fieldset>
	   <fieldset>
       <legend><b>Tipo </b></legend>
	   <input class="form-contact-input" name="tipo" placeholder="Tipo" type="tipo" required>
       </fieldset>
	   <fieldset>
       <legend><b>Senha </b></legend>
	   <input class="form-contact-input" name="senha" placeholder="Senha" type="password" required>
       </fieldset>
	   <fieldset>
       <legend><b>Confirmar Senha </b></legend>
	   <input class="form-contact-input" name="confSenha" placeholder="Confirmar Senha" type="password" required>
       </fieldset>
	   <fieldset>
    <button  type="submit" class="form-contact-button" value="Cadastrar">Salvar</button>  
  </form>
    
</div>



<?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$nomec = addslashes($_POST['nomec']);
	$tipo = addslashes($_POST['tipo']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes($_POST['confSenha']);
	//verificar se esta preenchido
	if(!empty($nomec) && !empty($nome) && !empty($tipo) && !empty($senha) && !empty($confirmarSenha))
	{
		$u->conectar("engenharia2","localhost","admin","admin");
		if($u->msgErro == "")//se esta tudo ok
		{
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome,$senha,$tipo,$nomec))
				{
					header("location: UsuarioCadastrado.php");
					?>
					
					<?php
				}
				else
				{
					header("location: UsuarioJaCadastrado.php");
					?>
					<div class="msg-erro">
						nome ja cadastrado!
					</div>
					<?php
				}
			}
			else
			{
				?>
				<div class="msg-erro">
					Senha e confirmar senha não correspondem
				</div>
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