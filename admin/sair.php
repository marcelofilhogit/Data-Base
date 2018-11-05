<?php
    session_start();
    unset($_SESSION['id_cliente']);
    header('Location: ../entrar.php');
?>
