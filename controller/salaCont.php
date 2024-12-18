<?php
    include_once("../util/conexao.php");
    include_once("../dao/salaDao.php");
    class salaCont{
        function inserirSala(){
            $sala = New sala();
            $sala-> nome = $_POST["nome"];
            $sala-> location = $_POST["location"];
            $sala-> capacidade = $_POST["capacidade"];
            $dao = new salaDao();
            
            try {
                $dao->inserirSala($sala);
                $_SESSION['mensagem'] = ['sucesso' => 'Sala adicionada com sucesso!'];
            } catch (Exception $e) {
                $_SESSION['mensagem'] = ['erro' => 'Erro ao adicionar Sala: ' . $e->getMessage()];
            }
            header("Location: ../view/salas.php");
            exit;
        }
        function alterarSala(){
            $sala = New Sala();
            $sala-> idSala = $_POST["id"];
            $sala-> nome = $_POST["nome"];
            $sala-> location = $_POST["location"];
            $sala-> capacidade = $_POST["capacidade"];
            $dao = new SalaDao();
            
            try {
                $dao->alterarSala($sala);
                $_SESSION['mensagem'] = ['sucesso' => 'Sala alterada com sucesso!'];
            } catch (Exception $e) {
                $_SESSION['mensagem'] = ['erro' => 'Erro ao alterar Sala: ' . $e->getMessage()];
            }
            header("Location: ../view/salas.php");
            exit;
        }
        
        function excluirSala(){
            $sala = New Sala();
            $sala-> idSala = $_GET["id"];
            $dao = New SalaDao();
            $dao->excluirSala($sala);
            try {
                $dao->excluirSala($sala);
                $_SESSION['mensagem'] = ['sucesso' => 'Sala excluida com sucesso!'];
            } catch (Exception $e) {
                $_SESSION['mensagem'] = ['erro' => 'Erro ao excluida Sala: ' . $e->getMessage()];
            }
            header("Location: ../view/salas.php");
            exit;
        }
        function getSala(){

            $sala = New Sala();
            $dao = New SalaDao();
            $data = $dao->getSala($sala);
            echo json_encode($data);
    }
    function pegarPorId(): array{
        $sala = New Sala();
        $sala-> idSala = $_GET["id"];
        $dao = New SalaDao();
        $data =$dao->pegarPorId($sala);
        return ($data);
    }
}
   
$controle = new SalaCont();
if (isset( $_REQUEST["acao"])) {
    session_start();
    $acao = $_REQUEST["acao"];
    if ($acao == "excluirSala") {
    $controle->excluirSala();
    }elseif($acao == "novaSala"){
    $controle->inserirSala();
    }elseif ($acao == "alterarSala") {
    $controle->alterarSala();
    }elseif($acao =="getSala"){
    $controle->getSala();
    }elseif($acao =='pegarPorId'){
        $controle->pegarPorId();
    }
    }

?>