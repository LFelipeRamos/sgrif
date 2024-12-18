<?php 
    include_once ("../util/conexao.php");
    include_once ("../dao/equipamentoSalaDao.php");
    class EquipamentoSalaCont{
        function inserirEquipamento(){
            $eSala = New EquipamentoSala();
            $id = $eSala-> idSala = $_POST["idSala"];
            $eSala-> idEquipamento = $_POST["selectEquipamento"];
            $eSala-> qtdeTotal = $_POST["quantidade"];
            $eSala->qtdeOperavel = $_POST["quantidadeOperavel"];
            $dao = new EquipamentoSalaDao();
            
            try {
                $dao->inserirEquipamento($eSala);
                $_SESSION['mensagem'] = ['sucesso' => 'Equipamento adicionado com sucesso!'];
            } catch (Exception $e) {
                $_SESSION['mensagem'] = ['erro' => 'Erro ao adicionar equipamento: ' . $e->getMessage()];
            }
            header("Location: ../view/equipamentoSala.php?id=$id");
            exit;
        }
        function excluirEquipamento(){
            $eSala = new EquipamentoSala();
            $id = $eSala->idSala = $_GET["id"];
            $eSala->idEquipamento = $_GET["idEquipamento"];
            $dao = new EquipamentoSalaDao();

         try {
            $dao->excluirEquipamento($eSala);
            $_SESSION['mensagem'] = ['sucesso' => 'Equipamento excluído com sucesso!'];
        } catch (Exception $e) {
            $_SESSION['mensagem'] = ['erro' => 'Erro ao excluir equipamento!'];
        }
        header("Location: ../view/equipamentoSala.php?id=$id");
        exit;
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
    if (isset( $_REQUEST["acao"])) {
        session_start();
        $acao = $_REQUEST["acao"];
        if ($acao == "excluirEquipamento") {
        $controle->excluirEquipamento();
        }elseif($acao == "getEquipamentoSala") {
            $controle->getEquipamentoSala();
        }elseif($acao == "inserirEquipamento"){
        $controle->inserirEquipamento();
        }
    }
    
?>