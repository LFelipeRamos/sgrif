<?php
    include_once "../util/conexao.php";
    include_once "../model/reserva.php";
    include_once "../dao/reservaDao.php";
    class ReservaCont{
        function inserirReserva(){
            $reserva = New Reserva();
            $reserva-> idReserva = $_POST["idReserva"];
            $reserva-> idSala = $_POST["idSala"];
            $reserva-> idUsuario = $_POST["idUsuario"];
            $reserva-> tipo = $_POST["tipo"];
            $reserva-> dataReserva = $_POST["dataReserva"];
            $reserva-> inicioReserva = $_POST["inicio"];
            $reserva-> fimReserva = $_POST["fim"];
            $reserva-> periodicidade = $_POST["periodicidade"];
            $dao = new ReservaDao();
            $dao->inserirReserva($reserva);
        }
        function alterarReserva(){
            $reserva = New Reserva();
            $reserva-> idReserva = $_POST["id"];
            $reserva-> tipo = $_POST["tipo"];
            $reserva-> marca = $_POST["marca"];
            $reserva-> config = $_POST["config"];
            $dao = new ReservaDao();
            $dao->alterarreserva($reserva);
        }
        
        function excluirReserva(){
            $reserva = New reserva();
            $reserva-> idReserva = $_GET["id"];
            $dao = New ReservaDao();
            $dao->excluirReserva($reserva);
        }

        function pegarPorId(): array{
            $reserva = New Reserva();
            $reserva-> idReserva = $_GET["id"];
            $dao = New ReservaDao();
            $data =$dao->pegarPorId($reserva);
            return ($data);
        }
        function getreserva(){

            $reserva = New reserva();
            $dao = New ReservaDao();
            $data = $dao->getreserva($reserva);
            echo json_encode($data);
            
            
     
        }

    }


    $controle = new reservaCont();
        
    if (isset( $_REQUEST["acao"])) {
        $acao = $_REQUEST["acao"];
        if ($acao == "excluirreserva") {
            $controle->excluirreserva();
        }else if($acao == "novoreserva"){
            $controle->inserirreserva();
        }else if ($acao == "alterarreserva") {
            $controle->alterarreserva();
        }else if($acao == "getreserva"){
            $controle->getreserva();
            }
    }

    
?>