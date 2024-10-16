<?php
include 'util/conexao.php';

$query = "SELECT e.nome, e.qtdeTotal, e.qtdeOperavel,
coalesce(group_concat(e.tipo,',') , 'Sem Equipamentos')as tipos_equipamentos
FROM equipamento e
left join equipamento_sala es on es.idSala = s.idSala
left join equipamento e on e.idEquipamento = es.idEquipamento
group by 1, 2, 3 ";
$stmt = Conexao::executar($query);

$eSala = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($eSala);
?>