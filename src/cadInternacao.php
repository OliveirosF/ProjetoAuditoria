<?php

require_once 'classes/usuarios.php';
include ('conexao.php');
$u = new Usuario();

$u->conectar("engenharia2","localhost","admin","admin");

if(isset($_POST['cpf'])){
    if($u->msgErro == ""){
        // RECUPERA OS DADOS DE PACIENTE
        $cpf = addslashes($_POST['cpf']);
        $query1 = "SELECT cpf,nome,planosaude FROM paciente where cpf ='$cpf' ";
        $result_query1 = mysqli_query($conn,$query1);
        $dados = mysqli_fetch_array( $result_query1 );
        $nome = $dados['nome'];
		$planosaude = $dados['planosaude'];
		

		if(isset($dados['cpf'])){
		}else {
			header("location: PacienteInexistente.php"); // NÃO ENCONTRADO
		}



        // RECUPERA OS DADOS DE PLANO
        $query2 = "SELECT nome,cobertura,hospital,tipovisita FROM planodesaude where nome = '$planosaude' ";
        $result_query2 = mysqli_query($conn,$query2);
        $dados2 = mysqli_fetch_array($result_query2);
		$hospital = $dados2['hospital'];
		$tipovisita = $dados2['tipovisita'];
        
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
		
		<style type="text/css">

  		
  
  			fieldset {
    			  border: none;
    			  padding: 0;
  			}
  		</style>



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
				<li><a href="index.php">Logout</a></li>
			</ul>
		</nav>

      
<div class="container" align= "center" >  
<br><br> 
  <form class="form-contact"  method="post" tabindex="1" > 
	  <h2 > DADOS RECUPERADOS </h2>
	  <br>
	  <fieldset >
       <legend><b>Paciente </b></legend>
	   <input  readonly value= "<?php  echo $dados['nome']; ?>" class="form-contact-input" name="name" method="post" type="text">
	   </fieldset>
	   <fieldset >
	   <legend><b>Cpf </b></legend>
	   <input readonly value="<?php echo $dados['cpf']; ?>" class="form-contact-input" name="cpf" method="post" type="text">
       </fieldset>
	   <fieldset>
       <legend><b>Plano de Saúde </b></legend>
	   <input readonly value="<?php echo $dados['planosaude']; ?>" class="form-contact-input" name="planodesaude" method="post" type="text">
       </fieldset>
	   <fieldset>
       <legend><b>Hospital </b></legend>
	   <input readonly value="<?php echo $dados2['hospital']; ?>" class="form-contact-input" name="hospital" method="post" type="text">
       </fieldset>
	   <fieldset>
       <legend><b>Auditor </b></legend>
	   <input readonly value="<?php echo $dados3['auditor']; ?>" class="form-contact-input" name="auditor" method="post" type="text">
       </fieldset>
	   <fieldset>
       <legend><b>Data </b></legend>
	   <input class="form-contact-input" value="<?php echo date('Y-m-d');?>" type="date"  name="data" required>
	   </fieldset>
    <button  type="submit" class="form-contact-button">Internação</button>  
  </form>
    
</div>

<?php
//verificar se clicou no botao

if(isset($_POST['name']))
{
	$nome = addslashes($_POST['name']);
	$cpf = addslashes($_POST['cpf']);
    $planosaude = addslashes($_POST['planodesaude']);
    $hospital = addslashes($_POST['hospital']);
    $auditor = addslashes($_POST['auditor']);
	$data = addslashes($_POST['data']);
	

	if ($tipovisita == 1){
		$data = date('Y-m-d', strtotime("+1 days"));
	}
	
	if ($tipovisita == 3){
		$data = date('Y-m-d', strtotime("+3 days"));
	}
	
	//verificar se esta preenchido
	if(!empty($nome) && !empty($cpf) && !empty($planosaude) && !empty($hospital) && !empty($auditor) && !empty($data))
	{
		$u->conectar("engenharia2","localhost","admin","admin");
		if($u->msgErro == "")//se esta tudo ok
		{
			
			if($u->cadastrarInternacao($nome,$cpf,$planosaude,$hospital,$auditor,$data)) 
			{
                    header("location: InternacaoCadastrada.php");
					?>
					<div id="msg-sucesso">
					
					</div>
                    
					<?php
			}
			else
			{
                    header("location: InternacaoErro.php");
					?>
					<div class="msg-erro">
						nome ja cadastrado!
					</div>
					<?php
			}
			
		}
		else
		{
			?>
			<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro;?>
			</div>
			<?php
		}
	}else
	{
		?>
		<div class="msg-erro">
			Preencha todos os campos!
		</div>
		<?php
	}
}

?>



















    </body>
</html>
      