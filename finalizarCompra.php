<?php
    require_once('DataBase.php');
    $link = conecta_banco();

    $idProduto = htmlspecialchars(addslashes($_POST['id_produto']));
    $email = htmlspecialchars(addslashes($_POST['email']));
    $senha = htmlspecialchars(addslashes($_POST['senha']));
    $quantidade = htmlspecialchars(addslashes($_POST['quantidade']));


    $sqlAuth = "SELECT * FROM compras.tb_clientes WHERE email = '$email' AND senha = '$senha'; ";
    $resultSQLAuth = pg_query($link, $sqlAuth);

    if(pg_affected_rows($resultSQLAuth)){
        while($rows = pg_fetch_assoc($resultSQLAuth)){
            $idCliente = $rows['id_cliente'];
        }

        $sql = "SELECT * FROM compras.tb_produtos where id_produto = '$idProduto';";
        $resultSQL = pg_query($link, $sql);
    }

    else {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
            <script type=\"text/javascript\">
                alert(\"E-mail e ou senha inválido(s)\");
            </script>
        ";
    }
?>

</script>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <?php require_once 'menu.php'; ?>
    <body>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <h1 class="text-center">Finalizar Compra</h1>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="cadastrarPedido.php">
                        <div class="row justify-content-center text-center form-group">
                            <div class="col-md-12">
                            </div>

                            <div class="col-md-12">
                                <p>E-mail: <?php echo $email; ?></p>

                                <?php while($rows = pg_fetch_assoc($resultSQL)){ ?>


                                    <p>
                                        <input type="hidden" name="id_produto" value="<?php echo $rows['id_produto']; ?>">
                                        <input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
                                        <input type="hidden" name="id_cliente" value="<?php echo $idCliente; ?>">
                                    </p>

                                    <p>Codigo do Produto: <?php echo $rows['codigo']; ?></p>
                                    <p>Nome do Produto: <?php echo $rows['nome']; ?></p>
                                    <p>Preço por unidade: <?php echo $rows['preco']; ?></p>
                                    <p>Quantidade Solicitada: <?php echo $quantidade; ?></p>
                                    <?php
                                        $valor = str_replace(',', '.', $rows['preco']);
                                        $total = $valor * $quantidade;
                                        $total = str_replace('.', ',', $total);
                                    ?>
                                    <p>Valor total: R$ <?php echo $total; ?></p>
                                <?php } ?>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success text-white">Finalizar</button>
                    </form>
                </div>
            </div>
        </div><br>
    </body>
    <?php include 'rodape.php'; ?>
</html>
