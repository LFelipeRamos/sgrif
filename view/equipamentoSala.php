<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala-Equipamento</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
  <?php include_once "../partials/partialsNav.php";?>
    
    <main>
    <div class="container-fluid">
          <div class="row">
            <div class="mt-5"></div>
          </div>
            <div class="row justify-content-center">
              <div class="col-lg-8 text-center mt-5">
                <h1 class="h1" id="telaNome"></h1>
                <h3>Sistema de Gerenciamento de Reservas</h3>
              </div>
          </div>
            <div class="row">
                <div>
                    <input class="form-control-plaintext" type="text" id="barraPesquisa" onkeyup="filtrarTabela()" placeholder="Pesquisar na tabela...">
                </div>
                <div class="mt-2">
                  <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#inserirEquipamento">
                    Inserir Equipamento
                  </button>
                </div>
            </div>
        </div>

        <div class="modal" id="inserirEquipamento">
          <div class="modal-dialog">
            <div class="modal-content">
        
              <!-- Modal Header -->
              <div class="modal-header  bg-dark">
                <h4 class="modal-title text-white">Inserir Equipamento</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
        
              <!-- Modal body -->
              <div class="modal-body">
              <form method="post" action="../controller/equipamentoSalaCont.php" >
                <input type="hidden" name="acao" value="inserirEquipamento">
                <input type="hidden" name="idSala" value = "<?php echo $_GET["id"]?>">

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
                   <input type="submit" value="inserir" class="btn btn-sm btn-success mt-3">
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
        
           
      </div>
        <div class="container-fluid mt-3">
            <table class="table table-houver table-sm" id="table">
                <thead class="table-dark">
                <tr>
                   
                    <th class="text-center" onclick="ordenarTabela(0)">Equipamento</th>
                    <th class="text-center" onclick="ordenarTabela(1)">Marca</th>
                    <th class="text-center" onclick="ordenarTabela(2)">Quantidade Total</th>
                    <th class="text-center" onclick="ordenarTabela(3)">quantidade Operavel</th>
                    
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
        fetch('../controller/equipamentoCont.php?acao=getEquipamento')
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
            fetch('../controller/equipamentoSalaCont.php?id=<?php echo $_GET["id"]?>&acao=getEquipamentoSala')
                .then(response => response.json())
                .then(data => {
                    let tabela = document.getElementById('corpoTabela');
                    data.forEach(eSala => {
                        let linha = document.createElement('tr');
                        linha.innerHTML =` 
                            <td class="text-center">${eSala.tipo}</td>
                            <td class="text-center">${eSala.marca}</td>
                            <td class="text-center">${eSala.qtdeOperavel}</td>
                            <td class="text-center">${eSala.qtdeTotal}</td>
                            <td class="text-center"><button class ="btn btn-houver btn-danger btn-sm" onclick = "window.location.href='../controller/equipamentoSalaCont.php?id=${eSala.idSala}&acao=excluirEquipamento&idEquipamento=${eSala.idEquipamento}'">Excluir</button>
                            </td>
                        `;
                        tabela.appendChild(linha);
                    });
                });
        });

        document.addEventListener('DOMContentLoaded', function() {
            fetch('../controller/SalaCont.php?id=<?php echo $_GET["id"]?>&acao=pegarPorId')
                .then(response => response.json())
                .then(data => {
                    let nome = document.getElementById('telaNome');
                    data.forEach(sala => {
                        let linha = document.createElement('h1');
                        linha.innerHTML =`  Equipamentos - ${sala.nome}`;
                        nome.appendChild(linha);
                    });
                });
        });
        

</script>
<script src="../style/Script.js"></script>
<script src="../style/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>