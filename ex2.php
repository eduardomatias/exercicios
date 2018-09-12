<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercícios</title>
    </head>
    <body>
        <h2>Exercício 2</h2>
        <i>
            Joãozinho vai morder o seu dedo 50% das vezes. Esse exercício será dividido em 2 partes.
            <br />
            a) Primeiro, cria uma função chamada foiMordido() que deverá retornar  TRUE para 50% das vezes e FALSE para os outros 50%. A função rand() pode ser útil aqui.
            <br />
            b) Após criar a função, crie um código/página que mostre as frases “Joãozinho mordeu o seu dedo !” ou “Joaozinho NAO mordeu o seu dedo !” usando a função foiMordido() que foi criado na primeira parte.
        </i>
        <hr />
        <br />
        <a href="#" onclick="location.reload(true)">Joãozinho mordeu o meu dedo?</a>
        <?php

        // a
        function foiMordido()
        {
            return (bool) rand(0, 1);
        }

        // b
        echo "<h3>" . (foiMordido() ? "Joãozinho mordeu o seu dedo!" : "Joãozinho NÃO mordeu o seu dedo!") . "</h3>";
        ?>
        <br /><br />
        <button onclick="window.location.href='index.php'">Voltar</button>
    </body>
</html>