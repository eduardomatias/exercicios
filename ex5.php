<?php
$error = '';
$convertido = false;
if (!empty($_FILES)) {

    function xmlToCsv($xml, $f)
    {
        foreach ($xml->children() as $item) {
            if (!count($item->children())) {
                $put_arr = array($item->getName(), $item);
                fputcsv($f, $put_arr, ';', '"');
            } else {
                xmlToCsv($item, $f);
            }
        }
    }

    $xml = simplexml_load_file($_FILES['xml']['tmp_name']);
    if (!$xml) {
        $error = 'Arquivo inválido!';
    } else {
        $csv = fopen('xmlToCsv.csv', 'w');
        xmlToCsv($xml, $csv);
        $convertido = true;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercícios</title>
    </head>
    <body>
        <h2>Exercício 5</h2>
        <i>
            Crie um parser que converte um arquivo XML em um arquivo CSV usando PHP.
        </i>
        <hr />
        <br />
        <div style="color: red">
            <?= $error ?>
        </div>
        <br />
        <form enctype="multipart/form-data" method="post">
            XML to CSV: <input type="file" name="xml" required> 
            <button type="submit">Converter agora</button>
        </form>
        <br />
        <div>
            <?= ($convertido) ? '<strong>Convertido com sucesso: </strong> <a href="xmlToCsv.csv">clique aqui para fazer download!</a>' : '' ?>
        </div>
        <br /><br />
        <button onclick="window.location.href = 'index.php'">Voltar</button>
    </body>
</html>