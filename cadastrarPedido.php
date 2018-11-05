<?php
    include_once 'DataBase.php';
    $link = conecta_banco();

    $id_produto = htmlspecialchars(addslashes($_POST['id_produto']));
    $quantidade = htmlspecialchars(addslashes($_POST['quantidade']));
    $id_cliente = htmlspecialchars(addslashes($_POST['id_cliente']));

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i:s');

    $sql = "INSERT INTO compras.tb_pedidos (id_produto, id_cliente, quantidade, data_cadastro)
            VALUES ('$id_produto', '$id_cliente', '$quantidade', '$data')";
    $resultadoSQL = pg_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
            if(pg_affected_rows($resultadoSQL) != 0){
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
                    <script type=\"text/javascript\">
                        alert(\"Pedido realizado com Sucesso!\");
                    </script>
                ";
            }

            else{
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=finalizarCompra.php'>
                    <script type=\"text/javascript\">
                        alert(\"Pedido realizado com Sucesso, tente novamente se persistir o erro entre em contato com o admin! \");
                    </script>
                ";
            }
        ?>
    </body>
</html>
<?php pg_close($link); ?>
