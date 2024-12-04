<?php
    include_once "../model/reserva.php";
    include_once "../util/conexao.php";
    class ReservaDao{
        function inserirReserva(Reserva $reserva){
            $parametros = array(
                "idSala"=> $reserva->idSala,
                "idUsuario"=>$reserva->idUsuario,
                "tipo"=> $reserva->tipo,
                "data"=> $reserva->dataReserva,
                "inicio"=> $reserva ->inicioReserva,
                "fim"=> $reserva->fimReserva,
            );
            $query = "insert into reserva (idSala, idUsuario, tipo, dataReserva, inicioReserva, fimReserva)
            values (:idSala, :idUsuario, :tipo, :data, :inicio, :fim)";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('reserva adicionada com sucesso!'); window.location.href='../view/Reserva.php';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao adicionar equipamento: " . $e->getMessage() . "'); window.location.href='../view/newReserva.php';</script>";
        }
        }

        function excluirReserva(Reserva $reserva) {
            
            $parametros = array(
                "idReserva" => $reserva->idReserva
            );
            $query = "DELETE FROM reserva WHERE idReserva = :idReserva";
        
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Equipamento excluído com sucesso!'); window.location.href='../view/Equipamentos.php';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao excluir equipamento! o equipamento não pode ser excluído pois está vinculado a uma sala'); window.location.href='../view/Equipamentos.php';</script>";
            }
        }

        function alterarReserva(Reserva $reserva){
            $parametros = array(
                "idReserva"=>$reserva->idReserva,
                "idSala"=> $reserva->idSala,
                "idUsuario"=>$reserva->idUsuario,
                "tipo"=> $reserva->tipo,
                "data"=> $reserva->dataReserva,
                "inicio"=> $reserva ->inicioReserva,
                "fim"=> $reserva->fimReserva,
            );
            
            $query = "update reserva SET idSala= :idSala, idUsuario = :idUsuario, tipo= :tipo, dataReserva = :data, inicioReserva = :inicio, fimReserva :fim where idReserva = :idReserva";
            try {
                Conexao::executarComParametros($query, $parametros);
                echo "<script>alert('Reserva alterada com sucesso!'); window.location.href='../view/equipamentos.html';</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Erro ao alterar equipamento: " . $e->getMessage() . "'); window.location.href='../view/equipamentos.html';</script>";
            }
        }

        function pegarPorId( Equipamento $equipamento){
            $parametros = Array(
                ":idReserva" => $equipamento-> id
            );
            $query = "select * from Reserva where idReserva = :idReserva";
            $stmt = Conexao::executarComParametros($query, $parametros);
             return $equipamento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
              
        
        
        }
        function getReserva($reserva){
        
            // Prepara a consulta com proteção contra SQL Injection
            $query = "SELECT * FROM reserva";
        
            $stmt=Conexao::executar($query);
            $reserva = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reserva;
        }
    }
?>
