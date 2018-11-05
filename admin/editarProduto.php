<?php
    require_once('../DataBase.php');
    $link = conecta_banco();

    $id = htmlspecialchars(addslashes($_POST['id_produto']));
    $codigo = htmlspecialchars(addslashes($_POST['codigo']));
    $nome = htmlspecialchars(addslashes($_POST['nome']));
    $preco = htmlspecialchars(addslashes($_POST['preco']));
    $quantidade = htmlspecialchars(addslashes($_POST['quantidade']));
    $url = 'index.php';


    $sql = "UPDATE compras.tb_produtos SET codigo = '$codigo', nome = '$nome', preco = '$preco', quantidade = '$quantidade' WHERE id_produto = '$id'";
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
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
                    <script type=\"text/javascript\">
                        alert(\"Produto editado com Sucesso!\");
                    </script>
                ";
            }

            else{
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
                    <script type=\"text/javascript\">
                        alert(\"Produto não editado com Sucesso, tente novamente se persistir o erro entre em contato com o admin! \");
                    </script>
                ";
            }
        ?>
    </body>
</html>
<?php pg_close($link); ?>
