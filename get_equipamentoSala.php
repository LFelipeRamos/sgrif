<?php
include 'util/conexao.php';
include 'model/equipamentoSala.php';
session_start();

// Corrige o uso do método $_GET


try {
    $eSala= new EquipamentoSala();
    $eSala->idSala = $_GET["id"];
    $parametros = array(
        "idSala" => $eSala->idSala
    );

    // Prepara a consulta com proteção contra SQL Injection
    $query = "SELECT e.marca, e.tipo, es.qtdeTotal,es.qtdeOperavel, e.idEquipamento, es.idSala FROM equipamento_sala es INNER JOIN equipamento e ON e.idEquipamento = es.idEquipamento WHERE es.idSala = :idSala";

    $stmt=Conexao::executarComParametros($query, $parametros);
    $eSala = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($eSala);
} catch (PDOException $e) {
    // Em caso de erro, retorna uma mensagem de erro
    echo json_encode(['error' => $e->getMessage()]);
}
?>