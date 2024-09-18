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
            $sala-> id = $_POST["id"];
            $sala-> nome = $_POST["nome"];
            $sala-> location = $_POST["location"];
            $sala-> capacidade = $_POST["capacidade"];
            $dao = new SalaDao();
            $dao->alterarSala($sala);
        }
        
        function excluirSala(){
            $sala = New Sala();
            $sala-> id = $_GET["id"];
            $dao = New SalaDao();
            $dao->excluirSala($sala);
        }
    }
    $controle = new SalaCont();
    #recebe pela url GET
if (isset( $_GET["acao"])) {
    $acao = $_GET["acao"];
    if ($acao == "excluirSala") {
    $controle->excluirSala();
    }
}else {#recebe pelo form POST
    $acao = $_POST["acao"];
    if($acao == "novaSala"){
    $controle->inserirSala();
    }elseif ($acao == "alterarSala") {
    $controle->alterarSala();
    }
}

?>