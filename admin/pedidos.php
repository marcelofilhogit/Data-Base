<?php
    require_once('../DataBase.php');
    $link = conecta_banco();

    $sql = "SELECT p.id_pedido, p.quantidade, p.data_cadastro,
    pro.codigo, pro.nome, pro.preco,
    c.nome as cliente, c.telefone, c.email
    FROM compras.tb_pedidos p
    INNER JOIN compras.tb_produtos pro
    ON p.id_produto = pro.id_produto
    INNER JOIN compras.tb_clientes c
    ON p.id_cliente = c.id_cliente;";
    $resultSQL = pg_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt_BR">
    <body class="app sidebar-mini rtl">

        <?php include "menu.php"; ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-cart-plus"></i> Pedidos</h1>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="row col-md-12">
                    <div class="col-md-12">
                        <div class="tile">
                            <div class="row text-center">
                                <div class="col-md-12 h3">
                                    Pedidos Solicitados
                                </div>
                            </div><br>
                            <div class="tile-body">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Quantidade</th>
                                            <th>Data</th>
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
                                                <td><?php echo date("d/m/Y H:i:s", strtotime($rows['data_cadastro'])); ?></td>
                                                <td>
                                                    <span data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"
                                                        class="btn btn-success verModal"
                                                        id_pedido="<?php echo $rows['id_pedido']; ?>"
                                                        codigo="<?php echo $rows['codigo']; ?>"
                                                        nome="<?php echo $rows['nome']; ?>"
                                                        preco="<?php echo $rows['preco']; ?>"
                                                        quantidade="<?php echo $rows['quantidade']; ?>"
                                                        cliente="<?php echo $rows['cliente']; ?>"
                                                        telefone="<?php echo $rows['telefone']; ?>"
                                                        email="<?php echo $rows['email']; ?>"
                                                        data_cadastro="<?php echo $rows['data_cadastro']; ?>">

                                                        <i class="fa fa-eye" aria-hidden="true" ></i>
                                                    </span>

                                                    <a data-toggle="tooltip" data-placement="top" title="Excluir" class="btn btn-danger" href="apagarPedido.php?id=<?php echo $rows['id_pedido']; ?>">
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
            </div>


            <div class="modal fade bd-example-modal-lg2" id="verModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form enctype="multipart/form-data" method="POST" action="#">
                            <div class="modal-header">
                                <h4 class="modal-title">Ver Pedido</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row justify-content-center">
                                        <h3>Dados Produto</h3>
                                    </div>
                                </div>


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
                                            <label for="exampleInputEmail1">Preço por unidade:</label>
                                            <input type="text" name="preco" id="preco" class="form-control" disabled>
                                        </div>
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Quatidade Solicitada:</label>
                                            <input type="text" name="quantidade" id="quantidade" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-12 text-center justify-content-center">
                                            <label for="exampleInputEmail1">Preço Total</label>
                                            <span id="pecoTotal"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row justify-content-center">
                                        <h3>Dados Cliente</h3>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-12">
                                            <label for="exampleInputEmail1">Nome:</label>
                                            <input type="text" name="codigo" id="cliente" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Telefone:</label>
                                            <input type="text" name="nome" id="telefone" class="form-control" disabled>
                                        </div>
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">E-mail:</label>
                                            <input type="text" name="codigo" id="email" class="form-control" disabled>
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
                    $("#cliente").val(button.attr("cliente"));
                    $("#telefone").val(button.attr("telefone"));
                    $("#email").val(button.attr("email"));

//                    $("#precoTotal").val(parseFloat($("#preco").text().replace(",", ".")) * button.attr("quantidade"));

//                    $("#precoTotal").text(parseFloat($("#preco").text().replace(",", ".")));

                    $("#verModal").modal('show');
                    return;
                });
            </script>
        </main>

        <?php include 'rodape.php'; ?>
    </body>
</html>
