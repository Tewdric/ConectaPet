<?php
$titulo = 'Home Administrador';
include './../../components/head/head.php';
?>

<body>
    <?php
    include './../../components/nav/nav_adm/sideBar.php';
    ?>

    <div class="main-content">
        <!-- seu conteúdo -->
        <div class="dashboard">

            <!-- CARDS TOPO -->
            <h3>Historico de Publicação</h3>

            <div class="cards_ADM">
                <div class="card roxo">
                    <span>1.500</span>
                    <p>Aprovados</p>
                </div>

                <div class="card azul">
                    <span>45</span>
                    <p>Publicações pendentes</p>
                </div>

                <div class="card vermelho">
                    <span>10</span>
                    <p>Recusados</p>
                </div>
            </div>

            <!-- CONTEÚDO -->
            <div class="conteudo">

                <!-- GRÁFICO -->
                <div class="grafico-box">
                    <h3>Solicitações de Adoção – Distribuição Semanal</h3>
                    <canvas id="graficoBarras"></canvas>
                </div>

                <!-- LADO DIREITO -->
                <div class="lado-direito">

                    <div class="grafico-circular">
                        <canvas id="graficoPizza"></canvas>
                    </div>

                    <div class="recentes">
                        <h3>Solicitações Recentes</h3>

                        <div class="item">Sandy Carvalho</div>
                        <div class="item">Sandy Carvalho</div>
                        <div class="item">Sandy Carvalho</div>
                        <div class="item">Sandy Carvalho</div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        // GRÁFICO DE BARRAS
        new Chart(document.getElementById("graficoBarras"), {
            type: "bar",
            data: {
                labels: ["DOM", "SEG", "TER", "QUA", "QUI", "SEX", "SAB"],
                datasets: [{
                    data: [20, 65, 30, 85, 50, 15, 60],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // GRÁFICO CIRCULAR
        new Chart(document.getElementById("graficoPizza"), {
            type: "doughnut",
            data: {
                labels: ["Concluídas", "Disponíveis", "Pendentes"],
                datasets: [{
                    data: [40, 30, 30],
                }]
            }

        });
    </script>
</body>