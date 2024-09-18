<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuario</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <h1>Alterar Usuario</h1>
    </header>
    <main>
    <form id="alterarUsuario" method="POST" action="controller/usuarioCont.php">
            <input type="hidden" name="acao" id="acao" value="alterarUsuario">
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required><br><br>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>

            <button class="button">alterar Usuario</button>
        </form>
        <button class="button" onclick="window.location.href='usuarios.html'">Voltar</button>
    </main>
    <aside></aside>
    <footer></footer>
</body>
</html>