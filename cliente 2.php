<?php
//declaração
$servidor = "sql303.infinityfree.com";
$banco = "if0_36061125_sw2";
$usuario = "if0_36061125";
$senha = "etec2024";
$saida = "";

$dados = json_decode($_POST['x']);

try {    
    //entrada
    $conn = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha); 
    $sql = 'Select * from cliente where nome like "%'.$dados->valor.'%"';
    $declaracao = $conn->prepare($sql);
    $declaracao->execute();

    /*$sql = 'Select * from cliente where nome like "%:valor%"';
    $declaracao = $conn->prepare($sql);
    $declaracao->execute([":valor"=>"$dados->valor"]);*/


    /*$sql = 'Select * from cliente where nome like "% :valor %"';
    $declaracao = $conn->prepare($sql);
    $declaracao->bindParam(":valor",$dados->valor);
    $declaracao->execute();*/

    //processamento
    $tabela = $declaracao->fetchAll();
    $saida = json_encode($tabela);

    //saida    
    echo($saida);

} catch (PDOException $e) {
    echo("Falhou ".$e->getMessage());
}

?>