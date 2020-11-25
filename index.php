<?php 
require_once 'classes/usuarios.php';
$u = new Usuario();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form method="POST"> 
				<img src="img/avatar.svg">
				<h2 class="title">Bem Vindo</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="name">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="senha">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
	<script type="text/javascript" src="js/main.js"></script>

<?php
if(isset($_POST['name']))
{
	$name = addslashes($_POST['name']);
	$senha = addslashes($_POST['senha']);
	
	
	if(!empty($name) && !empty($senha))
	{
		$u->conectar("engenharia2","localhost","admin","admin");
		if($u->msgErro == "")
		{
			if($u->logar($name,$senha))
			{
				// RECUPERA OS DADOS DO BANCO PARA O TIPO DE USUARIO LOGADO!
				header("location: menuAtendente.php");
				
						
			}
			else
			{
				?>
				<div class="msg-erro">
					Nome e/ou senha estão incorretos!
				</div>
				<?php
			}
		}
		else
		{
			?>
			<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro; ?>
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