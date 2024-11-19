<?php
// db: CREATE DATABASE exercicio; 
// USE exercicio;
//CREATE TABLE clientes ( id INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL );

// ALTERAR de acordo com o número da porta
// verificar conexão com o XAMPP
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "exercicio";

try {
    // Confere se as informações estão corretas
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se houve algum erro na conexão
    if ($conn->connect_error) {
        throw new Exception("Falha na conexão: " . $conn->connect_error);
    }
    echo "Conexão realizada com sucesso!";
} catch (Exception $e) {
    // Exibe uma mensagem de erro amigável
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>
