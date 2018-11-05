<?php
    include_once 'DataBase.php';
    $link = conecta_banco();

    $email = htmlspecialchars(addslashes($_POST['email']));
    $senha = htmlspecialchars(addslashes($_POST['senha']));

    $sql = "SELECT * FROM compras.tb_clientes WHERE email = '$email' AND senha = '$senha'; ";
    $resultSQL = pg_query($link, $sql);

    if(pg_affected_rows($resultSQL)){
        $dadosUsuario = pg_fetch_array($resultSQL);

        if(isset($dadosUsuario['id_cliente'])){
            $_SESSION['id_cliente'] = $dadosUsuario['id_cliente'];
            header('Location: admin/');
        }

    }

    else {
        header('Location: entrar.php?erro=1');
    }


?>

<?php pg_close($link); ?>
