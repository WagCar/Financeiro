<?php
require_once("conexao.php");
//CRIANDO O USUARIO ADMINISTRADOR CASO NÃO EXISTA!
$query = $pdo->query("SELECT * FROM usuarios WHERE nivel = 'administrador'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if ($total_reg == 0) {
    $pdo->query("INSERT INTO usuarios SET nome   = '$nome_admin ', email='$email_admin',senha='$senha_admin', nivel='$nivel', genero='$genero'");  }


//CRIANDO O NÍVEL ADMINISTRADOR CASO NÃO EXISTA!
$query2 = $pdo->query("SELECT * FROM niveis WHERE nivel = 'administrador'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_reg2 = @count($res2);

    if ($total_reg2 == 0) {
        $pdo->query("INSERT INTO niveis SET nivel = '$nivel' ");  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="imagens/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!------ Bootstrap via CDN ---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href="css/estilo-login.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!------ Include the above in your HEAD tag ---------->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $nome_sistema  ?> </title>
</head>

<body class="bg-secondary">
    <div class="container">
        <div class="row">
            <div class="">
                <!-- <h1 class="text-center login-title">SISTEMA FINANCEIRO</h1>-->
                <div class="account-wall">
                    <!-- <img class="profile-img rounded-circle" src="imagens/logo_sisfinan.png" alt="" > -->
                    <!-- <h1 class="text-center login-title">SISTEMA FINANCEIRO</h1>  -->
                    <img src="imagens/logo_sisfinan.png" class="rounded mx-auto d-block" alt="...">

                    <form class="form-signin" method=post action="autenticar.php">
                        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required autofocus>

                        <input type="password" name="senha" class="form-control" placeholder="Senha"  requires  >

                        <div class="d-grid gap-2">
                            <button class="btn btn-sm btn-primary  " type="submit">
                                Entrar</button>
                        </div>

                        <div class="position-relative">
                            <a> Precisa de Ajuda? </a>
                        </div>

                        <div <a> Contacte o Administrador </a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>