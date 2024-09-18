<?php 
    include_once ("../util/conexao.php");
    include_once ("../dao/equipamentoSalaDao.php");
    class EquipamentoSalaCont{
        function inserirEquipamento(){
            $equipamento = New EquipamentoSala();
            $equipamento-> idSala = $_POST["idSala"];
            $equipamento-> idEquipamento = $_POST["selectEquipamento"];
            $equipamento-> qtdeTotal = $_POST["quantidade"];
            $equipamento->qtdeOperavel = $_POST["quantidadeOperavel"];
            $equipamento->status = $_POST["status"];
            $dao = new EquipamentoSalaDao();
            $dao->inserirEquipamento($equipamento);
        }
        function excluirEquipamento(){
            $equipamento = New EquipamentoSala();
            $equipamento-> idSala = $_GET["id"];
            $equipamento->idEquipamento = $_POST["selectEquipamento"];
            $dao = New EquipamentoSalaDao();
            $dao->excluirEquipamento($equipamento);
        }
    }

    $controle = new EquipamentoSalaCont();
        #recebe pela url GET
    if (isset( $_GET["acao"])) {
        $acao = $_GET["acao"];
        if ($acao == "excluirEquipamento") {
        $controle->excluirEquipamento();
        }
    }else {#recebe pelo form POST
        $acao = $_POST["acao"];
        if($acao == "inserirEquipamento"){
        $controle->inserirEquipamento();
        }
    }
?>