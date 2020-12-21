<?php
require_once 'classes/usuarios.php';
$u = new Usuario();
include ('conexao.php');
$u->conectar("engenharia2","localhost","admin","admin");
$query1 = "SELECT  *  FROM internacao ";
$result_query1 = mysqli_query($conn,$query1);
session_start();
$auditor = $_SESSION['login'] ;

echo $_POST['cpf'];

$cpf = $_POST['cpf'];
echo $cpf;
$query1 = "SELECT cpf,nome,planosaude FROM paciente where cpf ='$cpf' ";
$result_query1 = mysqli_query($conn,$query1);
$dados = mysqli_fetch_array( $result_query1 );
$nome = $dados['cpf'];

echo $nome;


?>


<Div   style = "padding: 100px 100px 10px ;"> 
<link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">@</span>
  </div>
  <input type="text" class="form-control" placeholder="Usuário" aria-label="Usuário" aria-describedby="basic-addon1">
</div>


