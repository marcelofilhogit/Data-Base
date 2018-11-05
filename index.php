<?php
    require_once('DataBase.php');
    $link = conecta_banco();

    $sql = "SELECT * FROM compras.tb_produtos;";
    $resultSQL = pg_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <?php include 'menu.php'; ?>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center">Produtos</h3>

                <div class="container"><br>

                    <div class="row justify-content-center mb-3">

                        <?php
                            while($rows = pg_fetch_assoc($resultSQL)){
                        ?>

                            <div onclick="location.href='comprar.php?id=<?php echo $rows['id_produto']; ?>';" class="card py-3 mx-3 mt-3" style="width: 18rem; cursor: pointer;">
                                <div class="card-body text-center">
                                    <h5 class="card-title h1"> <?php echo $rows['nome']; ?></h5>

                                    <img src="<?php echo "admin/imgProdutos/".$rows['img']; ?>" class="rounded" width="100%">

                                    <div class="row  justify-content-center textPlanos"><br>
                                        Preço por unidade
                                        <div class="h1 col-12">
                                            R$ <?php echo $rows['preco']; ?>
                                        </div>
                                    </div>

                                    <div class="row  justify-content-center textPlanos">
                                        Quantidade Disponivel<br>
                                        <?php echo $rows['quantidade']; ?>
                                    </div><br>


                                    <a href="#" class="btn btn-primary text-white">Comprar Agora</a>
                                </div>
                            </div>
                        <?php
                            }
                        ?>

                    </div>


                </div>




            </div>
        </div>
    </body>
    <?php include 'rodape.php'; ?>
</html>
