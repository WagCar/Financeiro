<?php
require_once("../../conexao.php");

$nivel  = $_POST['nivel' ];
$id =   @$_POST['id'   ];

//validar campos
$query = $pdo->query("SELECT * FROM niveis WHERE nivel = '$nivel' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];   
if ($total_reg > 0 and $id_reg != $id ) {
    echo 'Nível já cadastrado';
    exit();
}

$query = $pdo->prepare("INSERT INTO niveis SET nivel = :nivel");

$query->bindvalue(":nivel",  "$nivel"); 

$query->execute();
echo 'Salvo com Sucesso!';

?>