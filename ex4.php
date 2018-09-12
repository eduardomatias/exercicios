<?php
if (!empty($_POST)) {

    // obtem registros gravados
    function getRegistro()
    {
        $registros = file('registros.txt');
        $dados = $email = $login = array();
        foreach ($registros as $registro) {
            if ($registro) {
                $r = json_decode($registro, true);
                $dados = array_merge($dados, $r);
                $email[] = $r['e-mail'];
                $login[] = $r['login'];
            }
        }
        return array('dados' => $dados, 'e-mail' => $email, 'login' => $login);
    }

    // valida registro
    function validateForm($post, &$error)
    {
        $registros = getRegistro();
        foreach ($post as $name => $input) {
            // email ou login já cadastrado
            if (($name == 'e-mail' || $name == 'login') && array_search($input, $registros[$name]) !== false) {
                $error[] = "O " . $name . " <strong>" . $input . "</strong> já foi cadastrado";
            }
            // campos obrigatórios
            if (!$input) {
                $error[] = "O campo " . $name . " é obrigatório.";
            }
        }
        return !$error;
    }

    // grava registro
    function saveForm($post)
    {
        $post['senha'] = sha1($post['senha']);
        file_put_contents('registros.txt', json_encode($post) . "\n", FILE_APPEND);
    }

    $error = array();
    $success = '';
    if (validateForm($_POST, $error)) {
        saveForm($_POST);
        $success = "Registro salvo!";
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
        <h2>Exercício 4</h2>
        <i>
            Crie um formulário contendo os campos (Nome, Sobrenome, e-mail, telefone, login & senha)
            e salve as submissões dentro de um arquivo chamado registros.txt. 
            Itens mandatórios para esse exercicio:
            <br />
            a) Os registros devem ser salvos dentro de um array() incremental no arquivo registros.txt
            <br />
            b)  O formulário deverá validar os campos email e telefone aceitando somente os formatos aceitáveis
            <br />
            c) Se possivel nao salvar email ou logins que ja foram registrados anteriormente
            <br />
            d) O campo senha deverá ser salvo encriptado. 
        </i>
        <hr />
        <br />
        <div style="color: red">
            <?= implode('<br />', $error) ?>
        </div>
        <div style="color: green">
            <?= $success ?>
        </div>
        <br />
        <form method="post">
            Nome:<br />
            <input type="text" name="nome" required>
            <br />
            Sobrenome:<br />
            <input type="text" name="sobrenome" required>
            <br />
            E-mail:<br />
            <input type="email" name="e-mail" required>
            <br />
            Telefone:<br />
            <input type="tel" name="telefone" required pattern="^\d{2}\d{4,5}\d{4}$"> 
            <span style="color: #555; font-size: 10px;">DDD + Números</span>
            <br />
            Login:<br />
            <input type="text" name="login" required>
            <br />
            Senha:<br />
            <input type="password" name="senha" required>
            <br /><br />
            <button type="submit">Salvar</button>
        </form>

        <br /><br />
        <button onclick="window.location.href = 'index.php'">Voltar</button>
    </body>
</html>