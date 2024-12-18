<?php 
    include_once ( "../controller/usuarioCont.php");
    $controle = New UsuarioCont;
    $usuario = $controle->pegarPorId();
    $usuario = $usuario[0];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuario</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<?php include_once ("../partials/partialsNav.php")?>
    <main>
    <div class="container-fluid">
        <div class="row">
            <div class="mt-5"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mt-5">
                <h1 class="h1">Alterar Sala</h1>
                <h3>Sistema de Gerenciamento de Reservas</h3>
            </div>
        </div>
        <form id="alterarUsuario" method="POST" action="../controller/usuarioCont.php">
            <div class="form-control">
                <input type="hidden" name="acao" id="acao" value="alterarUsuario">
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                <div>
                    <label  class="form-label" for="nome">Nome:</label>
                    <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>  
                </div>
                
                <div>
                    <label class="form-label" for="tipo">Tipo:</label>
                    <input class="form-control" type="text" id="tipo" name="tipo" value="<?php echo $usuario['tipo']; ?>" required>
                </div>
                <div>
                    <label class="form-label" for="email">E-mail:</label>
                    <input class="form-control" type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-sm btn-success mt-3" value="alterar Usuario">
                    <button class="btn btn-sm btn-danger mt-3" onclick="window.location.href='usuarios.php'">Voltar</button>
                </div>
                
            </div>
        </form>
    </div>
    </main>
    <aside></aside>
    <footer></footer>
    <script src="../style/Script.js"></script>
    <script src="../style/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>