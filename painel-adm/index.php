<?php
@session_start();
require_once('../conexao.php');
require_once('verificar.php');
$id_usuario = $_SESSION['id_usuario'];
$query = $pdo->query("SELECT * FROM usuarios WHERE id = '$id_usuario'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);     //---------RECUPERAR DADOS DO USUARIO  
$nome_usuario   = $res[0]['nome'];
$email_usuario  = $res[0]['email'];
$senha_usuario  = $res[0]['senha'];
$nivel_usuario = $res[0]['nivel'];
//MENUS DO PAINEL 
$menu1 = 'home';
$menu2 = 'clientes';
$menu3 = 'niveis';
$menu4 = 'usuarios';

if (@$_GET['pag'] == "") {
    $pag = $menu1;
} else {
    $pag = $_GET['pag'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../imagens/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <title> <?php echo $nome_sistema  ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../imagens/sisfinan.png"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?pag=<?php echo $menu1 ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastros
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu2 ?>"> Clientes</a></li>
                            <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu4 ?>"> Usuários</a></li>
                            <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu3 ?>"> Níveis de Usuários</a></li>

                    </li>
                </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                </ul>
                <div class="d-flex"  >
                    <img class="img-profile rounded-circle" src="../imagens/usuario.png" width="50px" height="50px">
                    <ul class="navbar-nav "  >
                        <li class="nav-item dropdown" >
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" mr-4 ">
                                <?php echo $nome_usuario; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">Editar Dados</a></li>

                                <li><a class="dropdown-item" href="#">Another any shit This</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../logout.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



    <div class="container-fluid mb-4  "  >
        <?php
        require_once($pag . '.php');
        ?>

    </div>

</body>

</html>

<!-- Modal -->
<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-perfil" method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome-usuario" placeholder="Nome" value="<?php echo $nome_usuario ?> ">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email-usuario" placeholder="Email" value="<?php echo $email_usuario ?> ">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Senha</label>
                        <input type="text" class="form-control" name="senha-usuario" placeholder="Senha" value="<?php echo $senha_usuario ?> ">
                    </div>
                    <div id="mensagem-perfil" align="center"> </div>
                    <input type="hidden" class="form-control" name="id-usuario" value="<?php echo $id_usuario ?> ">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil"> Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- Ajax para inserir ou editar dados -->
<script type="text/javascript">
    $("#form-perfil").submit(function() {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "editar-perfil.php",
            type: 'POST',
            data: formData,

            success: function(mensagem) {
                $('#mensagem-perfil').removeClass()
                if (mensagem.trim() == "Salvo com Sucesso!") {

                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar-perfil').click();
                    window.location = "index.php";

                } else {

                    $('#mensagem-perfil').addClass('text-danger')
                }

                $('#mensagem-perfil').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,

        });

    });
</script>