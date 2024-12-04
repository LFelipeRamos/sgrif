<?php
    include_once("../model/sala.php");
    include_once("../util/conexao.php");
    class salaDao{
        function inserirSala(sala $sala){
            $parametros = array(
                "nome"=> $sala->nome,
                "location"=> $sala->location,
                "capacidade"=> $sala ->capacidade
            );
            $query = "insert into sala (nome, localizacao, capacidade)
            values (:nome, :location, :capacidade)";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('sala adicionado com sucesso!'); window.location.href='../view/salas.php';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao adicionar sala: " . $e->getMessage() . "'); window.location.href='../view/Sala.php';</script>";
            }
        }
        function excluirSala(Sala $sala) {
            
            $parametros = array(
                "idSala" => $sala->idSala
            );
            $query = "DELETE FROM Sala WHERE idSala = :idSala";
        
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Sala excluído com sucesso!'); window.location.href='../view/salas.php';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao excluir Sala: " . $e->getMessage() . "'); window.location.href='../view/salas.php';</script>";
            }
        }
        function alterarSala(Sala $sala){
            $parametros = array(
                "id"=> $sala->idSala,
                "nome"=> $sala->nome,
                "location"=> $sala->location,
                "capacidade"=> $sala ->capacidade
            );
            
            $query = "update sala SET nome= :nome, localizacao = :location, capacidade = :capacidade where idSala = :id";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Sala alterada com sucesso!'); window.location.href='../view/salas.php';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao alterar Sala: " . $e->getMessage() . "'); window.location.href='../view/salas.php';</script>";
            }
        }
        function getSala($sala){
        
            // Prepara a consulta com proteção contra SQL Injection
            $query = "SELECT * FROM sala";
        
            $stmt=Conexao::executar($query);
            $sala = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $sala;
        }
        function pegarPorId( Sala $sala){
            $parametros = Array(
                ":id" => $sala->idSala
            );
            $query = "select * from sala where idSala = :id";
            $stmt = Conexao::executarComParametros($query, $parametros);
             return $sala = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
              
        
        
        }

    }
?>
