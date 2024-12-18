<?php
include_once "../model/equipamento.php";
include_once "../util/conexao.php";

class EquipamentoDao {
    function inserirEquipamento(Equipamento $equipamento) {
        $parametros = [
            "tipo" => $equipamento->tipo,
            "marca" => $equipamento->marca,
            "config" => $equipamento->config
        ];
        $query = "INSERT INTO equipamento (tipo, marca, config) VALUES (:tipo, :marca, :config)";
        Conexao::executarComParametros($query, $parametros);
    }

    function excluirEquipamento(Equipamento $equipamento) {
        $parametros = ["idEquipamento" => $equipamento->id];
        $query = "DELETE FROM equipamento WHERE idEquipamento = :idEquipamento";
        Conexao::executarComParametros($query, $parametros);
    }

    function alterarEquipamento(Equipamento $equipamento) {
        $parametros = [
            "id" => $equipamento->id,
            "tipo" => $equipamento->tipo,
            "marca" => $equipamento->marca,
            "config" => $equipamento->config
        ];
        $query = "UPDATE equipamento SET tipo = :tipo, marca = :marca, config = :config WHERE idEquipamento = :id";
        Conexao::executarComParametros($query, $parametros);
    }

    function getEquipamento() {
        $query = "SELECT idEquipamento, tipo, marca, config FROM equipamento";
        $stmt = Conexao::executar($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function pegarPorId( Equipamento $equipamento){
        $parametros = Array(
            ":id" => $equipamento-> id
        );
        $query = "select * from equipamento where idEquipamento = :id";
        $stmt = Conexao::executarComParametros($query, $parametros);
         return $equipamento = $stmt->fetchAll(PDO::FETCH_ASSOC);        
    }
}
?>
