<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SpecLab - Home </title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="img/Speclab - logo.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
    <div class="space">
        <img src="img/Speclab - logo.svg" alt="" class="logo">
        <a href="#"> Comunidade </a>
        <a href="#"> Monte seu PC</a>
    </div>
    <div class="researchBox">
        <input type="text" placeholder="Buscar produto..." class="research">
    </div>
    <div class="space">
        <img src="img/Perfil 2.png" alt="" class="icon">
        <img src="img/chamada-de-ajuda.png" alt="" class="icon">
    </div>
</nav>

<main>
    <a href="#" class="sombra"> Ver todos os produtos </a>
    <form action="" method="post" enctype="multipart/form-data" class="estoque">
        <h3> Adicionar produto ao site </h3>

        <label for="name"> Título do Produto </label>
        <input type="text" placeholder="Escreva aqui!" name="name">
        <label for="desc"> Desçrição do Produto</label>
        <input type="text" name="desc" placeholder="Escreva aqui!">
        <label for="valor"> Valor do Produto </label>
        <input type="number" name="preco" step="0.01" min="0" placeholder="Ex: 4452.90">

        <label for="file"> Fotos </label>
        <input type="file" name="foto[]" class="imgFile">

        <button type="submit" id="botao"> Enviar </button>
    </form>
</main>
</body>
</html>

<?php
if (isset($_POST['nome'])) {
    $nome = addsLashes ($_POST['nome']);
    $valor = addslashes ($_POST['valor']);
    $descricao = addslashes ($_POST['desc']);
    $nome_arquivo = '';

    $fotos = array();

    if (isset($_FILES['foto'])) {
        $tipo = '';
        for ($i = 0; $i < count($_FILES['foto']['name']); $i++) {
            if ($_FILES['foto']['type'][$i] == 'image/jpeg'){
                $tipo = ".jpg";
            } else if ($_FILES['foto']['type'][$i] == 'imagem/png') {
                $tipo = ".png";
            } else {
                $tipo = "outro";
            }

            if ($tipo == "outro") {
                echo "<script>alert(Só é disponível enviar arquivos JPG e JPEG. Por favor, tente novamente.')</script>";
            } else {
                $nome_arquivo = md5 ($_FILES ['foto']['name'][$i].rand(1,999)).$tipo;
                move_uploaded_file($_FILES['fotos']['tmp_name'][$i], 'imagens/'.$nome_arquivo);
            }
        }
    }
}