<?php
    include_once "../model/reserva.php";
    include_once "../model/ocorrencia.php";
    include_once "../util/conexao.php";
    class ReservaDao{
        function inserirReserva(Reserva $reserva){
            $parametros = array(
                "idSala"=> $reserva->idSala,
                "idUsuario"=>$reserva->idUsuario,
                "tipo"=> $reserva->tipo,
                "dataReserva"=> $reserva->dataReserva,
                "dataInicio"=> $reserva ->inicioReserva,
                "dataFim"=> $reserva->fimReserva,
            );
            $query = "insert into reserva (idSala, idUsuario, tipo, dataReserva, inicioReserva, fimReserva)
            values (:idSala, :idUsuario, :tipo, :dataReserva, :dataInicio, :dataFim)";
            Conexao::executarComParametros($query, $parametros);
            

    // Retorna o ID inserido (opcional)
            
        }
    

        function excluirReserva(Reserva $reserva) {
            
            $parametros = array(
                "idReserva" => $reserva->idReserva
            );
            $query = "DELETE FROM reserva WHERE idReserva = :idReserva";
            Conexao::executarComParametros($query, $parametros);
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
            
            $query = "update reserva SET idSala= :idSala, idUsuario = :idUsuario, tipo= :tipo, dataReserva = :data, inicioReserva = :inicio, fimReserva = :fim where idReserva = :idReserva";
            Conexao::executarComParametros($query, $parametros);
        }

        function pegarPorId( Reserva $reserva){
            $parametros = Array(
                ":idReserva" => $reserva-> idReserva
            );
            $query = "SELECT s.nome as salaNome, u.nome as usuNome, r.tipo,r.dataReserva, r.inicioReserva, r.fimReserva, s.idSala, U.idUsuario, r.idReserva
            FROM reserva r INNER JOIN sala s ON s.idSala = r.idSala INNER JOIN usuario u ON u.idUsuario = r.idUsuario WHERE r.idReserva = :idReserva";
            $stmt = Conexao::executarComParametros($query, $parametros);
             return $reserva = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
              
        
        
        }
        function getReserva($reserva){
        
            // Prepara a consulta com proteção contra SQL Injection
            $query = "SELECT s.nome as salaNome, u.nome as usuNome, r.tipo,r.dataReserva, r.inicioReserva, r.fimReserva, s.idSala, U.idUsuario, r.idReserva
            FROM reserva r INNER JOIN sala s ON s.idSala = r.idSala INNER JOIN usuario u ON u.idUsuario = r.idUsuario";
        
            $stmt=Conexao::executar($query);
            $reserva = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return  $reserva;
        }
    }
?>
