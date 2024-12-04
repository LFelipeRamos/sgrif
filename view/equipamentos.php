<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Equipamentos</title>
</head>
<body> 
   <?php include_once ("../partials/partialsNav.php")?>
     <main>
      
    </div>
        <div class="container-fluid">
          <div class="row">
            <div class="mt-5"></div>
          </div>
            <div class="row justify-content-center">
              <div class="col-lg-8 text-center mt-5">
                <h1 class="h1">Manutenção de Equipamentos</h1>
                <h3>Sistema de Gerenciamento de Reservas</h3>
              </div>
          </div>
            <div class="row">
                <div>
                    <input class="form-control-plaintext" type="text" id="barraPesquisa" onkeyup="filtrarTabela()" placeholder="Pesquisar na tabela...">
                </div>
                <div class="mt-2">
                  <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#inserirEquipamento">
                    Novo Equipamento
                  </button>
                </div>
            </div>
        </div>

        <div class="modal" id="inserirEquipamento">
          <div class="modal-dialog">
            <div class="modal-content">
        
              <!-- Modal Header -->
              <div class="modal-header  bg-dark">
                <h4 class="modal-title text-white">Novo Equipamento</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
        
              <!-- Modal body -->
              <div class="modal-body">
                <form id="formNovoEquipamento" method="POST" action="../controller/equipamentoCont.php">
                  
                  <input type="hidden" name="acao" id="acao" value="novoEquipamento">
                  <div class="form-control">
                    <div>
                      <label class="form-label mt-3 mb-3" for="tipo">Tipo:</label>
                      <input class="form-control" type="text" id="tipo" name="tipo" required>
                    </div>
                    <div>
                      <label class="form-label mt-3" for="marca">Marca:</label>
                      <input class="form-control" type="text" id="marca" name="marca" required>
                    </div>
                    <div>
                      <label class="form-label mt-3" for="config">Descrição:</label>
                      <textarea class="form-control" type="text" id="config" name="config" required></textarea>
                    </div>
                    <input class="btn btn-sm btn-success mt-3" type="submit" value="Inserir">
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
        
        <div class="container-fluid mt-3">
            <table class="table table-hover table-sm" id="table">
                <thead class="table-dark">
                <tr>
                    <th class="text-center"  onclick="ordenarTabela(0)">Tipo</th>
                    <th class="text-center" onclick="ordenarTabela(1)">Marca</th>
                    <th class="text-center" onclick="ordenarTabela(2)">Configuração</th>
                    <th class="text-center" >Opções</th>
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
    <div id="cookieConsent" class="cookie-consent">
        <p>Este site usa cookies para garantir que você tenha a melhor experiência. <a href="#">Saiba mais</a></p>
        <button id="acceptCookies" class="btn">Aceitar</button>
    </div>
    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            fetch('../controller/equipamentoCont.php?acao=getEquipamento')
                .then(response => response.json())
                .then(data => {
                    let tabela = document.getElementById('corpoTabela');
                    data.forEach(equipamento => {
                        let linha = document.createElement('tr');
                        linha.innerHTML = `
                            <td class="text-center">${equipamento.tipo}</td>
                            <td class="text-center">${equipamento.marca}</td>
                            <td class="text-center">${equipamento.config}</td>
                            <td class="text-center"><button class = "btn btn-sm btn-warning btn-houver mb-1 mt-1" onclick = "window.location.href='alterarEquipamento.php?id=${equipamento.idEquipamento}'">Alterar</button>
                            <button class = "btn btn-danger btn-sm btn-houver mb-1 mt-1" onclick = "window.location.href='../controller/equipamentoCont.php?id=${equipamento.idEquipamento}&acao=excluirEquipamento'">Excluir</button>
                            </td>
                        `;
                        tabela.appendChild(linha);
                    });
                });
        });

        
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cookieConsent = document.getElementById('cookieConsent');
            const acceptCookiesButton = document.getElementById('acceptCookies');
        
           
            if (!localStorage.getItem('cookiesAccepted')) {
                cookieConsent.style.display = 'flex';
            }
        
            acceptCookiesButton.addEventListener('click', function() {
                localStorage.setItem('cookiesAccepted', 'true');
                cookieConsent.style.display = 'none';
            });
        });
    </script>
    <script src="../style/Script.js"></script>
    <script src="../style/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>