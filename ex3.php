<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercícios</title>
    </head>
    <body>
        <h2>Exercício 3</h2>
        <i>
            Escreva uma função em PHP para pegar determinar a extensão dos 3 arquivos abaixo e mostrar as extensões na tela. 
            As saídas devem ser mostradas em uma lista em ordem alfabética.
            <br /><br />
            Arquivos de exemplo<br />
            a) music.mp4<br />
            b) video.mov<br />
            c) imagem.jpeg
            <br /><br />
            Saida experada:<br />
            1 .jpeg<br />
            2 .mov<br />
            3 .mp4
        </i>
        <hr />
        <br />

        <?php
        if (!empty($_FILES)) {
            $extensaos = array();
            foreach ($_FILES['file']['name'] as $file) {
                if ($file) {
                    $extensaos[] = "." . pathinfo($file, PATHINFO_EXTENSION);
                }
            }
            if ($extensaos) {
                asort($extensaos);
                echo "Extensões enviadas:";
                echo "<ol><li>";
                echo "<strong>" . implode("</li><li>", $extensaos) . "<strong>";
                echo "</li></ol><br />";
            }
        }
        ?>

        <form enctype="multipart/form-data" method="post">
            Arquivo 1: <input type="file" name="file[]">
            <br />
            Arquivo 2: <input type="file" name="file[]">
            <br />
            Arquivo 3: <input type="file" name="file[]">
            <br /><br />
            <button type="submit">Quais são as extensões?</button>
        </form>
        <br /><br />
        <button onclick="window.location.href='index.php'">Voltar</button>
    </body>
</html>