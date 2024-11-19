<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Upload de Imagem</title>
</head>
<body>
    <h2>Armazenar imagens</h2>
    
    <!-- Formulário com método POST e enctype multipart/form-data -->
    <form method="post" action="" enctype="multipart/form-data">
        <label for="imagem">Selecione uma imagem:</label>
        <br><br>
        <input type="file" name="imagem" accept="image/*" required><br><br>
        <button type="submit">Upload</button>
    </form>
    
    <?php

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $diretorio_destino = 'uploads/';

        // Verifica se a pasta existe, caso não, cria a pasta
        if (!is_dir($diretorio_destino)) {
            mkdir($diretorio_destino, 0777, true);
        }

        // Obtém o nome do arquivo
        $nome_arquivo = basename($_FILES['imagem']['name']);
        
        // Validação de tipo e tamanho de arquivo
        $extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
        $tipos_permitidos = ['jpg', 'jpeg', 'png', 'gif'];
        $tamanho_maximo = 5 * 1024 * 1024; // 5MB

        // Verifica a extensão e o tamanho do arquivo
        if (!in_array($extensao, $tipos_permitidos)) {
            echo "<p>Erro: apenas arquivos de imagem (JPG, JPEG, PNG, GIF) são permitidos.</p>";
        } elseif ($_FILES['imagem']['size'] > $tamanho_maximo) {
            echo "<p>Erro: o arquivo é muito grande. O tamanho máximo permitido é 5MB.</p>";
        } else {
            // Corrige a concatenação do diretório e nome do arquivo
            $caminho_completo = $diretorio_destino . $nome_arquivo;

            // Move o arquivo enviado para o diretório de destino
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_completo)) {
                echo "<p>Upload realizado com sucesso!</p>";
                echo "<img src='$caminho_completo' alt='Imagem enviada' style='max-width: 300px;'>";
            } else {
                echo "<p>Erro ao fazer upload do arquivo.</p>";
            }
        }
    }
    ?>
</body>
</html>
