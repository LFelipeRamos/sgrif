<?php
include_once ("reservaCont.php");
class OcorrenciaCont {
    function obterDatasPorDiaSemana() {
        $dataInicio = $_REQUEST['dataInicio'] ?? null;
        $dataFim = $_REQUEST['dataFim'] ?? null;
        $diaSemana = $_REQUEST['dia'] ?? null;
        // Array para armazenar as datas encontradas
        $datas = [];
        
        // Converter os dias da semana para os índices numéricos correspondentes
        $diasSemana = [
            'domingo' => 0,
            'segunda' => 1,
            'terça' => 2,
            'quarta' => 3,
            'quinta' => 4,
            'sexta' => 5,
            'sabado' => 6,
        ];
    
        // Validar o dia da semana fornecido
        if (!array_key_exists(strtolower($diaSemana), $diasSemana)) {
            throw new Exception("Dia da semana inválido. Use: " . implode(', ', array_keys($diasSemana)));
        }
    
        // Obter o índice do dia da semana
        $indiceDiaSemana = $diasSemana[strtolower($diaSemana)];
    
        // Converter as datas de início e fim para DateTime
        $dataAtual = new DateTime($dataInicio);
        $dataFim = new DateTime($dataFim);
    
        // Iterar sobre o intervalo
        while ($dataAtual <= $dataFim) {
            // Verificar se o dia da semana atual corresponde ao especificado
            if ($dataAtual->format('w') == $indiceDiaSemana) {
                $datas[] = $dataAtual->format('Y-m-d');
            }
            // Avançar para o próximo dia
            $dataAtual->modify('+1 day');
        }
    
        return($datas);
    }
    
}


    $controle = new OcorrenciaCont();

    // Verificar se a ação é "datas"
    if (isset($_REQUEST["acao"])) {
       
        $acao = $_REQUEST["acao"];
        if ($acao== "data") {
            $controle->obterDatasPorDiaSemana();
        }
    } 

        // Validar se os parâmetros foram passados
        var_dump($_GET['idReserva']); 
            $datas = $controle->obterDatasPorDiaSemana();
            echo "Datas encontradas: <br>";
        foreach ($datas as $data) {
            echo $data ."a";
           
        }  
        


?>
