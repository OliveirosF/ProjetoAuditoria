<?php

Class Usuario
{
	private $pdo;
	public $msgErro = "";//tudo ok

	public function conectar($nome, $host, $usuario, $senha)
	{
		global $pdo;
		global $msgErro;
		try 
		{
			$pdo = new PDO("mysql:dbname=".$nome,$usuario,$senha);
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
		}
	}

	public function cadastrar($nome, $senha, $tipo,$nomec)
	{
		global $pdo;
		//verificar se já existe o nome cadastrado
		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE nome = :n");
		$sql->bindValue(":n",$nome);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			return false; //ja esta cadastrado
		}
		else
		{
			//caso nao, Cadastrar
			$sql = $pdo->prepare("INSERT INTO usuarios (nome, senha, tipo,nomec) VALUES (:n, :s, :t, :h)");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":s",md5($senha));
			$sql->bindValue(":t",$tipo);
			$sql->bindValue(":h",$nomec);
			$sql->execute();
			return true; //tudo ok
		}
	}


	public function logar($nome, $senha)
	{
		global $pdo;
		//verificar se o email e senha estao cadastrados, se sim
		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE nome = :n AND senha = :s");
		$sql->bindValue(":n",$nome);
		$sql->bindValue(":s",md5($senha));
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			//entrar no sistema (sessao)
			$dado = $sql->fetch();
			session_start();
			$_SESSION['id_usuario'] = $dado['id_usuario'];
			//$tipo = $dado['tipo'];
			
			//if ($tipo == "medico"){ header("location: teste.php"); }    //tipo medico
			return true;	
		}
		else
		{
			return false;  //nao foi possivel logar
		}
	}

		// CADASTRAR HOSPITAL AJEITA AS FUNÇÕES
	public function cadastrarHospital($nomeHospital, $id_medico, $plano)
	{
		global $pdo;
		//verificar se já existe o nome cadastrado
		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE nome = :n");
		$sql->bindValue(":n",$nomeHospital);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			return false; //ja esta cadastrado
		}
		else
		{
			//caso nao, Cadastrar
			$sql = $pdo->prepare("INSERT INTO usuarios (nome, senha, tipo) VALUES (:n, :s, :t)");
			$sql->bindValue(":n",$nomeHospital);
			$sql->bindValue(":s",md5($senha));
			$sql->bindValue(":t",$tipo);
			$sql->execute();
			return true; //tudo ok
		}
	}

	public function cadastrarInternacao($nomePac, $cpf, $plano,$Hospital,$auditor,$date)
	{
		global $pdo;
		//verificar se já existe o nome cadastrado
		$sql = $pdo->prepare("SELECT cpf FROM internacao WHERE cpf = :n");
		$sql->bindValue(":n",$cpf);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			return false; //ja esta cadastrado
		}
		else
		{
			//caso nao, Cadastrar
			$sql = $pdo->prepare("INSERT INTO internacao (nome, cpf, planosaude,hospital,auditor,diainternacao ) VALUES (:n, :s, :t, :g, :h, :j)");
			$sql->bindValue(":n",$nomePac);
			$sql->bindValue(":s",$cpf);
			$sql->bindValue(":t",$plano);
			$sql->bindValue(":g",$Hospital);
			$sql->bindValue(":h",$auditor);
			$sql->bindValue(":j",$date);
			$sql->execute();
			return true; //tudo ok
		}
	}



}
?>