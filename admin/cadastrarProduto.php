<?php
    include_once '../DataBase.php';
    $link = conecta_banco();

    $url = 'index.php';

    $codigo = htmlspecialchars(addslashes($_POST['codigo']));
    $nome = htmlspecialchars(addslashes($_POST['nome']));
    $preco = htmlspecialchars(addslashes($_POST['preco']));
    $quantidade = htmlspecialchars(addslashes($_POST['quantidade']));
    $dataCadastro = date("Y-m-d H:i:s");


    //Prepara Arquivo
    $arquivo_up = htmlspecialchars(addslashes($_FILES['arquivo']['name'])); //Pega o nome do arquivo
    $ext = pathinfo($arquivo_up);  //Pega a extensão do arquivo
    $extensao = strtolower($ext['extension']); //Pega a extensão do arquivo

    $dataNome = date('d-m-Y_H-i-s');
    $nomeImagem = $dataNome . "." . $extensao;

    $diretorio = "imgProdutos/";
    $fl_arquivo_ok = move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $nomeImagem); //Salvar Arquivo


    $sql = "INSERT INTO compras.tb_produtos
        (codigo, nome, preco, quantidade, img, data_cadastro)
        VALUES ('$codigo', '$nome', '$preco', '$quantidade', '$nomeImagem', '$dataCadastro');";
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
                        alert(\"Produto cadastrado com Sucesso!\");
                    </script>
                ";
            }

            else{
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>
                    <script type=\"text/javascript\">
                        alert(\"Produto não cadastrado com Sucesso, tente novamente se persistir o erro entre em contato com o admin! \");
                    </script>
                ";
            }
        ?>
    </body>
</html>
<?php pg_close($link); ?>
