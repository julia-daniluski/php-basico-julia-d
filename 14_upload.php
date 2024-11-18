<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Upload de Imagem</title>
</head>
<body>
    <h2>Armazenar imagens</h2>
    
    <!-- formulário com método post -->
    <!-- multipart/form-data: Este valor é necessário se o usuário for enviar um arquivo através do formulário -->
    <form method="post" action="" enctype="multipart/form-data">
        <label for="imagem">Selecione uma imagem:</label>
        <br><br>
        <input type="file" name="imagem" accept="image/*" required><br><br>

        <button type="submit">Upload</button>
    </form>


    <?php

 
        // Digitar PHP (1º Aqui)


        // Move o arquivo enviado para o diretório de destino
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_completo)) {
            echo "<p>Upload realizado com sucesso!</p>";
            echo "<img src='$caminho_completo' alt='Imagem enviada' style='max-width: 300px;'>";
        } else {
            echo "<p>Erro ao fazer upload do arquivo.</p>";
        }
    
    ?>
</body>
</html>
