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
$nomec = $dado2['nomec'];




$query1 = "SELECT  *  FROM internacao where auditor = '$nomec' ORDER By diainternacao ";
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
    

		<title>Menu Atendente</title>
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
				<li><a href="#">Home</a></li>
				<li><a href="AgendaMedico.php">Minha Agenda</a>
				</li>
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>


        <div class="container" align= "center" >  
<br><br>
<form action="CadastrarRelatorio.php" method="post"  >
<table class="table table-sm table-dark table-responsive  table table-hover"> 
        <tr> 
          <td>NOME</td> 
          <td>CPF</td> 
          <td>PLANO DE SAUDE</td> 
          <td>HOSPITAL</td> 
          <td>AUDITOR</td>
          <td>DATA PARA VISITA</td>
        </tr> 
        <?php while($dado = $result_query1->fetch_array()) { ?> 
        <tr> 
          <td><?php echo $dado['nome']; ?></td>
          <td><?php echo $dado['cpf']; ?></td> 
          <td><?php echo $dado['planosaude']; ?></td>
          <td><?php echo $dado['hospital']; ?></td>
          <td><?php echo $dado['auditor']; ?></td> 
          <td><?php echo date('d/m/Y', strtotime($dado['diainternacao'])); ?></td> 
          <td>

          
          <button  type="submit" name="cpfn" value="<?=$dado['cpf']?>" >Relatorio</button>
          
          
          
          </td> 
        </tr> 
        <?php } ?> 
      </table> 
</form>
  
</div>















	</body>
</html>
