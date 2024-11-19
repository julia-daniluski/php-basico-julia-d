<!-- Passar id via URL -->
<!-- http://localhost/php-basico-Alunos/13_exclusao.php?id=2-->

<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);  // Corrigido: concatenar a mensagem de erro
}

// Verifica se um ID foi passado via URL para exclusão
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Definir a consulta SQL de exclusão
    $sql = "DELETE FROM clientes WHERE id='$id'";
    
    // Executa a consulta e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        echo "<p>Cliente excluído com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir cliente: " . $conn->error . "</p>";  // Corrigido: concatenar o erro corretamente
    }
}

// Fecha a conexão
$conn->close();
?>