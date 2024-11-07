<?php
    include_once "../util/conexao.php";
    include_once "../dao/equipamentoDao.php";
    class EquipamentoCont{
        function inserirEquipamento(){
            $equipamento = New Equipamento();
            $equipamento-> tipo = $_POST["tipo"];
            $equipamento-> marca = $_POST["marca"];
            $equipamento-> config = $_POST["config"];
            $dao = new EquipamentoDao();
            $dao->inserirEquipamento($equipamento);
        }
        function alterarEquipamento(){
            $equipamento = New Equipamento();
            $equipamento-> id = $_POST["id"];
            $equipamento-> tipo = $_POST["tipo"];
            $equipamento-> marca = $_POST["marca"];
            $equipamento-> config = $_POST["config"];
            $dao = new EquipamentoDao();
            $dao->alterarEquipamento($equipamento);
        }
        
        function excluirEquipamento(){
            $equipamento = New Equipamento();
            $equipamento-> id = $_GET["id"];
            $dao = New EquipamentoDao();
            $dao->excluirEquipamento($equipamento);
        }

        function pegarPorId(){
            $equipamento = New Equipamento();
            $equipamento-> id = $_GET["id"];
            $dao = New EquipamentoDao();
            $data =$dao->pegarPorId($equipamento);
            return($data);
        }

    }


    $controle = new EquipamentoCont();
        
    if (isset( $_REQUEST["acao"])) {
        $acao = $_REQUEST["acao"];
        if ($acao == "excluirEquipamento") {
            $controle->excluirEquipamento();
        }else if($acao == "novoEquipamento"){
            $controle->inserirEquipamento();
        }elseif ($acao == "alterarEquipamento") {
            $controle->alterarEquipamento();
            }
    }

    
?>