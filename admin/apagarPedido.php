<?php
    require_once('../DataBase.php');
    $link = conecta_banco();

    //Recuperar o id da URL
    $id = htmlspecialchars(addslashes(isset($_GET['id']))) ? $_GET['id'] : null;


    //Validar o id e o coworking
    if(empty($id) && empty($coworking)){
        echo "ID não informados";
        exit;
    }

    $url = 'pedidos.php';


    $sql = "DELETE FROM compras.tb_pedidos WHERE id_pedido = '$id';";
    $resultSQL = pg_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
            if(pg_affected_rows($resultSQL) != 0){
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
                    <script type=\"text/javascript\">
                        alert(\"Pedido excluido com Sucesso!\");
                    </script>
                ";
            }

            else{
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
                    <script type=\"text/javascript\">
                        alert(\"Pedido não excluido com Sucesso, tente novamente se persistir o erro entre em contato com o admin! \");
                    </script>
                ";
            }
        ?>
    </body>
</html>
<?php pg_close($link); ?>
