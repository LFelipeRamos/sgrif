<?php 
    include_once ( "../controller/salaCont.php");
    $controle = New salaCont;
    $sala = $controle->pegarPorId();
    $sala = $sala[0];
    
  
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Sala</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>Alterar Sala</h1>
    </header>
    <main>
        <form id="alterarSala" method="POST" action="../controller/salaCont.php">
            <div class="form-control">
                    <input type="hidden" name="acao" id="acao" value="alterarSala">
                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">            
                <div>
                    <label class="form-label" for="tipo">Nome:</label>
                    <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $sala['nome']; ?>" required>
                </div>
                <div>
                    <label class="form-label" for="location">Localização:</label>
                    <input class="form-control" type="text" id="location" name="location" value="<?php echo $sala['localizacao']; ?>" required>
                </div>
            
                <div>
                    <label class="form-label" for="capacidade">Capacidade:</label>
                    <input class="form-control" type="number" id="capacidade" name="capacidade" value="<?php echo $sala['capacidade']; ?>" required>
                </div>
           
            
            <input type="submit" class="btn btn-huver btn-sm btn-success mt-3" value="alterar"></input>
            <button class="btn btn-sm btn-danger mt-3" onclick="window.location.href='salas.php'">Voltar</button>
        </form>
        
        </div>
    </main>
    <aside></aside>
    <footer></footer>
</body>
    <script src="../style/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../style/Script.js"></script>
</html>