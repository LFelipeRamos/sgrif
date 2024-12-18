<?php
    include_once "../util/conexao.php";
    include_once "../model/reserva.php";
    include_once "../dao/reservaDao.php";
    include_once "../model/ocorrencia.php";
    class ReservaCont{
        function inserirReserva(){
            if (isset($_POST["tipo"])) {
                $tipo = $_POST["tipo"];
                $fimReserva = $_POST["dataFim"];
            }else {
                $tipo = "Unica";
                $fimReserva = $_POST["dataInicio"];
            }
            $reserva = New Reserva();
            $reserva-> idSala = $_POST["selectSala"];
            $reserva-> idUsuario = $_POST["selectUsuario"];
            $reserva-> tipo = $tipo;
            $reserva-> dataReserva = $_POST["dataReserva"];
            $reserva-> inicioReserva = $_POST["dataInicio"];
            $reserva-> fimReserva = $fimReserva;
        
            $dao = new ReservaDao();
            try {
                $dao->inserirReserva($reserva);
                $_SESSION['mensagem'] = ['sucesso' => 'Reserva inserida com sucesso!'];
            } catch (Exception $e) {
                $_SESSION['mensagem'] = ['erro' => 'Erro ao inserir Reserva!'. $e->getMessage()];
            }
            //header("Location: ocorrenciaCont.php?acao=inserirOcorrencia");
            header("Location: ../view/reserva.php");
            exit;
        }
        function alterarReserva(){
            if (isset($_POST["tipo"])) {
                $tipo = $_POST["tipo"];
                $fimReserva = $_POST["dataFim"];
            }else {
                $tipo = "Unica";
                $fimReserva = $_POST["dataInicio"];
            }
            $reserva = New Reserva();
            $reserva-> idReserva = $_GET["id"];
            $reserva-> idUsuario = $_POST["selectUsuario"];
            $reserva->idSala = $_POST["selectSala"];
            $reserva-> tipo = $tipo;
            $reserva-> dataReserva = $_POST["dataReserva"];
            $reserva-> inicioReserva = $_POST["dataInicio"];
            $reserva-> fimReserva = $fimReserva;
            $dao = new ReservaDao();
            var_dump($reserva);
            try {
                $dao->alterarReserva($reserva);
                $_SESSION['mensagem'] = ['sucesso' => 'Reserva alterada com sucesso!'];
            } catch (Exception $e) {
                $_SESSION['mensagem'] = ['erro' => 'Erro ao alterar Reserva!'. $e->getMessage()];
            }
            header("Location: ../view/reserva.php");
            exit;
        }
        
        function excluirReserva(){
            $reserva = New reserva();
            $reserva-> idReserva = $_GET["id"];
            $dao = New ReservaDao();
            try {
                $dao->excluirReserva($reserva);
                $_SESSION['mensagem'] = ['sucesso' => 'Reserva excluida com sucesso!'];
            } catch (Exception $e) {
                $_SESSION['mensagem'] = ['erro' => 'Erro ao excluir Reserva!'. $e->getMessage()];
            }
            header("Location: ../view/reserva.php");
            exit;
        }

        function pegarPorId(): array{
            $reserva = New Reserva();
            $reserva-> idReserva = $_GET["id"];
            $dao = New ReservaDao();
            $data =$dao->pegarPorId($reserva);
            return ($data);
        }
        function getReserva(){

            $reserva = New reserva();
            $dao = New ReservaDao();
            $data = $dao->getReserva($reserva);
            echo json_encode($data);
     
        }

    }


    $controle = new reservaCont();
        
    if (isset( $_REQUEST["acao"])) {
        session_start();
        $acao = $_REQUEST["acao"];
        if ($acao == "excluirReserva") {
            $controle->excluirReserva();
        }else if($acao == "novaReserva"){
            $controle->inserirReserva();
        }else if ($acao == "alterarReserva") {
            $controle->alterarReserva();
        }else if($acao == "getReserva"){
            $controle->getReserva();
        }else if($acao == "pegarPorId"){
            $controle->pegarPorId();
        }
    }

    
?>