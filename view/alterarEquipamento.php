<?php 
    include_once ( "../controller/EquipamentoCont.php");
    $controle = New EquipamentoCont;
    $equipamento = $controle->pegarPorId();
    $equipamento = $equipamento[0];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Equipamento</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>Alterar Equipamento</h1>
    </header>
    <main>
        <form id="alterarEquipamento" method="POST" action="../controller/equipamentoCont.php">
            <div class="form-control">
                <div>
                    <input type="hidden" name="acao" id="acao" value="alterarEquipamento">
                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                </div>
                <div>
                    <label class="form-label" for="tipo">Tipo:</label>
                    <input  class="form-control" type="text" id="tipo" name="tipo" value="<?php echo $equipamento["tipo"];?>"required>
                </div>
                <div>
                    <label class="form-label" for="marca">Marca:</label>
                    <input class="form-control" type="text" id="marca" name="marca" value="<?php echo $equipamento["marca"];?>" required>
                </div>
                <div>
                    <label class="form-label" for="config">Configuração:</label>
                    <textarea class="form-control" id="config" name="config" required><?php echo $equipamento["config"];?></textarea>
                </div>
            
            <div class="mt-3 mb-3">
                <input type="submit" class="btn btn-sm btn-success btn-houver" value=" alterar Equipamento">
                <button class="btn btn-sm btn-danger btn-houver" onclick="window.location.href='equipamentos.php'">Voltar</button>
            </div>
            
        </form>
    </main>
    <aside></aside>
    <footer></footer>
    <script src="../style/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <source src="../style/Script.js">
</body>
</html>