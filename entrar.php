<?php
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <?php include 'menu.php'; ?>
    <body>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <h1 class="text-center">Entrar</h1>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="validarAcesso.php">
                        <div class="row justify-content-center text-center form-group">
                            <div class="col-md-6 mt-3">
                                <input type="text" name="email" class="form-control" placeholder="E-mail" <?php if($erro == 1) echo "style='border-color: red;'"; ?> required>
                            </div>

                            <div class="col-md-6 mt-3">
                                <input type="password" name="senha" class="form-control" placeholder="Senha" <?php if($erro == 1) echo "style='border-color: red;'"; ?> required>
                            </div>
                        </div>

                        <div class="row justify-content-center text-center form-group">
                            <?php
                                if($erro == 1){
                                    echo '<font color="#FF0000">E-mail e ou senha inválido(s)</font>';
                                }
                            ?>
                        </div>

                        <button type="submit" class="btn btn-primary text-white">Entrar</button>
                    </form>
                </div>
            </div>
        </div><br>

    </body>
    <?php include 'rodape.php'; ?>
</html>
