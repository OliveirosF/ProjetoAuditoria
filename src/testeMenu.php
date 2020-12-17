<?php

require_once 'classes/usuarios.php';
include ('conexao.php');
$u = new Usuario();

$u->conectar("engenharia2","localhost","admin","admin");
echo "FAGNER";
if(isset($_POST['cpf'])){
  echo "FAGNER";
    if($u->msgErro == ""){
        // RECUPERA OS DADOS DE PACIENTE
        $cpf = addslashes($_POST['cpf']);
        $query1 = "SELECT cpf,nome,planosaude FROM paciente where cpf= '$cpf' ";
        $result_query1 = mysqli_query($conn,$query1);
        $dados = mysqli_fetch_array( $result_query1 );
        $nome = $dados['nome'];
        $planosaude = $dados['planosaude'];
        #if(strcmp($cpf1, $cpf) == 0){
         #   mysqli_close($conn);
            #header("location: teste.php");
            
        #}	
                
    }

echo "CPF = ", $cpf ;
}