<?php

require_once 'classes/usuarios.php';
include ('conexao.php');
$u = new Usuario();

$u->conectar("engenharia2","localhost","admin","admin");
$teste =$_POST['cpfn'] ;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cadastro Atentende</title>
        <link rel="stylesheet"  href="css/styleMenu.css">
        <link rel="stylesheet"  href="css/estiloCadastro.css">
		
		<style type="text/css">

  		
  
  			fieldset {
    			  border: none;
    			  padding: 0;
  			}
  		</style>


<title>Menu Atendente</title>
        <link rel="stylesheet"  href="css/styleMenu.css">
        <link rel="stylesheet"  href="css/estiloCadastro.css">
</head>
	<body>
		<input type="checkbox" id="bt_menu">
		<label for="bt_menu">&#9776;</label>
		<nav class="menu">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="AgendaMedico.php">Minha Agenda</a>
				</li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>

      
<div class="container" align= "center" >  
<br><br>                        
  <form class="form-contact"   method="post" tabindex="1" > 
  <br>
	  <h2 > Cadastrar Relatorio </h2>
	  <br>
	  <fieldset >
       <legend><b>Condição </b></legend>
	   <select class="form-contact-input" name="condicao">
  			<option value="valor1" >Alta</option>
  			<option value="valor2" >Internado</option>
		</select>
	   </fieldset>
	   <fieldset >
       <legend><b> Relatório Paciente </b></legend>
	   <textarea  class="form-contact-textarea" name="textoarea"></textarea>
	   </fieldset>
	   <input  type="hidden" name="cpfn" value="<?=$teste?>" >  
    <button  type="submit" class="form-contact-button">Enviar</button>  
  </form>
    
</div>





<?php

if($u->msgErro == ""){
		
	// RECUPERA OS DADOS DE PACIENTE
	
	$query1 = "SELECT cpf,nome,planosaude,hospital,auditor,diainternacao FROM internacao where cpf ='$teste' ";
	$result_query1 = mysqli_query($conn,$query1);
	$dados = mysqli_fetch_array( $result_query1 );
	$nome1 = $dados['nome'];
	$planosaude1 = $dados['planosaude'];
	$hospital1 = $dados['hospital'];
	$auditor1 = $dados['auditor'];
	$data1 = $dados['diainternacao'];

	// RECUPERA OS DADOS DE PLANO
	$query2 = "SELECT tipovisita FROM planodesaude where nome = '$planosaude1' ";
	$result_query2 = mysqli_query($conn,$query2);
	$dados2 = mysqli_fetch_array($result_query2);
	$tipovisita = $dados2['tipovisita'];

 	// DADOS PAGINA     
	$relatorio = isset($_POST['textoarea']);
	$condicao1 = isset($_POST['condicao']) ? $_POST['condicao'] : '';
		switch($condicao1){
			case 'valor2':  // internacao
				if ($tipovisita == 1){
					header("location: testeMenu.php");
					//$data = date('Y-m-d', strtotime("+1 days"));
				}
				
				if ($tipovisita == 3){
					header("location: testeMenu.php");
					//$data = date('Y-m-d', strtotime("+3 days"));
				}
				break;
			case 'valor1': // ALTA
				
				break;
		}
	
		
	
	// FAZER A PARTE DE UPDATE CASO INTERNACAO E EXCLUIR CASO ALTA E ADD NA TABELA RALATÓRIO OS DADOS
	
	
	
	



}
?>

</body>
</html> 