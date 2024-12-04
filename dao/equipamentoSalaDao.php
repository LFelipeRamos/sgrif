<?php
    include_once("../model/equipamentoSala.php");
    include_once("../util/conexao.php");
    class EquipamentoSalaDao{
        function inserirEquipamento(EquipamentoSala $eSala){
            $parametros = array(
                "idSala"=> $eSala->idSala,
                "idEquipamento"=> $eSala->idEquipamento,
                "qtdeTotal"=> $eSala ->qtdeTotal,
                "qtdeOperavel"=>$eSala->qtdeOperavel
            );
            $query = "insert into equipamento_sala (idSala, idEquipamento, qtdeTotal, qtdeOperavel)
            values (:idSala, :idEquipamento, :qtdeTotal, :qtdeOperavel )";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Equipamento adicionado com sucesso!'); window.location.href='../view/equipamentoSala.php?id=".$parametros['idSala']."';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('|".$parametros["idSala"]."|Erro ao adicionar equipamento: " . $e->getMessage() . "'); window.location.href='../view/equipamentoSala.php';</script>";
        }
        }

        function excluirEquipamento(EquipamentoSala $eSala) {
            
            $parametros = array(
                "idEquipamento" => $eSala->idEquipamento,
                "idSala"=>$eSala->idSala
                
            );
            $query = "DELETE FROM equipamento_sala WHERE idEquipamento = :idEquipamento AND idSala = :idSala";
            Conexao::executarComParametros($query, $parametros);
            
        }
        
        function getEquipamentoSala($eSala){
            $parametros = array(
                "idSala" => $eSala->idSala
            );
        
            // Prepara a consulta com proteção contra SQL Injection
            $query = "SELECT e.marca, e.tipo, es.qtdeTotal,es.qtdeOperavel, e.idEquipamento, es.idSala FROM equipamento_sala es INNER JOIN equipamento e ON e.idEquipamento = es.idEquipamento WHERE es.idSala = :idSala";
        
            $stmt=Conexao::executarComParametros($query, $parametros);
            $eSala = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $eSala;
        }
        
        
    }
?>
