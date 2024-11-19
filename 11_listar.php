<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta os dados da tabela clientes, incluindo o telefone
$sql = "SELECT id, nome, email, telefone FROM clientes";
$result = $conn->query($sql);

// Verifica se existem registros e os exibe em formato de tabela 
if ($result->num_rows > 0) {
    echo "<h2>Lista de clientes cadastrados</h2>";
    
    // Define formato da tabela
    echo "<table border='2'>";
    
    // Define cabeçalho da tabela
    echo "<tr><th>Nome</th><th>Email</th><th>Telefone</th></tr>";

    // Enquanto houver dados, exibe cada linha
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Escapa os dados antes de exibir para evitar XSS
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum cliente encontrado.";
}

// Encerra a conexão
$conn->close();
?>
