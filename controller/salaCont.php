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
            $dao->inserirSala($sala);
        }
        function alterarSala(){
            $sala = New Sala();
            $sala-> idSala = $_POST["id"];
            $sala-> nome = $_POST["nome"];
            $sala-> location = $_POST["location"];
            $sala-> capacidade = $_POST["capacidade"];
            $dao = new SalaDao();
            $dao->alterarSala($sala);
        }
        
        function excluirSala(){
            $sala = New Sala();
            $sala-> idSala = $_GET["id"];
            $dao = New SalaDao();
            $dao->excluirSala($sala);
        }
        function getSala(){

            $sala = New Sala();
            $dao = New SalaDao();
            $data = $dao->getSala($sala);
            echo json_encode($data);
    }
    function pegarPorId():array{
        $sala = New Sala();
        $sala-> idSala = $_GET["id"];
        $dao = New SalaDao();
        $data =$dao->pegarPorId($sala);
        return($data);
    }
}
   
$controle = new SalaCont();
if (isset( $_REQUEST["acao"])) {
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