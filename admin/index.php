<?php
    require_once('../DataBase.php');
    $link = conecta_banco();

    $sql = "SELECT * FROM compras.tb_produtos;";
    $resultSQL = pg_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt_BR">
    <body class="app sidebar-mini rtl">

        <?php include "menu.php"; ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-pie-chart"></i> Produtos</h1>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="tile">
                        <div class="row">
                            <div class="col-md-6">
                                Cadastrar novo produto:
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success col-md-12" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus" aria-hidden="true"></i> Novo</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form enctype="multipart/form-data" method="POST" action="cadastrarProduto.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Novo Produto</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class=" col-md-6">
                                                <label for="exampleInputEmail1">Codigo:</label>
                                                <input type="text" name="codigo" class="form-control" required>
                                            </div>
                                            <div class=" col-md-6">
                                                <label for="exampleInputEmail1">Nome:</label>
                                                <input type="text" name="nome" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class=" col-md-6">
                                                <label for="exampleInputEmail1">Preço:</label>
                                                <input type="text" name="preco" class="form-control" required>
                                            </div>
                                            <div class=" col-md-6">
                                                <label for="exampleInputEmail1">Quatidade:</label>
                                                <input type="text" name="quantidade" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"><br>
                                        <div class="row justify-content-center">
                                            <label for="exampleInputEmail1">Imagem:</label>
                                            <input class="form" name="arquivo" type="file" id="arquivo">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="row col-md-12">
                    <div class="col-md-12">
                        <div class="tile">
                            <div class="row text-center">
                                <div class="col-md-12 h3">
                                    Produtos Cadastrados
                                </div>
                            </div><br>
                            <div class="tile-body">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($rows = pg_fetch_assoc($resultSQL)){
                                        ?>

                                            <tr>
                                                <td><?php echo $rows['codigo']; ?></td>
                                                <td><?php echo $rows['nome']; ?></td>
                                                <td><?php echo $rows['preco']; ?></td>
                                                <td>
                                                    <span data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"
                                                        class="btn btn-success verModal"
                                                        id_produto="<?php echo $rows['id_produto']; ?>"
                                                        codigo="<?php echo $rows['codigo']; ?>"
                                                        nome="<?php echo $rows['nome']; ?>"
                                                        preco="<?php echo $rows['preco']; ?>"
                                                        quantidade="<?php echo $rows['quantidade']; ?>"
                                                        img="<?php echo $rows['img']; ?>"
                                                        data_cadastro="<?php echo $rows['data_cadastro']; ?>">

                                                        <i class="fa fa-eye" aria-hidden="true" ></i>
                                                    </span>

                                                    <span data-toggle="tooltip" data-placement="top" title="Editar" style="cursor:pointer;"
                                                        class="btn btn-primary editarModal"
                                                        id_produto="<?php echo $rows['id_produto']; ?>"
                                                        codigo="<?php echo $rows['codigo']; ?>"
                                                        nome="<?php echo $rows['nome']; ?>"
                                                        preco="<?php echo $rows['preco']; ?>"
                                                        quantidade="<?php echo $rows['quantidade']; ?>"
                                                        img="<?php echo $rows['img']; ?>"
                                                        data_cadastro="<?php echo $rows['data_cadastro']; ?>">

                                                        <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
                                                    </span>

                                                    <a data-toggle="tooltip" data-placement="top" title="Excluir" class="btn btn-danger" href="apagarProduto.php?id=<?php echo $rows['id_produto']; ?>">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="modal fade bd-example-modal-lg2" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form enctype="multipart/form-data" method="POST" action="editarProduto.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Produto</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <input type="hidden" name="id_produto" id="idEditar" class="form-control" required>

                                            <div class=" col-md-6">
                                                <label for="exampleInputEmail1">Codigo:</label>
                                                <input type="text" name="codigo" id="codigoEditar" class="form-control" required>
                                            </div>
                                            <div class=" col-md-6">
                                                <label for="exampleInputEmail1">Nome:</label>
                                                <input type="text" name="nome" id="nomeEditar" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class=" col-md-6">
                                                <label for="exampleInputEmail1">Preço:</label>
                                                <input type="text" name="preco" id="precoEditar" class="form-control" required>
                                            </div>
                                            <div class=" col-md-6">
                                                <label for="exampleInputEmail1">Quatidade:</label>
                                                <input type="text" name="quantidade" id="quantidadeEditar" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Editar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>


            <div class="modal fade bd-example-modal-lg2" id="verModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form enctype="multipart/form-data" method="POST" action="#">
                            <div class="modal-header">
                                <h4 class="modal-title">Ver Produto</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Codigo:</label>
                                            <input type="text" name="codigo" id="codigo" class="form-control" disabled>
                                        </div>
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Nome:</label>
                                            <input type="text" name="nome" id="nome" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Preço:</label>
                                            <input type="text" name="preco" id="preco" class="form-control" disabled>
                                        </div>
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Quatidade:</label>
                                            <input type="text" name="quantidade" id="quantidade" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"><br>
                                    <div class="row justify-content-center">
                                        <div class="container">
                                            <img src="" id="img" class="rounded" width="100%"><br>
                                        </div>
                                    </div>
                                </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>







            <script src="../js/jquery-3.2.1.min.js"></script>


            <script type="text/javascript">
                $('.verModal').click(function() {
                    var button = $(this);
                    $("#codigo").val(button.attr("codigo"));
                    $("#nome").val(button.attr("nome"));
                    $("#preco").val(button.attr("preco"));
                    $("#quantidade").val(button.attr("quantidade"));
                    $("#img").attr("src", "imgProdutos/" + button.attr("img"));
                    $("#verModal").modal('show');
                    return;
                });

                $('.editarModal').click(function() {
                    var button = $(this);
                    $("#idEditar").val(button.attr("id_produto"));
                    $("#codigoEditar").val(button.attr("codigo"));
                    $("#nomeEditar").val(button.attr("nome"));
                    $("#precoEditar").val(button.attr("preco"));
                    $("#quantidadeEditar").val(button.attr("quantidade"));
                    $("#editarModal").modal('show');
                    return;
                });
            </script>
        </main>

        <?php include 'rodape.php'; ?>
    </body>
</html>
