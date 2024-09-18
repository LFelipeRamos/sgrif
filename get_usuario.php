<?php
include 'util/conexao.php';

$query = "SELECT idUsuario, nome, email, tipo, senha FROM usuario";
$stmt = Conexao::executar($query);

$usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($usuario);
?>