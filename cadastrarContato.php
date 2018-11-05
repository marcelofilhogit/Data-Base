<?php
    include_once 'DataBase.php';
    $link = conecta_banco();

    $nome = htmlspecialchars(addslashes($_POST['nome']));
    $email = htmlspecialchars(addslashes($_POST['email']));
    $telefone = htmlspecialchars(addslashes($_POST['telefone']));
    $mensagem = htmlspecialchars(addslashes($_POST['mensagem']));
    $contato_existe = 1;
    $contato_atendido = 0;

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i:s');

    $sql = "INSERT INTO compras.tb_contato (contato_existe, contato_atendido, nome, telefone, email, mensagem, data_cadastro, data_atendimento)
            VALUES ('$contato_existe', '$contato_atendido', '$nome', '$telefone', '$email', '$mensagem', '$data', '$data')";
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
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=contato.php'>
                    <script type=\"text/javascript\">
                        alert(\"Mensagem enviada com Sucesso!\");
                    </script>
                ";
            }

            else{
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=contato.php'>
                    <script type=\"text/javascript\">
                        alert(\"Mensagem não enviada com Sucesso, tente novamente se persistir o erro entre em contato com o admin! \");
                    </script>
                ";
            }
        ?>
    </body>
</html>
<?php pg_close($link); ?>
