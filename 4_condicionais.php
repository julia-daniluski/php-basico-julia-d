<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe a senha enviada
    $senha = $_POST['senha'];

    if ($senha === '12345') {
        // Redireciona para a página de boas-vindas
        header("Location: 4b_bem_vindo.php");
        exit();
    } else {
        // Exibe mensagem de erro
        $erro = "Senha incorreta. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página de Login</title>
</head>
<body>
    <h2>Digite a senha para continuar:</h2>
    <form method="post" action="">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
        <button type="submit">Entrar</button>
    </form>

    <?php
    // Exibe a mensagem de erro, se houver
    if (isset($erro)) {
        echo "<p style='color: red;'> $erro </p>";
    }
    ?>
</body>
</html>
