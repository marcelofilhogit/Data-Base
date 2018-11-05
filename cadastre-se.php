<?php
    $erro_email = htmlspecialchars(addslashes(isset($_GET['erro_email']) ? $_GET['erro_email'] : 0));
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <?php require_once 'menu.php'; ?>
    <body>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <h1 class="text-center">Cadastre-se</h1>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="cadastrarCliente.php">
                        <div class="row justify-content-center text-center form-group">
                            <div class="col-md-6 mt-3">
                                <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                            </div>

                            <div class="col-md-6 mt-3">
                                <input type="text" name="telefone" class="form-control" placeholder="Telefone" required>
                            </div>
                        </div>

                        <div class="row justify-content-center text-center form-group">
                            <div class="col-md-6 mt-3">
                                <input type="text" name="email" class="form-control" placeholder="E-mail"  <?php if($erro_email == 1) echo "style='border-color: red;'"; ?> required>

                                <?php
                                    if($erro_email){
                                        echo '<font style="color:#FF0000">E-mail já cadastrado</font>';
                                    }
                                ?>


                            </div>

                            <div class="col-md-6 mt-3">
                                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary text-white">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div><br>
    </body>
    <?php include 'rodape.php'; ?>
</html>
