<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala-Equipamento</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed" >
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">SGRIF</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="home.php" href="#">Tela inicial</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Gerênciar
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Reserva</a></li>
                  <li><a class="dropdown-item" href="salas.html">Sala</a></li>
                  <li><a class="dropdown-item" href="equipamentos.html">Equipamento</a></li>
                  <li><a class="dropdown-item" href="usuarios.html">Usuario</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Instituto Federal do Parana - Campus jacarezinho</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    
    <main>
        <div  class="container-fluid" id="fomularioEquipamentoSala" >
            <form method="post" action="controller/equipamentoSalaCont.php" >
                <input type="hidden" name="acao" value="inserirEquipamento">
                <input type="hidden" name="idSala" value = "<?php echo $_GET['id']; ?>">

                <div class="form-control">
                    <div class="mt-3 mb-3"></div>
                    <label class="form-label" for="selectEquipamento">Equipamento:</label>
                    <select class="form-select" name="selectEquipamento" id="selectEquipamento" required> 
                        <option value="selecione um Equipamento">selecione um equipamento</option>
                    </select>
                    
                    <div class="mt-3">
                        <label class="form-label" for="quantidade">Quantidade:</label>
                        <input class="form-control" type="number" name="quantidade" id="quantidade" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" for="quantidadeOperavel">Quantidade operavel:</label>
                        <input class="form-control" type="number" name="quantidadeOperavel" id="quantidadeOperavel" required>
                    </div>
                   <button class="btn btn-success mt-2 mb-2">Inserir</button>
                </div>
            </form>
        </div>
        <div class="container-fluid mt-3">
            <table class="table table-houver" id="table">
                <thead class="table-dark">
                <tr>
                    <th class="text-center" onclick="ordenarTabela(0)">Sala</th>
                    <th class="text-center" onclick="ordenarTabela(1)">Equipamento</th>
                    <th class="text-center" onclick="ordenarTabela(2)">Qantidade Total</th>
                    <th class="text-center" onclick="ordenarTabela(3)">quantidade Operavel</th>
                    <th class="text-center" onclick="ordenarTabela(4)">Status</th>
                    <th class="text-center">Opções</th>
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

    //ARRUMAR TABELA E O GET equipamento sala

    document.addEventListener('DOMContentLoaded', function() {
            fetch('get_equipamentoSala.php')
                .then(response => response.json())
                .then(data => {
                    let tabela = document.getElementById('corpoTabela');
                    data.forEach(eSala => {
                        let linha = document.createElement('tr');
                        linha.innerHTML = `
                            <td>${eSala.nome}</td>
                            <td>${eSala}</td>
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
<script src="style/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>