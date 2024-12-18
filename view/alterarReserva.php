<?php 
    include_once ( "../controller/ReservaCont.php");
    $controle = New ReservaCont;
    $reserva = $controle->pegarPorId();
    $reserva = $reserva[0];
    

?>
<script>console.log(<?php var_dump($reserva)?>)</script>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Equipamento</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/bootstrap-5.3.3-dist/css/bootstrap.min.css">
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
                <h1 class="h1">Alterar Reserva</h1>
                <h3>Sistema de Gerenciamento de Reservas</h3>
            </div>
        </div>
        
        
            <form id="formNovaReserva" method="POST" action="../controller/reservaCont.php?id=<?php echo $_GET['id']?>&acao=alterarReserva">
                <div class="form-control">
                    <input type="hidden" name="acao" id="acao" value="alterarReserva">
                    <input type="hidden" name="dataReserva" id="dataReserva" value="<?php  echo date( 'Y-m-d')?>">
                    <div class="row">
                    <div>
                    <label class="form-label" for="selectSala">Sala:</label>
                    <select class="form-select" name="selectSala" id="selectSala" required> 
                        <option value="<?php echo $reserva['idSala']?>"><?php echo $reserva['salaNome']?></option>
                    </select>
                    </div>
                    <div>
                    <label class="form-label" for="selectUsuario">Usuario:</label>
                    <select class="form-select" name="selectUsuario" id="selectUsuario" required> 
                        <option value="<?php echo $reserva['idUsuario']?>"><?php echo $reserva['usuNome']?></option>
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
                    <input class="form-control" type="time" id="horaInicio" name="horaInicio"  required>
                    </div>
                    <div class="col-5">
                    <label class="form-label mt-3" for="horaFim" >Hora Fim:</label>
                    <input class="form-control" type="time" id="horaFim" name="horaFim" required>
                    </div>
                </div>
                    <div class="row">
                    <div class="form-check form-switch mt-3 mb-3 ">
                    <div class="col-5">
                        <label class="form-label mt-3" for="dataInicio">Data Inicio:</label>
                        <input class="form-control" type="date" id="horaInicio" name="dataInicio" value="<?php echo $reserva['inicioReserva']?>" >
                    </div>
                    <div>
                        <label class="form-check-label" for="tipo">Repete ?</label>
                        <input  onclick="mostrarElemento()" class="form-check-input" type="checkbox" value="Recorrente" role="switch" id="tipo" name="tipo" value="<?php echo $reserva['tipo']?>">
                        
                        
                    </div>
                    </div>

                    <div class="row hidden" id="repete">
                        <div class="col-5">
                        <label class="form-label mt-3" for="dataFim">Data Fim:</label>
                        <input class="form-control" type="date" id="horaFim" name="dataFim" value="<?php echo $reserva['fimReserva']?>">
                        </div>
                    </div>
                    </div>
                <input class="btn btn-sm btn-success mt-3" type="submit" value="Confirmar Alteração">
                </form>
            
    </div>
    </main>
    <aside></aside>
    <footer></footer>
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
    </script>
    <script src="../style/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <source src="../style/Script.js">
</body>
</html>