<?php
    include_once 'DataBase.php';
    $link = conecta_banco();

    $nome = htmlspecialchars(addslashes($_POST['nome']));
    $telefone = htmlspecialchars(addslashes($_POST['telefone']));
    $email = htmlspecialchars(addslashes($_POST['email']));
    $senha = htmlspecialchars(addslashes($_POST['senha']));
    date_default_timezone_set('America/Sao_Paulo');
    $dataCadastro = date('Y-m-d H:i:s');


    $emailExiste = false;

    //verificar se o usuário já existe
    $sqlSelect = "SELECT * FROM compras.tb_clientes WHERE email = '$email';";
    if($resultSQLSelect = pg_query($link, $sqlSelect)){
        $dadosUsuario = pg_fetch_array($resultSQLSelect);
        if(isset($dadosUsuario['email'])){
            $emailExiste = true;
        }
    } else {
        echo 'Erro ao tentar localizar o registro de usuário';
    }


    if($emailExiste){
        $retorno_get = '';
        if($emailExiste){
            $retorno_get .= "erro_email=1&";
        }
        header('Location: cadastre-se.php?' . $retorno_get);
        die();
    }


    $sql = "INSERT INTO compras.tb_clientes (nome, telefone, email, senha, data_cadastro) VALUES ('$nome', '$telefone', '$email', '$senha', '$dataCadastro');";
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
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastre-se.php'>
                    <script type=\"text/javascript\">
                        alert(\"Cliente cadastrado com Sucesso!\");
                    </script>
                ";
            }

            else{
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadastre-se.php'>
                    <script type=\"text/javascript\">
                        alert(\"Cliente não cadastrado com Sucesso, tente novamente se persistir o erro entre em contato com o admin! \");
                    </script>
                ";
            }
        ?>
    </body>
</html>
<?php pg_close($link); ?>
