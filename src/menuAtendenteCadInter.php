<?php
require_once 'classes/usuarios.php';
$u = new Usuario();


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cadastro Atentende</title>
        <link rel="stylesheet"  href="css/styleMenu.css">
        <link rel="stylesheet"  href="css/estiloCadastro.css">
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

  <form class="form-contact" action="cadInternacao.php" method="POST" >
  <br><br> 
	  <h2 > DIGITE O CPF DO CLIENTE</h2>
	   <br>
	   <input placeholder="000.000.000-00" class="form-contact-input" name="cpf" type="text" maxlength="14" size="40" onkeypress="formatar_mascara(this,'###.###.###-##')" required>
	  
	<br> 
	 <button  type="submit" class="form-contact-button">Pesquisar</button>
	 <br>  
  </form>
    
</div>

<?php
include ('conexao.php');

if(isset($_POST['cpf']))
{
		$u->conectar("engenharia2","localhost","admin","admin");
		if($u->msgErro == "")
		{
				// RECUPERA OS DADOS DE PACIENTE
				$cpf = addslashes($_POST['cpf']);
				$query1 = "SELECT cpf FROM paciente where cpf= '$cpf' ";

				$result_query1 = mysqli_query($conn,$query1);
				$dados = mysqli_fetch_array( $result_query1 );
				$cpf1 = $dados['cpf'];

				if($query1->rowCount() > 0){
					if(strcmp($cpf1, $cpf) == 0){
					
						mysqli_close($conn);
						header("location: cadInternacao.php");
					}

					
					
				}else {
					header("location: InternacaoErro.php"); // NÃO ENCONTRADO
				}




					
						
		}
		

	}
?>
	</body>
</html>