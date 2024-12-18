<?php
include_once "../util/conexao.php";
include_once "../model/equipamento.php";
include_once "../dao/equipamentoDao.php";

class EquipamentoCont {
    function inserirEquipamento() {
        $equipamento = new Equipamento();
        $equipamento->tipo = $_POST["tipo"];
        $equipamento->marca = $_POST["marca"];
        $equipamento->config = $_POST["config"];
        $dao = new EquipamentoDao();

        try {
            $dao->inserirEquipamento($equipamento);
            $_SESSION['mensagem'] = ['sucesso' => 'Equipamento adicionado com sucesso!'];
        } catch (Exception $e) {
            $_SESSION['mensagem'] = ['erro' => 'Erro ao adicionar equipamento: ' . $e->getMessage()];
        }
        header("Location: ../view/equipamentos.php");
        exit;
    }

    function alterarEquipamento() {
        $equipamento = new Equipamento();
        $equipamento->id = $_POST["id"];
        $equipamento->tipo = $_POST["tipo"];
        $equipamento->marca = $_POST["marca"];
        $equipamento->config = $_POST["config"];
        $dao = new EquipamentoDao();

        try {
            $dao->alterarEquipamento($equipamento);
            $_SESSION['mensagem'] = ['sucesso' => 'Equipamento alterado com sucesso!'];
        } catch (Exception $e) {
            $_SESSION['mensagem'] = ['erro' => 'Erro ao alterar equipamento: ' . $e->getMessage()];
        }
        header("Location: ../view/equipamentos.php");
        exit;
    }

    function excluirEquipamento() {
        $equipamento = new Equipamento();
        $equipamento->id = $_GET["id"];
        $dao = new EquipamentoDao();

        try {
            $dao->excluirEquipamento($equipamento);
            $_SESSION['mensagem'] = ['sucesso' => 'Equipamento excluído com sucesso!'];
        } catch (Exception $e) {
            $_SESSION['mensagem'] = ['erro' => 'Erro ao excluir equipamento!'. $e->getMessage()];
        }
        header("Location: ../view/equipamentos.php");
        exit;
    }

    function getEquipamento() { 
        $dao = new EquipamentoDao();
        $data = $dao->getEquipamento();
        echo json_encode($data);
    }
    function pegarPorId(): array{
        $equipamento = New Equipamento();
        $equipamento-> id = $_GET["id"];
        $dao = New EquipamentoDao();
        $data =$dao->pegarPorId($equipamento);
        return ($data);
    }
}

$controle = new EquipamentoCont();

if (isset($_REQUEST["acao"])) {
    $acao = $_REQUEST["acao"];
    session_start();

    if ($acao == "excluirEquipamento") {
        $controle->excluirEquipamento();
    } else if ($acao == "novoEquipamento") {
        $controle->inserirEquipamento();
    } else if ($acao == "alterarEquipamento") {
        $controle->alterarEquipamento();
    } else if ($acao == "getEquipamento") {
        $controle->getEquipamento();
    }elseif($acao == "pegarPorId"){
        $controle->pegarPorId();
    }
}
?>
