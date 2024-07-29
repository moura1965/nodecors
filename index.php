<?php
// Conectar à API em Node.js
$api_url = 'http://localhost:3000/data';
$data = json_decode(file_get_contents($api_url), true);

// Criar variáveis para armazenar os dados
$entradas = $data['entradas'];
$saidas = $data['saidas'];
$consumo_frigobar = $data['consumo_frigobar'];
$consumo_bar = $data['consumo_bar'];
$consumo_eroticos = $data['consumo_eroticos'];
$periodos = $data['periodos'];

// Criar o dashboard
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard JM Motel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Dashboard JM Motel</h1>
    </header>
    <main>
        <section>
            <h2>Movimento de Hóspedes</h2>
            <ul>
                <li>Entradas: <?= $entradas?> </li>
                <li>Saídas: <?= $saidas?> </li>
            </ul>
        </section>
        <section>
            <h2>Consumo por Categoria</h2>
            <ul>
                <li>Frigobar: <?= $consumo_frigobar?> </li>
                <li>Bar: <?= $consumo_bar?> </li>
                <li>Eróticos: <?= $consumo_eroticos?> </li>
            </ul>
        </section>
        <section>
            <h2>Períodos</h2>
            <ul>
                <?php foreach ($periodos as $periodo) {?>
                    <li><?= $periodo?> </li>
                <?php }?>
            </ul>
        </section>
        <section>
            <h2>Top 5 Hóspedes que mais Consumiram</h2>
            <ul>
                <?php foreach ($data['top_consumidores'] as $consumidor) {?>
                    <li><?= $consumidor['nome']?> - <?= $consumidor['consumo']?> </li>
                <?php }?>
            </ul>
        </section>
        <section>
            <h2>Top 5 Produtos mais Vendidos</h2>
            <ul>
                <?php foreach ($data['top_produtos'] as $produto) {?>
                    <li><?= $produto['nome']?> - <?= $produto['quantidade']?> </li>
                <?php }?>
            </ul>
        </section>
        <section>
            <h2>Média de Consumo por Hóspede</h2>
            <p><?= $data['media_consumo_hospede']?> </p>
        </section>
        <section>
            <h2>Média de Consumo por Categoria</h2>
            <ul>
                <li>Frigobar: <?= $data['media_consumo_frigobar']?> </li>
                <li>Bar: <?= $data['media_consumo_bar']?> </li>
                <li>Eróticos: <?= $data['media_consumo_eroticos']?> </li>
            </ul>
        </section>
        <section>
            <h2>Total de Consumo por Categoria</h2>
            <ul>
                <li>Frigobar: <?= $data['total_consumo_frigobar']?> </li>
                <li>Bar: <?= $data['total_consumo_bar']?> </li>
                <li>Eróticos: <?= $data['total_consumo_eroticos']?> </li>
            </ul>
        </section>
        <section>
            <h2>Total de Consumo por Período</h2>
            <ul>
                <?php foreach ($data['total_consumo_periodo'] as $periodo) {?>
                    <

                <li><?= $periodo['periodo']?> - <?= $periodo['total_consumo']?> </li>
            <?php }?>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 JM Motel</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>