<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercícios</title>
    </head>
    <body>
        <h2>Exercício 1</h2>
        <i>
            Crie um script PHP que mostra o nome do país e sua capital usando uma array chamada $location. 
            Ordene a Lista pelo nome da capital e adicione pelo menos 5 entradas no array.     
        </i>
        <hr />
        <br />
        <?php
        $location = array(
            "Afeganistão" => "Cabul",
            "África do Sul" => "Pretória",
            "Albânia" => "Tirana",
            "Alemanha" => "Berlim",
            "Andorra" => "Andorra-a-Velha"
        );
        asort($location);
        foreach ($location as $country => $capital) {
            echo 'A capital do <strong>' . $country . '</strong> e <strong>' . $capital . '</strong><br>';
        }
        ?>
        <br /><br />
        <button onclick="window.location.href='index.php'">Voltar</button>
    </body>
</html>