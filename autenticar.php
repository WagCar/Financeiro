<?php 
require_once("conexao.php");
$email = $_POST['email'];
$senha = $_POST['senha'];
 
$query = $pdo->prepare("SELECT * FROM usuarios WHERE email = ':email' and  senha = ':senha' ");
$query->bindvalue(":email", "$email"); 
$query->bindvalue(":senha", "$senha"); 
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg == 0){ 
    $pdo->query("INSERT INTO usuarios SET nome   = '$nome_admin ', email='$email_admin',senha='$senha_admin', nivel='Administrador', genero='$genero'");    
}

?>