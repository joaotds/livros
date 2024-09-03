<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include_once("conexao.php");

$objeto = new Conexao();
$conn = $objeto->getConexao();
print_r($conn);

if(isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $qtdPaginas = $_POST['qtdPaginas'];

    $sql = "INSERT INTO livros (titulo, genero, qtd_paginas)
    VALUES (?,?,?)";
    $stm = $conn->prepare($sql);
    $stm->execute(([$titulo, $genero, $qtdPaginas]));

    echo $titulo . " - " . $genero . " - " . $qtdPaginas;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>
<body>
    

    <h3>Formulario do Livro</h3>
    <form action="" method="POST">

        <input type="text" name="titulo"
            placeholder="Informe o titulo" />

            <br><br>

            <select name="genero">
                <option value="A">Aventura</option>
                <option value="D">Drama</option>
                <option value="F">Ficção</option>
                <option value="R">Romance</option>
                <option value="O">Outras</option>
                
            </select>

            <br><br>

            <input type="number" name="qtdPaginas"
            placeholder="Informe a quantidade de paginas" />

            <br><br>

            <input type="submit" value="Gravar" />
            <input type="reset" value="Limpar" />
    </form>

    <h3>Listagem do Livro</h3>

    <?php
        $sql = "SELECT * FROM livros";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $livros = $stm->fetchAll();
    ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>genero</th>
            <th>paginas</th>
            <th></th>
        </tr>

        <?php foreach($livros as $l): ?>
            <tr>
                <td><?php echo $l["id"]; ?></td>
                <td><?php echo $l["titulo"]; ?></td>
                <td><?php echo $l["genero"]; ?></td>
                <td><?php echo $l["qtd_paginas"]; ?></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
        

        </table>
</body>
</html>
