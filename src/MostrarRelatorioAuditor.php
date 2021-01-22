<?php
require_once 'classes/usuarios.php';
$u = new Usuario();
include ('conexao.php');
$u->conectar("engenharia2","localhost","admin","admin");

session_start();
$auditor = $_SESSION['login'] ;


$query2 = "SELECT nomec FROM usuarios where nome= '$auditor' ";
$result_query2 = mysqli_query($conn,$query2);
$dado2 = mysqli_fetch_array( $result_query2);
$nomec = $dado2['nomec'];    //nome auditor




$data1 = $_POST['dataI'];
$data2 = $_POST['dataF'];

$query1 = "SELECT *FROM relatorio where auditor = '$nomec' and datacad between ('$data1') and ('$data2') ";
$result_query1 = mysqli_query($conn,$query1);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      <style>
  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
    

<title>Menu Auditor</title>
        <link rel="stylesheet"  href="css/styleMenu.css">
        <link rel="stylesheet"  href="css/estiloCadastro.css">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" arc="bootstrap/js/jquery-3.5.1.min.js"  > </script>
        <script type="text/javascript" arc="bootstrap/js/bootstrap.min.js"  > </script>
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

        <div class="container" align= "center" >  
<br><br>
<form   >
<table class="table table-sm table-light table-responsive-xl  table table-hover">

        <tr> 
          <td><b>NOME</b></td> 
          <td><b>CPF</b></td> 
          <td><b>PLANO DE SAUDE</b></td> 
          <td><b>HOSPITAL</b></td> 
          <td><b>AUDITOR</b></td>
          <td><b>DATA</b></td>
          <td><b>CODIÇÃO</b></td>
          <td><b>RELATORIO</b></td>
        </tr>
        
        <?php while($dado = $result_query1->fetch_array()) { ?> 
        <tr> 
          <td><?php echo $dado['nome']; ?></td>
          <td><?php echo $dado['cpf']; ?></td> 
          <td><?php echo $dado['planodesaude']; ?></td>
          <td><?php echo $dado['hospital']; ?></td>
          <td><?php echo $dado['auditor']; ?></td> 
          <td><?php echo $dado['datacad'];  ?></td>
          <td><?php echo $dado['condicao'];  ?></td>
          <td><?php echo $dado['relatorio'];  ?></td>  
        </tr> 
        <?php } ?> 
      </table> 
</form>
  
</div>




	</body>
</html>
