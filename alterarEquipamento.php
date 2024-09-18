<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Equipamento</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <h1>Alterar Equipamento</h1>
    </header>
    <main>
        <form id="alterarEquipamento" method="POST" action="controller/equipamentoCont.php">
            <input type="hidden" name="acao" id="acao" value="alterarEquipamento">
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required><br><br>

            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required><br><br>

            <label for="config">Configuração:</label>
            <input type="text" id="config" name="config" required><br><br>

            <button class="button">alterar Equipamento</button>
        </form>
        <button class="button" onclick="window.location.href='equipamentos.html'">Voltar</button>
    </main>
    <aside></aside>
    <footer></footer>
</body>
</html>