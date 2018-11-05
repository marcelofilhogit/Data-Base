<?php
    require_once('../DataBase.php');
    $link = conecta_banco();

    //Recuperar o id da URL
    $id = htmlspecialchars(addslashes(isset($_GET['id']))) ? $_GET['id'] : null;
    $url = 'contato.php';

    //Validar o id e o coworking
    if(empty($id)){
        echo "ID não informados";
        exit;
    }

    $sqlApagarCompartilhado = "DELETE FROM compras.tb_contato WHERE id_contato = '$id';";
    $resultSQLApagarCompartilhado = pg_query($link, $sqlApagarCompartilhado);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
            if(pg_affected_rows($resultSQLApagarCompartilhado) != 0){
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
                    <script type=\"text/javascript\">
                        alert(\"Contato excluido com Sucesso!\");
                    </script>
                ";
            }

            else{
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
                    <script type=\"text/javascript\">
                        alert(\"Contato não excluido com Sucesso, tente novamente se persistir o erro entre em contato com o admin! \");
                    </script>
                ";
            }
        ?>
    </body>
</html>
<?php pg_close($link); ?>
