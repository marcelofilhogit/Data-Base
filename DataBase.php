<?php
    function conecta_banco(){
        $con = pg_connect("host=localhost port=5432 dbname=db_compras user=postgres password=postgresql123") or die('Conexao Falou');
        return $con;
    }
?>
