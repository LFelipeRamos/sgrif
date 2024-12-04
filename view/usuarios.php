<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de usuario</title>
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
                  <h1 class="h1">Manutenção de Usuários</h1>
                  <h3 class="h3">Sistema de Gerenciamento de Reservas</h3>
              </div>
                <div class="row">
                    <div>
                        <input class="form-control-plaintext" type="text" id="barraPesquisa" onkeyup="filtrarTabela()" placeholder="Pesquisar na tabela...">
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#newUsuario">Novo Usuario</button>
                    </div>
                </div>
            </div>

            <div class="modal" id="newUsuario">
              <div class="modal-dialog">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header  bg-dark">
                    <h4 class="modal-title text-white">Novo Usuário</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form id="formNovoUsuario" method="POST" action="../controller/usuarioCont.php">
                      <div class="form-control ">
                        <input type="hidden" name="acao" id="acao" value="novoUsuario">
                        <div class="mt-3 mb-3">
                          <label class="form-label" for="nome">Nome:</label>
                          <input class="form-control" type="text" id="nome" name="nome" required>
                        </div>
                        <div class="mt/3">
                          <label class="form-label" for="tipo">Tipo:</label>
                         <input class="form-control" type="text" id="tipo" name="tipo" required>
                        </div>
                        <div class="mt-3">
                          <label class="form-label" for="email">E-mail:</label>
                          <input class="form-control" type="email" id="email" name="email" required>
                        </div>
                    
                        
                        <input type="submit" class="btn btn-houver btn-success btn-sm mt-3" value="inserir">
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

            <table class="table table-houver table-sm" id="table">
                <thead class="table-dark">
                <tr>
                    <th class="text-center" onclick="ordenarTabela(0)">Nome</th>
                    <th class="text-center" onclick="ordenarTabela(1)">tipo</th>
                    <th class="text-center" onclick="ordenarTabela(2)">Email</th>
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
            fetch('../controller/usuarioCont.php?acao=getUsuario')
                .then(response => response.json())
                .then(data => {
                    let tabela = document.getElementById('corpoTabela');
                    data.forEach(usuario => {
                        let linha = document.createElement('tr');
                        linha.innerHTML = `
                            <td class="text-center">${usuario.nome}</td>
                            <td class="text-center">${usuario.tipo}</td>
                            <td class="text-center">${usuario.email}</td>
                            <td class="text-center"><button class = "btn btn-houver btn-sm btn-warning" onclick = "window.location.href='alterarUsuario.php?id=${usuario.idUsuario}'">Alterar</button>
                            <button class = "btn btn-houver btn-sm btn-danger" onclick = "window.location.href='../controller/usuarioCont.php?id=${usuario.idUsuario}&acao=excluirUsuario'">Excluir</button>
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