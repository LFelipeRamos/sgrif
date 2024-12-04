<?php
    include_once("../model/Usuario.php");
    include_once("../util/conexao.php");
    class UsuarioDao{
        function inserirUsuario(Usuario $usuario){
            $parametros = array(
                "nome"=> $usuario->nome,
                "tipo"=> $usuario->tipo,
                "email"=> $usuario ->email,
                //"senha"=> $usuario->senha
            );
            $query = "insert into Usuario (nome, tipo, email)
            values (:nome, :tipo, :email)";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Usuario adicionado com sucesso!'); window.location.href='../view/Usuarios.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao adicionar Usuario: " . $e->getMessage() . "'); window.location.href='../view/newUsuario.html';</script>";
        }
        }

        function excluirUsuario(Usuario $usuario) {
            
            $parametros = array(
                "idUsuario" => $usuario->id
            );
            $query = "DELETE FROM Usuario WHERE idUsuario = :idUsuario";
        
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Usuario excluído com sucesso!'); window.location.href='../view/Usuarios.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao excluir Usuario: " . $e->getMessage() . "'); window.location.href='../view/Usuarios.html';</script>";
            }
        }

        function alterarUsuario(Usuario $usuario){
            $parametros = array(
                "id"=> $usuario->id,
                "nome"=> $usuario->nome,
                "tipo"=> $usuario->tipo,
                "email"=> $usuario ->email,
               // "senha"=> $usuario->senha
            );
            
            $query = "update Usuario SET nome= :nome, tipo = :tipo, email = :email where idUsuario = :id";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Usuario alterado com sucesso!'); window.location.href='../view/usuarios.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao alterar Usuario: " . $e->getMessage() . "'); window.location.href='../view/usuarios.html';</script>";
            }
        }
        function getUsuario($usuario): array{
        
            // Prepara a consulta com proteção contra SQL Injection
            $query = "SELECT * FROM usuario";
        
            $stmt=Conexao::executar($query);
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuario;
        }
        function pegarPorId( Usuario $usuario): array  {
            $parametros = Array(
                ":id" => $usuario-> id
            );
            $query = "select * from usuario where idUsuario = :id";
            $stmt = Conexao::executarComParametros($query, $parametros);
             return $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
              
        
        
        }
    }
?>
