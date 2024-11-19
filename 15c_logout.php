<?php
// Página de logout (15c_logout.php)
session_start();

// Destroi a sessão do usuário
session_destroy();

// Redireciona para a página de login ou para o sistema
header("Location: 15a_sistema.php");
exit();
?>
