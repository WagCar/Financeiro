<?php 
require_once("conexao.php");
$email = $_POST['email'];
$senha = $_POST['senha'];
 
$query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email and  senha = :senha ");
$query->bindvalue(":email", "$email"); 
$query->bindvalue(":senha", "$senha"); 
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

echo $total_reg;

?>