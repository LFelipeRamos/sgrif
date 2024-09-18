<?php
include 'util/conexao.php';

$query = "SELECT s.idSala,s.nome, s.localizacao, s.capacidade,
coalesce(group_concat(e.tipo,',') , 'Sem Equipamentos')as tipos_equipamentos
FROM sala s
left join equipamento_sala es on es.idSala = s.idSala
left join equipamento e on e.idEquipamento = es.idEquipamento
group by 1, 2, 3 ";
$stmt = Conexao::executar($query);

$sala = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($sala);
?>