<?php
require_once("../conexao.php");
require_once("verificar.php");
 
$pagina = 'niveis';

?>

<div class="col-md-12 mt-2 mb-3">
    <a data-bs-toggle="modal" data-bs-target="#modalForm" type="button" class="btn btn-sm btn-primary"> Novo Nível </a>
</div>

<div class="tabela"  >
    <table id="example" class="table table-striped table-hover table-bordered my-4" style="width:100%">

        <thead>
            <tr>
                <th>Nível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = $pdo->query("SELECT * FROM niveis order BY id ASC");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < @count($res); $i++) {
                foreach ($res[$i] as $key => $value) {
                }
            ?>
                <tr>
                    <td> <?php echo $res[$i]['nivel'] ?> </td>
                    <td>
                        <a href="#" title="Editar Registro">
                            <i class="bi bi-pencil-square text-primary "></i>
                        </a>
                        <a href="#" title="Excluir Registro">
                            <i class="bi bi-trash-fill text-danger"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal Form-->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <span id="tituloModal">  Inserir Registro (Novo Nível)</span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nível</label>
                        <input type="text" class="form-control" name="nivel" placeholder="Nível do Usuário" id= "nivel">
                    </div>
                   
                    <div id="mensagem" align="center"> </div>
                    <input type="text" class="form-control" name="id" id="id"  placeholder="aqui é o Id - TEM Q TIRAR DEPOS">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil"> Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- 
    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "ordering": false
        });
            });
</script>  
-->
 
<script src="<?php echo $pagina ?>/script.js">  </script> 

 



 