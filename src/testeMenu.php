<?php
require_once 'classes/usuarios.php';
$u = new Usuario();
include ('conexao.php');
$u->conectar("engenharia2","localhost","admin","admin");
$data1 = $_POST['dataI'];
$data2 = $_POST['dataF'];
echo $data1;
echo $data2;

$query1 = "SELECT *FROM relatorio where  datacad between ('$data1') and ('$data2') ";
$result_query1 = mysqli_query($conn,$query1);
while($dado = $result_query1->fetch_array()) { 
  
    echo $dado['nome']; 
}


?>




