<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <?php require_once 'menu.php'; ?>
    <body>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <h1 class="text-center">Contato</h1>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="cadastrarContato.php">
                        <div class="row justify-content-center text-center form-group">
                            <div class="col-md-12 mt-3">
                                <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                            </div>

                            <div class="col-md-6 mt-3">
                                <input type="text" name="telefone" class="form-control" placeholder="Telefone" required>
                            </div>

                            <div class="col-md-6 mt-3">
                                <input type="text" name="email" class="form-control" placeholder="E-mail" required>
                            </div>

                            <div class="col-md-12 mt-3">
                                <textarea type="text" name="mensagem" class="form-control" rows="5" placeholder="Mensagem" required></textarea>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary text-white">Enviar</button>
                    </form>
                </div>
            </div>
        </div><br>
    </body>
    <?php include 'rodape.php'; ?>
</html>
