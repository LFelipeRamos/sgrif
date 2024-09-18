<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala-Equipamento</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header><h1>Equipamentos:</h1></header>
    <nav></nav>
    <main>
        <div id="fomularioEquipamentoSala" >
            <form method="post" action="controller/equipamentoSalaCont.php" >
                <input type="hidden" name="acao" value="inserirEquipamento">
                <input type="hidden" name="idSala" value = "<?php echo $_GET['id']; ?>">
                <label for="selectEquipamento">Equipamento:</label><br>
                <select name="selectEquipamento" id="selectEquipamento"> 
                    <option value="selecione um Equipamento">selecione um equipamento</option>
                </select><br><br>

                <label for="quantidade">Quantidade:</label><br>
                <input type="number" name="quantidade" id="quantidade"><br><br>

                <label for="quantidadeOperavel">Quantidade operavel:</label><br>
                <input type="number" name="quantidadeOperavel" id="quantidadeOperavel"><br><br>

                <label for="status">Status:</label><br>
                <input type="number" name="status" id="status">
                <button>Inserir</button>
            </form>
        </div>
        <div>
        <table id="table">
            <thead>
            <tr>
                <th onclick="ordenarTabela(0)">Sala</th>
                <th onclick="ordenarTabela(1)">Equipamento</th>
                <th onclick="ordenarTabela(2)">Qantidade Total</th>
                <th onclick="ordenarTabela(3)">quantidade Operavel</th>
                <th onclick="ordenarTabela(4)">Status</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody id="corpoTabela">
            <!-- Linhas da tabela serão adicionadas dinamicamente aqui -->
            </tbody>
        </table>
        </div>
           
    </main>
    <aside></aside>
    <footer></footer>
    <script type="module">
    document.addEventListener('DOMContentLoaded', function() {
        fetch('get_equipamentos.php')
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById('selectEquipamento');
                data.forEach(equipamento => {
                    let option = document.createElement('option');
                    option.value = equipamento.idEquipamento; 
                    option.textContent = equipamento.tipo;
                    select.appendChild(option);
                });
            });
    });

    //ARRUMAR TABELA E O GET

    document.addEventListener('DOMContentLoaded', function() {
            fetch('get_equipamentoSala.php')
                .then(response => response.json())
                .then(data => {
                    let tabela = document.getElementById('corpoTabela');
                    data.forEach(equipamento => {
                        let linha = document.createElement('tr');
                        linha.innerHTML = `
                            <td>${equipamento.tipo}</td>
                            <td>${equipamento.marca}</td>
                            <td>${equipamento.config}</td>
                            <td><button class = "button" onclick = "window.location.href='controller/equipamentoSalaCont.php?id=${equipamento.idEquipamento}&acao=excluirEquipamento&idEquipamento='">Excluir</button>
                            </td>
                        `;
                        tabela.appendChild(linha);
                    });
                });
        });

</script>
<script src="js/Script.js"></script>
</body>
</html>