<?php 

# Substitua abaixo os dados, de acordo com o banco criado
$username = "admin"; 
$password = "admin"; 
$database = "engenharia2"; 
$servername = "localhost";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

# Executa a query desejada 
//$query = "SELECT * FROM usuarios"; 
//$result_query = mysqli_query($conn,$query); 

# Exibe os registros na tela 
//while ($row = mysqli_fetch_array( $result_query )) { 
//print $row['tipo'] . " -- " . $row['nome'] . " -- " . $row['senha'];

//}
//mysqli_close($conn);
/*include ('conexao.php');
$u = new Usuario();
$nome = 'fagner2';
$query1 = "SELECT tipo FROM usuarios where nome= '$nome' ";
$result_query1 = mysqli_query($conn,$query1);
$dados = mysqli_fetch_array( $result_query1 );
$tipo = $dados['tipo'];

echo $tipo;

*/


?>