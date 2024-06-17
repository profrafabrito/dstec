<?php
	$dados = json_decode($_POST['dados']);

	$servidor = "sql303.infinityfree.com";
	$banco = "if0_36061125_sw2";
	$usuario = "if0_36061125";
	$senha = "etec2024";

	try{
		$conexao = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
		
		$sql = 'update cliente set nome = :nome, email = :email where id = :id';
		$declaracao = $conexao->prepare($sql);
		$declaracao->bindParam("id",$dados->id);
		$declaracao->bindParam("nome",$dados->nome);
		$declaracao->bindParam("email",$dados->email);
		$resul = $declaracao->execute();		
		
		if ($resul == 1){
			echo("Registro Alterado");
		} else {
			echo("Inserção Falhou");
		}
	} catch(PDOException $e) {
        echo("Falhou ".$e->getMessage());
	}
?>