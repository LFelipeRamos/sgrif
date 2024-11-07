<?php
    include_once "../model/equipamento.php";
    include_once "../util/conexao.php";
    class EquipamentoDao{
        function inserirEquipamento(Equipamento $equipamento){
            $parametros = array(
                "tipo"=> $equipamento->tipo,
                "marca"=> $equipamento->marca,
                "config"=> $equipamento ->config
            );
            $query = "insert into equipamento (tipo, marca, config)
            values (:tipo, :marca, :config)";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Equipamento adicionado com sucesso!'); window.location.href='../Equipamentos.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao adicionar equipamento: " . $e->getMessage() . "'); window.location.href='../newEquipamento.html';</script>";
        }
        }

        function excluirEquipamento(Equipamento $equipamento) {
            
            $parametros = array(
                "idEquipamento" => $equipamento->id
            );
            $query = "DELETE FROM equipamento WHERE idEquipamento = :idEquipamento";
        
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Equipamento excluído com sucesso!'); window.location.href='../Equipamentos.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao excluir equipamento! o equipamento não pode ser excluído pois está vinculado a uma sala'); window.location.href='../Equipamentos.html';</script>";
            }
        }

        function alterarEquipamento(Equipamento $equipamento){
            $parametros = array(
                "id"=> $equipamento->id,
                "tipo"=> $equipamento->tipo,
                "marca"=> $equipamento->marca,
                "config"=> $equipamento ->config
            );
            
            $query = "update equipamento SET tipo= :tipo, marca = :marca, config = :config where idEquipamento = :id";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Equipamento alterado com sucesso!'); window.location.href='../equipamentos.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao alterar equipamento: " . $e->getMessage() . "'); window.location.href='../equipamentos.html';</script>";
            }
        }

        function pegarPorId( Equipamento $equipamento){
            $parametros = Array(
                ":id" => $equipamento-> id
            );
            $query = "select * from equipamento where id = :id";
            $stmt = Conexao::executarComParametros($query, $parametros);
             return $equipamento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
              
        
        
        }
    }
?>
