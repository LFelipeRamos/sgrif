<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Salas</title>
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
            <h1 class="h1">Manutenção de Salas</h1>
            <h3>Sistema de Gerenciamento de Reservas</h3>
          </div>
        </div>
        <?php include_once ("../partials/partialsAlert.php")?>
        
            <div class="row">
                <div>
                    <input class="form-control-plaintext" type="text" id="barraPesquisa" onkeyup="filtrarTabela()" placeholder="Pesquisar na tabela...">
                </div>
                <div class="mt-2">
                    <button class="btn btn-success btn-sm"data-bs-toggle="modal" data-bs-target="#newSala">Nova Sala
                    </button>
                </div>
            </div>
        </div>

        <div class="modal" id="newSala">
          <div class="modal-dialog">
            <div class="modal-content">
        
              <!-- Modal Header -->
              <div class="modal-header  bg-dark">
                <h4 class="modal-title text-white">Nova Sala</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
        
              <!-- Modal body -->
              <div class="modal-body">
                <form id="formNovaSala" method="POST" action="../controller/salaCont.php">
                  <div class="form-control">
                      <input type="hidden" name="acao" id="acao" value="novaSala">
                      <div class="mt-3 mb-3">
                          <label class="form-label" for="tipo">Nome:</label>
                          <input class="form-control" type="text" id="nome" name="nome" required>
                      </div>
                      <div class="mt-3">
                          <label class="form-label" for="location">Localização:</label>
                          <input class="form-control" type="text" id="location" name="location" required>
                      </div>
                      <div class="mt-3">
                          
                      <label class="form-label" for="capacidade">Capacidade:</label>
                      <input class="form-control" type="number" id="capacidade" name="capacidade" required>
                      
                      </div>
                      <input type="submit" class="btn btn-houver btn-sm btn-success mt-3" value="Inserir">
                      <button type="button" class="btn btn-danger btn-sm mt-3" data-bs-dismiss="modal">Fechar</button>
                  </div>
                  
              </form>
              </div>
        
              <!-- Modal footer -->
              <div class="modal-footer">
               
              </div>
        
            </div>
          </div>
        </div>

        <div class="container-fluid mt-3 mb-3">
            <table class="table table-sm table-houver" id="table">
              <thead class="table-dark">
              <tr>
                  <th class="text-center" onclick="ordenarTabela(0)">Nome</th>
                  <th class="text-center" onclick="ordenarTabela(1)">Localização</th>
                  <th class="text-center" onclick="ordenarTabela(2)">Capacidade</th>
                  <th class="text-center">opções</th>
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
            fetch('../controller/salaCont.php?acao=getSala')
                .then(response => response.json())
                .then(data => {
                    let tabela = document.getElementById('corpoTabela');
                    data.forEach(sala => {
                        let linha = document.createElement('tr');
                        linha.innerHTML = `
                            <td class="text-center">${sala.nome}</td>
                            <td class="text-center">${sala.localizacao}</td>
                            <td class="text-center">${sala.capacidade}</td>
                            <td class="text-center"><button class = "btn btn-sm btn-warning btn-houver mb-1 mt-1" onclick = "window.location.href='alterarSala.php?id=${sala.idSala}'">Alterar</button>
                            <button class = "btn btn-danger btn-sm btn-houver mb-1 mt-1" onclick = "window.location.href='../controller/salaCont.php?id=${sala.idSala}&acao=excluirSala'">Excluir</button>
                            <button class = "btn btn-success btn-sm btn-houver mb-1 mt-1" onclick = "window.location.href='equipamentoSala.php?id=${sala.idSala}'">Equipamentos</button></td>
                        `;
                        tabela.appendChild(linha);
                    });
                });
        });

        
    </script>
    <script src="../style/Script.js"></script>
    <script src="../style/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>