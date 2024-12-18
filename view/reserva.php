<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Reservas</title>
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
            <h1 class="h1">Manutenção de Reservas</h1>
            <h3>Sistema de Gerenciamento de Reservas</h3>
          </div>
          <?php include_once("../partials/partialsAlert.php")?>
      </div>
        <div class="row">
            <div>
                <input class="form-control-plaintext" type="text" id="barraPesquisa" onkeyup="filtrarTabela()" placeholder="Pesquisar na tabela...">
            </div>
            <div class="mt-2">
              <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#novaReserva">
                Nova Reserva
              </button>
            </div>
        </div>
    </div>
   
    <div class="modal" id="novaReserva">
      <div class="modal-dialog">
        <div class="modal-content">
          
          <!-- Modal Header -->
          <div class="modal-header  bg-dark">
            <h4 class="modal-title text-white">Nova Reserva</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
            <form id="formNovaReserva" method="POST" action="../controller/reservaCont.php">
              <div class="form-control">
              <input type="hidden" name="acao" id="acao" value="novaReserva">
              <input type="hidden" name="dataReserva" id="dataReserva" value="<?php  echo date( 'Y-m-d')?>">
              <div class="row">
                <div>
                    <label class="form-label" for="selectSala">Sala:</label>
                    <select class="form-select" name="selectSala" id="selectSala" required> 
                      <option value="Selecione uma Sala"  >Selecione uma Sala </option>
                    </select>
                  </div>
                  <div>
                    <label class="form-label" for="selectUsuario">Usuario:</label>
                    <select class="form-select" name="selectUsuario" id="selectUsuario" required> 
                      <option value="Selecione um Usuario">Selecione um Usuario</option>
                    </select>
                  </div>
              </div>
                

                <div class="form-check mt-3 mb-3">
                  <div class="row">
                    <div class="col">
                      <label class="form-check-label" for="segunda">S</label>
                      <input type="checkbox" class="form-check-input" id="segunda" name="dia" value="segunda">
                    </div>
                    <div class="col">
                      <label class="form-check-label" for="terça">T</label>
                      <input type="checkbox" class="form-check-input" id="terça" name="dia" value="terça">
                    </div>
                    <div class="col">
                      <label class="form-check-label" for="quarta">Q</label>
                      <input type="checkbox" class="form-check-input" id="quarta" name="dia" value="quarta">
                    </div>
                    <div class="col">
                      <label class="form-check-label" for="quinta">Q</label>
                      <input type="checkbox" class="form-check-input" id="quinta" name="dia" value="quinta">
                    </div>
                    <div class="col">
                      <label class="form-check-label" for="sexta">S</label>
                      <input type="checkbox" class="form-check-input" id="sexta" name="dia" value="sexta">
                    </div>
                    <div class="col">
                      <label class="form-check-label" for="sabado">S</label>
                      <input type="checkbox" class="form-check-input" id="sabado" name="dia" value="sabado">
                    </div>
                    <div class="col">
                      <label class="form-check-label" for="domingo">D</label>
                      <input type="checkbox" class="form-check-input" id="domingo" name="dia" value="domingo">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <label class="form-label mt-3" for="horaInicio">Hora Inicio:</label>
                    <input class="form-control" type="time" id="horaInicio" name="horaInicio" required>
                  </div>
                  <div class="col-5">
                    <label class="form-label mt-3" for="horaFim">Hora Fim:</label>
                    <input class="form-control" type="time" id="horaFim" name="horaFim" required>
                  </div>
                </div>
                  <div class="row">
                    <div class="form-check form-switch mt-3 mb-3 ">
                    <div class="col-5">
                        <label class="form-label mt-3" for="dataInicio">Data Inicio:</label>
                        <input class="form-control" type="date" id="horaInicio" name="dataInicio" >
                    </div>
                    <div>
                      <label class="form-check-label" for="tipo">Repete ?</label>
                      <input  onclick="mostrarElemento()" class="form-check-input" type="checkbox" value="Recorrente" role="switch" id="tipo" name="tipo">
                      
                      
                    </div>
                  </div>

                    <div class="row hidden" id="repete">
                      <div class="col-5">
                        <label class="form-label mt-3" for="dataFim">Data Fim:</label>
                        <input class="form-control" type="date" id="horaFim" name="dataFim">
                      </div>
                    </div>
                  </div>
                <input class="btn btn-sm btn-success mt-3" type="submit" value="Inserir">
              </form>
                <button type="button" class="btn btn-danger btn-sm mt-3" data-bs-dismiss="modal">Fechar</button>
              </div>
              </div>

            </div>
            
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
                <th class="text-center" onclick="ordenarTabela(0)">Sala</th>
                <th class="text-center" onclick="ordenarTabela(1)">Usuario</th>
                <th class="text-center" onclick="ordenarTabela(2)">Tipo</th>

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
      //Select Sala
      document.addEventListener('DOMContentLoaded', function() {
        fetch('../controller/salaCont.php?acao=getSala')
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById('selectSala');
                data.forEach(sala => {
                    let option = document.createElement('option');
                    option.value = sala.idSala; 
                    option.textContent = sala.nome;
                    select.appendChild(option);
                });
            });
    });
      //select Usuario
      document.addEventListener('DOMContentLoaded', function() {
        fetch('../controller/usuarioCont.php?acao=getUsuario')
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById('selectUsuario');
                data.forEach(usuario => {
                    let option = document.createElement('option');
                    option.value = usuario.idUsuario; 
                    option.textContent = usuario.nome;
                    select.appendChild(option);
                });
            });
    });

      //gerar tabela
        document.addEventListener('DOMContentLoaded', function() {
            fetch('../controller/reservaCont.php?acao=getReserva')
                .then(response => response.json())
                .then(data => {
                    let tabela = document.getElementById('corpoTabela');
                    data.forEach(reserva => {
                        let linha = document.createElement('tr');
                        linha.innerHTML = `
                            <td class="text-center">${reserva.salaNome}</td>
                            <td class="text-center">${reserva.usuNome}</td>
                            <td class="text-center">${reserva.tipo}</td>
                            <td class="text-center"><button class = "btn btn-sm btn-warning btn-houver mb-1 mt-1" onclick = "window.location.href='alterarReserva.php?id=${reserva.idReserva}'">Alterar</button>
                            <button class = "btn btn-danger btn-sm btn-houver mb-1 mt-1" onclick = "window.location.href='../controller/reservaCont.php?id=${reserva.idReserva}&acao=excluirReserva'">Excluir</button>
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