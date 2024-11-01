<?php 
    include_once ("../util/conexao.php");
    include_once ("../dao/equipamentoSalaDao.php");
    class EquipamentoSalaCont{
        function inserirEquipamento(){
            $eSala = New EquipamentoSala();
            $eSala-> idSala = $_POST["idSala"];
            $eSala-> idEquipamento = $_POST["selectEquipamento"];
            $eSala-> qtdeTotal = $_POST["quantidade"];
            $eSala->qtdeOperavel = $_POST["quantidadeOperavel"];
            
            $dao = new EquipamentoSalaDao();
            $dao->inserirEquipamento($eSala);
        }
        function excluirEquipamento(){
            $eSala = New EquipamentoSala();
            $eSala-> idSala = $_GET["id"];
            $eSala->idEquipamento = $_GET["idEquipamento"];
            $dao = New EquipamentoSalaDao();
            $dao->excluirEquipamento($eSala);
        }
        
        function getEquipamentoSala(){

            $eSala = New EquipamentoSala();
            $eSala->idSala = $_GET["id"];
            $dao = New EquipamentoSalaDao();
            $data = $dao->getEquipamentoSala($eSala);
            echo json_encode($data);
            
            
     
        }

    }

    $controle = new EquipamentoSalaCont();
        #recebe pela url GET
    if (isset( $_GET["acao"])) {
        $acao = $_GET["acao"];
        if ($acao == "excluirEquipamento") {
        $controle->excluirEquipamento();
        }if ($acao == "getEquipamentoSala") {
            $controle->getEquipamentoSala();
        }
    }else {#recebe pelo form POST
        $acao = $_POST["acao"];
        if($acao == "inserirEquipamento"){
        $controle->inserirEquipamento();
        }
    }
    
?>