<?php
    include_once("../model/equipamentoSala.php");
    include_once("../util/conexao.php");
    class EquipamentoSalaDao{
        function inserirEquipamento(EquipamentoSala $equipamento){
            $parametros = array(
                "idSala"=> $equipamento->idSala,
                "idEquipamento"=> $equipamento->idEquipamento,
                "qtdeTotal"=> $equipamento ->qtdeTotal,
                "qtdeOperavel"=>$equipamento->qtdeOperavel
            );
            $query = "insert into equipamento_sala (idSala, idEquipamento, qtdeTotal, qtdeOperavel)
            values (:idSala, :idEquipamento, :qtdeTotal, :qtdeOperavel )";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Equipamento adicionado com sucesso!'); window.location.href='../equipamentoSala.php?id=".$parametros['idSala']."';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('|".$parametros["idSala"]."|Erro ao adicionar equipamento: " . $e->getMessage() . "'); window.location.href='../equipamentoSala.php';</script>";
        }
        }

        function excluirEquipamento(EquipamentoSala $equipamento) {
            
            $parametros = array(
                "idEquipamento" => $equipamento->idEquipamento,
                "idSala"=>$equipamento->idSala
            );
            $query = "DELETE FROM equipamento_sala WHERE idEquipamento = :idEquipamento AND idSala = :idSala";
        
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Equipamento excluído com sucesso!'); window.location.href='../equipamentosSala.php?id=".$parametros['idSala']."';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao excluir equipamento: " . $e->getMessage() . "'); window.location.href='../equipamentosSala.php?id=".$parametros['idSala']."';</script>";
            }
        }

        
    }
?>
