<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

class SelectField
{

    private $name;
    private $selected = array();
    private $options = array();
    private $attr = array();
    private $multiple = false;

    function __construct($name, $options = array(), $attr = array())
    {
        $this->setName($name);
        $this->addOptions($options);
        $this->addAttr($attr);
    }

    public function selected($value)
    {
        $this->selected = (array) $value;
        $this->setMultiple((count($this->selected) > 1));
    }

    public function setName($name)
    {
        $this->name = (string) $name;
    }

    public function setMultiple($bool)
    {
        $this->multiple = (bool) $bool;
    }

    public function addOptions($options)
    {
        $this->options = array_merge($this->options, (array) $options);
    }

    public function addAttr($attr)
    {
        $this->attr = array_merge($this->attr, (array) $attr);
    }

    public function removeOptions($options)
    {
        $optionsArray = (array) $options;
        foreach ($optionsArray as $value) {
            if (array_key_exists($value, $this->options)) {
                unset($this->options[$value]);
            }
        }
    }

    public function show()
    {
        $strHtml = '<select name="' . $this->name . '" ' . $this->getAttrHtml() . ' ' . ($this->multiple ? 'multiple' : '') . '>';
        $strHtml .= $this->getOptionsHtml();
        $strHtml .= '</select>';
        return $strHtml;
    }

    private function getAttrHtml()
    {
        $str = '';
        foreach ($this->attr as $key => $value) {
            $str .= ' ' . $key . '="' . $value . '"';
        }
        return $str;
    }

    private function getOptionsHtml()
    {
        $str = '';
        foreach ($this->options as $key => $value) {
            $str .= '<option value="' . $value . '"' . (in_array($key, $this->selected) ? ' selected' : '') . '>';
            $str .= $value;
            $str .= '</option>';
            $str .= "\n";
        }
        return $str;
    }

}

// select de numeros
$name = 'select_field_numeros';
$options = array(
    'Zero',
    'Um',
    'Dois',
    'Três',
    'Quatro',
    'Cinco'
);
$attr = array(
    'id' => $name,
    'class' => 'select-field'
);

$selectNumeros = new SelectField($name, $options, $attr);
$selectNumeros->selected(3);

// select de cavalos
$name = 'select_field_cavalos';
$options = array(
    'And' => 'Andaluz',
    'Ara' => 'Árabe',
    'Ara-fr' => 'Árabe-frísio',
    'App' => 'Appaloosa',
    'Ber' => 'Berbere',
    'Bre' => 'Bretão',
    'Bra' => 'Brasileiro de hipismo',
    'Cav' => 'Cavalo campolina',
    'Cly' => 'Clydesdale',
    'Cri' => 'Crioulo',
    'Fri' => 'Frísio',
    'Lus' => 'Lusitano',
    'Hol' => 'Holsteiner',
    'Man-pa' => 'Mangalarga paulista',
    'Man-ma' => 'Mangalarga marchador',
    'Old' => 'Oldemburgo',
    'Pai' => 'Paint Horse',
    'Pam' => 'Pampa',
    'Pan' => 'Pantaneiro',
    'Pon' => 'Pônei',
    'Pon-br' => 'Pônei brasileiro',
    'Pur-en' => 'Puro sangue inglês (ou PSI)',
    'Pur' => 'Puro sangue lusitano',
    'Qua' => 'Quarto de milha',
    'Shi' => 'Shire',
    'Sel' => 'Selle français (ou sela francês)',
    'Sor' => 'Sorraia'
);
$attr = array(
    'id' => $name,
    'class' => 'select-field'
);

$selectCavalos = new SelectField($name, $options, $attr);
$selectCavalos->selected(array('Man-ma', 'Man-pa'));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercícios</title>
    </head>
    <body>
        <h2>Exercício 6</h2>
        <i>
            Crie uma Classe para criar um select Field para um user registration form. 
            Após criar essa classe crie um webform simples e adicione esse campo criado.        
        </i>
        <hr />
        <br />
        <form method="post">
            <h3>Gosta de cavalos?</h3>
            Quanto?<br />
            <?= $selectNumeros->show() ?>
            <br /><br />
            Quais Cavalos?<br />
            <?= $selectCavalos->show() ?> <i>select multiple</i>
            <br /><br />
            <button type="submit">Enviar</button>
        </form>
        <br /><br />
        <button onclick="window.location.href = 'index.php'">Voltar</button>
    </body>
</html>