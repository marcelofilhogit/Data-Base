<?php
    require_once('../DataBase.php');
    $link = conecta_banco();

    $sqlContato = "SELECT * FROM compras.tb_contato WHERE contato_existe = '1' AND contato_atendido = '0';";
    $resultSQLContato = pg_query($link, $sqlContato);

    $sqlContatoAtendido = "SELECT * FROM compras.tb_contato WHERE contato_existe = '1' AND contato_atendido = '1';";
    $resultSQLContatoAtendido = pg_query($link, $sqlContatoAtendido);

?>


<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <link rel="ic_on" type="image/png" href="img/icone.png">
    </head>

    <body class="app sidebar-mini rtl">

        <?php include "menu.php"; ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-phone"></i> Contatos</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="row text-center">
                            <div class="col-md-12 h3">
                                Contatos Solicitados
                            </div>
                        </div><br>
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Data do Envio</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($rows = pg_fetch_assoc($resultSQLContato)){
                                    ?>

                                        <tr>
                                            <td><?php echo $rows['id_contato']; ?></td>
                                            <td><?php echo $rows['nome']; ?></td>
                                            <td><?php echo $rows['telefone']; ?></td>
                                            <td><?php echo date("d/m/Y H:i:s", strtotime($rows['data_cadastro'])); ?></td>
                                            <td>
                                                <span data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"
                                                    class="btn btn-primary verModal"
                                                    idContatoSolicitado="<?php echo $rows['id_contato']; ?>"
                                                    nomeContatoSolicitado="<?php echo $rows['nome']; ?>"
                                                    telefoneContatoSolicitado="<?php echo $rows['telefone']; ?>"
                                                    emailContatoSolicitado="<?php echo $rows['email']; ?>"
                                                    mensagemContatoSolicitado="<?php echo $rows['mensagem']; ?>"
                                                    dataContatoSolicitado="<?php echo $rows['data_cadastro']; ?>">

                                                    <i class="fa fa-eye" aria-hidden="true" ></i>
                                                </span>

                                                <a data-toggle="tooltip" data-placement="top" title="Atendido" class="btn btn-success" href="AtendidoContato.php?id=<?php echo $rows['id_contato']; ?>">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </a>

                                                <a data-toggle="tooltip" data-placement="top" title="Excluir" class="btn btn-danger" href="apagarContato.php?id=<?php echo $rows['id_contato']; ?>">
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

            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="row text-center">
                            <div class="col-md-12 h3">
                                Contatos Atendidos
                            </div>
                        </div><br>
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Data do Atendimento</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($rows = pg_fetch_assoc($resultSQLContatoAtendido)){
                                    ?>

                                        <tr>
                                            <td><?php echo $rows['id_contato']; ?></td>
                                            <td><?php echo $rows['nome']; ?></td>
                                            <td><?php echo $rows['telefone']; ?></td>
                                            <td><?php echo date("d/m/Y H:i:s", strtotime($rows['data_atendimento'])); ?></td>
                                            <td>
                                                <span data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"
                                                    class="btn btn-primary verModal"
                                                    idContatoSolicitado="<?php echo $rows['id_contato']; ?>"
                                                    nomeContatoSolicitado="<?php echo $rows['nome']; ?>"
                                                    telefoneContatoSolicitado="<?php echo $rows['telefone']; ?>"
                                                    emailContatoSolicitado="<?php echo $rows['email']; ?>"
                                                    mensagemContatoSolicitado="<?php echo $rows['mensagem']; ?>"
                                                    dataContatoSolicitado="<?php echo $rows['data_cadastro']; ?>">

                                                    <i class="fa fa-eye" aria-hidden="true" ></i>
                                                </span>

                                                <a data-toggle="tooltip" data-placement="top" title="Excluir" class="btn btn-danger" href="apagarContato.php?id=<?php echo $rows['id_contato']; ?>">
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

            <div class="modal fade bd-example-modal-lg2" id="verModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form enctype="multipart/form-data" method="POST" action="cadastrarCoworking.php">
                            <div class="modal-header">
                                <h4 class="modal-title">Ver Contato</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Nome:</label>
                                            <input type="text" class="form-control" id="nome" disabled="disabled">
                                        </div>
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Telefone:</label>
                                            <input type="text" class="form-control" id="telefone" disabled="disabled">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">E-mail:</label>
                                            <input type="text" class="form-control" id="email" disabled="disabled">
                                        </div>
                                        <div class=" col-md-6">
                                            <label for="exampleInputEmail1">Data do Envio:</label>
                                            <input type="text" class="form-control" id="data" disabled="disabled">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class=" col-md-12">
                                            <label for="exampleInputEmail1">Mensagem:</label>
                                            <textarea class="form-control" rows="5" id="mensagem" disabled="disabled"></textarea>
                                        </div>
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
                    $("#nome").val(button.attr("nomeContatoSolicitado"));
                    $("#telefone").val(button.attr("telefoneContatoSolicitado"));
                    $("#email").val(button.attr("emailContatoSolicitado"));
                    $("#mensagem").val(button.attr("mensagemContatoSolicitado"));
                    $("#data").val(button.attr("dataContatoSolicitado"));
                    $("#verModal").modal('show');
                    return;
                });
            </script>

        </main>

        <?php include 'rodape.php'; ?>
    </body>
</html>
