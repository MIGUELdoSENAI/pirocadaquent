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
</body>
</html>
