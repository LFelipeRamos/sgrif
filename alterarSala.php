<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Sala</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <h1>Alterar Sala</h1>
    </header>
    <main>
        <form id="alterarSala" method="POST" action="controller/salaCont.php">
            <input type="hidden" name="acao" id="acao" value="alterarSala">
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
            <label for="tipo">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="location">Localização:</label>
            <input type="text" id="location" name="location" required><br><br>

            <label for="capacidade">Capacidade:</label>
            <input type="number" id="capacidade" name="capacidade" required><br><br>
            
            <button class="button">alterar Sala</button>
        </form>
        <button class="button" onclick="window.location.href='salas.html'">Voltar</button>
    </main>
    <aside></aside>
    <footer></footer>
</body>
</html>