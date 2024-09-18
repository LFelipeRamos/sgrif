<?php
    include_once("../util/conexao.php");
    include_once("../dao/usuarioDao.php");
    class UsuarioCont{
        function inserirUsuario(){
            $Usuario = New Usuario();
            $Usuario-> nome = $_POST["nome"];
            $Usuario-> tipo = $_POST["tipo"];
            $Usuario-> email = $_POST["email"];
            $Usuario-> senha = $_POST["senha"];
            $dao = new UsuarioDao();
            $dao->inserirUsuario($Usuario);
        }
        function alterarUsuario(){
            $Usuario = New Usuario();
            $Usuario-> id = $_POST["id"];
            $Usuario-> nome = $_POST["nome"];
            $Usuario-> tipo = $_POST["tipo"];
            $Usuario-> email = $_POST["email"];
            $Usuario-> senha = $_POST["senha"];
            $dao = new UsuarioDao();
            $dao->alterarUsuario($Usuario);
        }
        
        function excluirUsuario(){
            $Usuario = New Usuario();
            $Usuario-> id = $_GET["id"];
            $dao = New UsuarioDao();
            $dao->excluirUsuario($Usuario);
        }

    }


    $controle = new UsuarioCont();
        #recebe pela url GET
    if (isset( $_GET["acao"])) {
        $acao = $_GET["acao"];
        if ($acao == "excluirUsuario") {
        $controle->excluirUsuario();
        }
    }else {#recebe pelo form POST
        $acao = $_POST["acao"];
        if($acao == "novoUsuario"){
        $controle->inserirUsuario();
        }elseif ($acao == "alterarUsuario") {
        $controle->alterarUsuario();
        }
    }

?>