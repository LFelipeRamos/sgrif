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
            Conexao::executarComParametros($query, $parametros);
        }

        function excluirUsuario(Usuario $usuario) {
            
            $parametros = array(
                "idUsuario" => $usuario->id
            );
            $query = "DELETE FROM Usuario WHERE idUsuario = :idUsuario";
            Conexao::executarComParametros($query, $parametros);
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
            Conexao::executarComParametros($query, $parametros);
            
        }
        function getUsuario($usuario): array{
        
            // Prepara a consulta com proteção contra SQL Injection
            $query = "SELECT * FROM usuario ORDER BY nome ASC";
        
            $stmt=Conexao::executar($query);
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuario;
        }
        function pegarPorId( Usuario $usuario): array  {
            $parametros = array(
                ":id" => $usuario-> id
            );
            $query = "select * from usuario where idUsuario = :id";
            $stmt = Conexao::executarComParametros($query, $parametros);
             return $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
              
        
        
        }
    }
?>
