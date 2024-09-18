<?php
    include_once("../model/Usuario.php");
    include_once("../util/conexao.php");
    class UsuarioDao{
        function inserirUsuario(Usuario $usuario){
            $parametros = array(
                "nome"=> $usuario->nome,
                "tipo"=> $usuario->tipo,
                "email"=> $usuario ->email,
                "senha"=> $usuario->senha
            );
            $query = "insert into Usuario (nome, tipo, email, senha)
            values (:nome, :tipo, :email, :senha)";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Usuario adicionado com sucesso!'); window.location.href='../Usuarios.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao adicionar Usuario: " . $e->getMessage() . "'); window.location.href='../newUsuario.html';</script>";
        }
        }

        function excluirUsuario(Usuario $usuario) {
            
            $parametros = array(
                "idUsuario" => $usuario->id
            );
            $query = "DELETE FROM Usuario WHERE idUsuario = :idUsuario";
        
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Usuario excluído com sucesso!'); window.location.href='../Usuarios.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao excluir Usuario: " . $e->getMessage() . "'); window.location.href='../Usuarios.html';</script>";
            }
        }

        function alterarUsuario(Usuario $usuario){
            $parametros = array(
                "id"=> $usuario->id,
                "nome"=> $usuario->nome,
                "tipo"=> $usuario->tipo,
                "email"=> $usuario ->email,
                "senha"=> $usuario->senha
            );
            
            $query = "update Usuario SET nome= :nome, tipo = :tipo, email = :email, senha = :senha where idUsuario = :id";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Usuario alterado com sucesso!'); window.location.href='../usuarios.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao alterar Usuario: " . $e->getMessage() . "'); window.location.href='../usuarios.html';</script>";
            }
        }
    }
?>
