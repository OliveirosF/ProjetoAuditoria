<?php

require_once 'classes/usuarios.php';
include ('conexao.php');
$u = new Usuario();

$u->conectar("engenharia2","localhost","admin","admin");

if(isset($_POST['cpf'])){
    if($u->msgErro == ""){
        // RECUPERA OS DADOS DE PACIENTE
        $cpf = addslashes($_POST['cpf']);
        $query1 = "SELECT cpf,nome,planosaude FROM paciente where cpf= '$cpf' ";
        $result_query1 = mysqli_query($conn,$query1);
        $dados = mysqli_fetch_array( $result_query1 );
        $nome = $dados['nome'];
        $planosaude = $dados['planosaude'];

        // RECUPERA OS DADOS DE PLANO
        $query2 = "SELECT nome,cobertura,hospital,tipovisita FROM planodesaude where nome = '$planosaude' ";
        $result_query2 = mysqli_query($conn,$query2);
        $dados2 = mysqli_fetch_array($result_query2);
        $hospital = $dados2['hospital'];
        
         // RECUPERA OS DADOS DE HOSPITAL
         $query3 = "SELECT nome,auditor FROM hospital where nome = '$hospital' ";
         $result_query3 = mysqli_query($conn,$query3);
         $dados3 = mysqli_fetch_array($result_query3);
         $auditor = $dados3['auditor'];




    }


}






?>

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

  <form class="form-contact"  method="post" tabindex="1" >
  <br><br> 
	  <h2 > DADOS RECUPERADOS </h2>
      <br>
	   <input readonly value="<?php echo $dados['nome']; ?>" class="form-contact-input" name="name" method="post" type="text">
       <input readonly value="<?php echo $dados['cpf']; ?>" class="form-contact-input" name="cpf" method="post" type="text">
       <input readonly value="<?php echo $dados['planosaude']; ?>" class="form-contact-input" name="planodesaude" method="post" type="text">
       <input readonly value="<?php echo $dados2['hospital']; ?>" class="form-contact-input" name="hospital" method="post" type="text">
       <input readonly value="<?php echo $dados3['auditor']; ?>" class="form-contact-input" name="auditor" method="post" type="text">
       <input class="form-contact-input" value="<?php echo date('Y-m-d');?>" type="date"  name="data" required>
      
	<br> 
    <button  type="submit" class="form-contact-button">Internação</button>
	 <br>  
  </form>
    
</div>
    </body>
</html>
      