<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calculadora de Juros Simples</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h1>Calculadora de Juros Simples</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        
        <h2>Juros</h2>
        <input type="number" name="juros" step="0.01"><br><br>

        <h2>Capital</h2>
        <input type="number" name="capital" step="0.01"><br><br>

        <h2>Prazo (em meses)</h2>
        <input type="number" name="prazo"><br><br>

        <h2>Taxa (%)</h2>
        <input type="number" name="taxa" step="0.01"><br><br>

        <h2>Operação</h2>
        <select name="operacao" required>
            <option value="">Selecione</option>
            <option value="juros">Calcular Juros</option>
            <option value="capital">Calcular Capital</option>
            <option value="prazo">Calcular Prazo</option>
            <option value="taxa">Calcular Taxa</option>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form>

    <?php
    if (isset($_GET['operacao'])) {
        $operacao = $_GET['operacao'];
        $juros = $_GET['juros'] ?? null;
        $capital = $_GET['capital'] ?? null;
        $prazo = $_GET['prazo'] ?? null;
        $taxa = $_GET['taxa'] ?? null;

        // Calcular Juros
        if ($operacao == "juros") {
            if (!empty($capital) && !empty($taxa) && !empty($prazo)) {
                $juros = $capital * ($taxa / 100) * $prazo;
                echo "<h2>O Juros é: <strong>X = " . number_format($juros, 2, ',', '.') . "</strong></h2>";
            } else {
                echo "<p style='color:red;'>Informe Capital, Taxa e Prazo válidos para calcular o Juros.</p>";
            }
        }

        // Calcular Capital
        if ($operacao == "capital") {
            if (!empty($juros) && !empty($taxa) && !empty($prazo) && $taxa > 0 && $prazo > 0) {
                $capital = $juros / (($taxa / 100) * $prazo);
                echo "<h2>O Capital é: <strong>X = " . number_format($capital, 2, ',', '.') . "</strong></h2>";
            } else {
                echo "<p style='color:red;'>Informe Juros, Taxa e Prazo válidos para calcular o Capital.</p>";
            }
        }

        // Calcular Prazo
        if ($operacao == "prazo") {
            if (!empty($juros) && !empty($capital) && !empty($taxa) && $taxa > 0) {
                $prazo = $juros / ($capital * ($taxa / 100));
                echo "<h2>O Prazo é: <strong>X = " . number_format($prazo, 2, ',', '.') . " meses</strong></h2>";
            } else {
                echo "<p style='color:red;'>Informe Juros, Capital e Taxa válidos para calcular o Prazo.</p>";
            }
        }
    }

        // Calcular taxa
        if ($operacao == "taxa") {
            if (!empty($juros) && !empty($capital) && !empty($prazo) && $capital > 0 && $prazo > 0) {
                $taxa = ($juros / ($capital * $prazo)) * 100;
                echo "<h2>A Taxa é: <strong>X = " . number_format($taxa, 2, ',', '.') . " %</strong></h2>";
            } else {
                echo "<p style='color:red;'>Informe Juros, Capital e Prazo válidos para calcular a Taxa.</p>";
            }
        }
    ?>
</body>
</html>