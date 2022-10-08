<?php
require_once("../conexao.php");


$nome  = $_POST['nome-usuario' ];
$email = $_POST['email-usuario'];
$senha = $_POST['senha-usuario'];
$id =    $_POST['id-usuario'   ];

//valiar email 
$query = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_usu = $res[0]['id'];   
if ($total_reg > 0 and $id_usu != $id ) {
    echo 'Email já em uso, escolha outro!';
    exit();
}


$query = $pdo->prepare("UPDATE usuarios SET nome= :nome, email = :email , senha = :senha WHERE id = '$id' ");

$query->bindvalue(":nome",  "$nome"); 
$query->bindvalue(":email", "$email"); 
$query->bindvalue(":senha", "$senha"); 
$query->execute();
echo "Salvo com Sucesso!";

?>