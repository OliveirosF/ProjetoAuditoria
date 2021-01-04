<?php
require_once 'classes/usuarios.php';
$u = new Usuario();
include ('conexao.php');
$u->conectar("engenharia2","localhost","admin","admin");
$query1 = "SELECT  *  FROM internacao ";
$result_query1 = mysqli_query($conn,$query1);
session_start();
$auditor = $_SESSION['login'] ;

#echo $_POST['cpf'];

#$cpf = $_POST['cpf'];
  // RECUPERA OS DADOS DE PLANO
$query2 = "SELECT nome,cobertura,hospital,tipovisita FROM planodesaude where nome = 'TUDOCLEAN' ";
$result_query2 = mysqli_query($conn,$query2);
$dados2 = mysqli_fetch_array($result_query2);
$hospital = $dados2['hospital'];
$tipovisita = $dados2['tipovisita'];

if ($tipovisita == 3){
 echo $data = date('Y-m-d', strtotime("+1 days"));
  
#header("location: testeMenu.php");
}



?>


<Div   style = "padding: 100px 100px 10px ;"> 
<link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">@</span>
  </div>
  <input type="text" class="form-control" placeholder="Usuário" aria-label="Usuário" aria-describedby="basic-addon1">
</div>


