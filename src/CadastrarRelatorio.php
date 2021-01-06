
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
  <br>
	  <h2 > Cadastrar Relatorio </h2>
	  <br>
	  <fieldset >
       <legend><b>Condição </b></legend>
	   <select class="form-contact-input" name="select">
  			<option value="valor1"selected>Alta</option>
  			<option value="valor2" >Internado</option>
		</select>
	   </fieldset>
	   <fieldset >
       <legend><b> Relatório Paciente </b></legend>
	   <textarea class="form-contact-textarea"></textarea>
	   </fieldset>
	   
    <button  type="submit" class="form-contact-button">Enviar</button>  
  </form>
    
</div>

<?php
//verificar se clicou no botao
$teste = $_POST['relatorio']; // CPF DO INDIVIO
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
      