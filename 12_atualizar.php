<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio"; // Corrigido o erro de sintaxe aqui
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error); // Corrigido a sintaxe do die
}

// Inicializa a variável $cliente como null
$cliente = null;

// Verifica se um ID foi passado via URL para edição
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Usando prepared statement para evitar SQL Injection
    $stmt = $conn->prepare("SELECT * FROM clientes WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" indica que o parâmetro é um inteiro
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se encontrou um registro no banco de dados
    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        echo "Cliente não encontrado.";
        exit();
    }
}

// Verifica se o formulário foi enviado para atualizar o cliente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Usando prepared statement para evitar SQL Injection
    $stmt = $conn->prepare("UPDATE clientes SET nome = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $nome, $email, $id); // "ssi" indica que nome e email são strings e id é inteiro
    
    if ($stmt->execute()) {
        echo "<p>Cliente atualizado com sucesso!</p>";
    } else {
        echo "<p>Erro ao atualizar cliente: " . $stmt->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <!-- Formulário para editar cliente -->
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo isset($cliente['id']) ? $cliente['id'] : ''; ?>"> <!-- ID do cliente -->

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo isset($cliente['nome']) ? $cliente['nome'] : ''; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($cliente['email']) ? $cliente['email'] : ''; ?>" required><br>

        <button type="submit">Atualizar Cliente</button>
    </form>
</body>
</html>
