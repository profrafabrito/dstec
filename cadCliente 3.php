<?php
	$dados = json_decode($_POST['dados']);

	$servidor = "sql303.infinityfree.com";
	$banco = "if0_36061125_sw2";
	$usuario = "if0_36061125";
	$senha = "etec2024";

	try{
		$conexao = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
		
		$sql = 'insert into cliente (nome,email) values(:nome,:email)';
		$declaracao = $conexao->prepare($sql);
		$declaracao->bindParam("nome",$dados->nome);
		$declaracao->bindParam("email",$dados->email);
		$resul = $declaracao->execute();		
		/*
		$sql = 'insert into cliente (nome,email) values("'.$dados->nome.'","'.$dados->email.'")';
		$declaracao = $conexao->prepare($sql);
		$resul = $declaracao->execute();
		*/
		if ($resul == 1){
			echo("Registro Inserido");
		} else {
			echo("Inserção Falhou");
		}
	} catch(PDOException $e) {
        echo("Falhou ".$e->getMessage());
	}
?>