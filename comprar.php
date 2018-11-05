<?php
    require_once('DataBase.php');
    $link = conecta_banco();

    $idCompra = htmlspecialchars(addslashes($_GET['id']));

    $sql = "SELECT * FROM compras.tb_produtos WHERE id_produto = '$idCompra';";
    $resultSQL = pg_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <?php include 'menu.php'; ?>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center">Comprar</h3>

                <div class="container"><br>

                    <div class="row justify-content-center mb-3">

                        <?php
                            while($rows = pg_fetch_assoc($resultSQL)){
                        ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <img src="<?php echo "admin/imgProdutos/".$rows['img']; ?>" class="rounded" width="100%">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title h1"> <?php echo $rows['nome']; ?></h5>
                                    Preço por unidade: R$ <?php echo $rows['preco']; ?><br>
                                    Quantidade Disponivel: <?php echo $rows['quantidade']; ?> unidade(s)<br>

                                    <span data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"
                                        class="btn btn-success verModal"
                                        id_produto="<?php echo $rows['id_produto']; ?>"
                                        codigo="<?php echo $rows['codigo']; ?>"
                                        nome="<?php echo $rows['nome']; ?>"
                                        preco="<?php echo $rows['preco']; ?>"
                                        quantidade="<?php echo $rows['quantidade']; ?>"
                                        img="<?php echo $rows['img']; ?>"
                                        data_cadastro="<?php echo $rows['data_cadastro']; ?>">

                                        <i class="fa fa-check" aria-hidden="true"></i> Finalizar Compra
                                    </span>

                                </div>
                            </div>

                        <?php
                            }
                        ?>

                    </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg2" id="verModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form enctype="multipart/form-data" method="POST" action="finalizarCompra.php">
                            <div class="modal-header">
                                <h4 class="modal-title">Finalizar Pedido</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row justify-content-center h3">
                                        Dados do Cliente
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Email:</label>
                                            <input type="text" name="email" class="form-control" required>
                                        </div>
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Senha:</label>
                                            <input type="password" class="form-control" name="senha" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row justify-content-center h3">
                                        Dados do Produto
                                        <input type="hidden" name="id_produto" id="id_produto">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <label class="h4">Codigo:</label>
                                            <span id="codigo"></span>
                                        </div>

                                        <div class=" col-md-6">
                                            <label class="h4">Produto:</label>
                                            <span id="nome"></span>
                                        </div>

                                        <div class=" col-md-6">
                                            <label class="h4">Preço por unidade:</label>
                                            <span id="preco"></span>
                                        </div>

                                        <div class=" col-md-6">
                                            <label class="h4">Quantidade disponivel:</label>
                                            <span id="quantidade"></span> Unidade(s)
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row justify-content-center h3">
                                        Quantidade Desejada
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row justify-content-center h3">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="quantidade" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Próximo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

            <script type="text/javascript">
                $('.verModal').click(function() {
                    var button = $(this);
                    $("#id_produto").val(button.attr("id_produto"));
                    $("#codigo").text(button.attr("codigo"));
                    $("#nome").text(button.attr("nome"));
                    $("#preco").text(button.attr("preco"));
                    $("#quantidade").text(button.attr("quantidade"));
                    $("#verModal").modal('show');
                    return;
                });
            </script>

        </div>
    </body>
    <?php include 'rodape.php'; ?>
</html>
