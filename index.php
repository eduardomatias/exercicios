<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercícios</title>
    </head>
    <body>
        <h2>Exercícios - PHP</h2>
        <ul>
            <?php
            $qtdEx = 7;
            for ($i = 1; $i <= $qtdEx; $i++) {
                echo "<li><a href=\"ex" . $i . ".php\">Exercícios " . $i . "</a></li>\n";
            }
            ?>
        </ul>
    </body>
</html>