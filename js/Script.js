function ordenarTabela(indiceColuna) {
    var tabela, linhas, trocando, i, celulaAtual, celulaProxima, deveTrocar, direcao, contadorTrocas = 0;
    tabela = document.getElementById("table");
    trocando = true;
    direcao = "asc"; // Define a direção de ordenação como crescente

    while (trocando) {
        trocando = false;
        linhas = tabela.rows;

        for (i = 1; i < (linhas.length - 1); i++) { // Percorre todas as linhas da tabela (exceto a última)
            deveTrocar = false;
            celulaAtual = linhas[i].getElementsByTagName("TD")[indiceColuna]; // Célula da coluna especificada na linha atual
            celulaProxima = linhas[i + 1].getElementsByTagName("TD")[indiceColuna]; // Célula da coluna especificada na próxima linha

            if (direcao == "asc") {
                if (celulaAtual.innerHTML.toLowerCase() > celulaProxima.innerHTML.toLowerCase()) {
                    deveTrocar = true; // Marca as linhas para troca se estiverem fora de ordem (ascendente)
                    break;
                }
            } else if (direcao == "desc") {
                if (celulaAtual.innerHTML.toLowerCase() < celulaProxima.innerHTML.toLowerCase()) {
                    deveTrocar = true; // Marca as linhas para troca se estiverem fora de ordem (descendente)
                    break;
                }
            }
        }

        if (deveTrocar) {
            linhas[i].parentNode.insertBefore(linhas[i + 1], linhas[i]); // Troca as linhas
            trocando = true;
            contadorTrocas++;
        } else {
            if (contadorTrocas == 0 && direcao == "asc") {
                direcao = "desc"; // Muda a direção de ordenação para descendente se nenhuma troca foi feita
                trocando = true;
            }
        }
    }
}

function filtrarTabela() {
    var input, filtro, tabela, linhas, td, i, j, textoCelula, deveMostrar;
    input = document.getElementById("barraPesquisa");
    filtro = input.value.toLowerCase();
    tabela = document.getElementById("table");
    linhas = tabela.getElementsByTagName("tr");

    for (i = 1; i < linhas.length; i++) {
        linhas[i].style.display = "none"; // Oculta todas as linhas inicialmente
        tds = linhas[i].getElementsByTagName("td");
        for (j = 0; j < tds.length; j++) {
            td = tds[j];
            if (td) {
                textoCelula = td.textContent || td.innerText;
                if (textoCelula.toLowerCase().indexOf(filtro) > -1) {
                    linhas[i].style.display = ""; // Mostra a linha se a célula contém o texto da pesquisa
                    break;
                }
            }
        }
    }
}

