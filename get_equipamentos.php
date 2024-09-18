<?php
include 'util/conexao.php';

$query = "SELECT idEquipamento, tipo, marca, config FROM equipamento";
$stmt = Conexao::executar($query);

$equipamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($equipamentos);
?>