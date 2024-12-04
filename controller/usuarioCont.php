<?php
    include_once("../util/conexao.php");
    include_once("../dao/usuarioDao.php");
    class UsuarioCont{
        function inserirUsuario(){
            $Usuario = New Usuario();
            $Usuario-> nome = $_POST["nome"];
            $Usuario-> tipo = $_POST["tipo"];
            $Usuario-> email = $_POST["email"];
            //$Usuario-> senha = $_POST["senha"];
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
        function getUsuario(){

            $usuario = New Usuario();
            $dao = New UsuarioDao();
            $data = $dao->getusuario($usuario);
            echo json_encode($data);
    }
    function pegarPorId(): array{
        $usuario = New Usuario();
        $usuario-> id = $_GET["id"];
        $dao = New usuarioDao();
        $data =$dao->pegarPorId($usuario);
        return ($data);
    }

    }


    $controle = new UsuarioCont();
        #recebe pela url GET
    if (isset( $_REQUEST["acao"])) {
        $acao = $_REQUEST["acao"];
        if ($acao == "excluirUsuario") {
        $controle->excluirUsuario();
        }elseif($acao == "novoUsuario"){
        $controle->inserirUsuario();
        }elseif ($acao == "alterarUsuario") {
        $controle->alterarUsuario();
        }elseif($acao =="getUsuario"){
            $controle->getUsuario();
        }elseif($acao=="pegarPorId"){
            $controle->pegarPorId();
        }
    }

?>