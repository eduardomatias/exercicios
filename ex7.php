<?php

class UserApi
{

    private $arquivoJson = 'registros_ex7.json';
    private $registros;

    function __construct()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header('Content-type: application/json');
        $this->registros = json_decode(file_get_contents($this->arquivoJson), true);
    }
    
    /**
     * get
     * obtem todos os usuário
     *
     * @author Eduardo Matias 
     * @return Json
     */
    public function get()
    {
        return json_encode($this->registros);
    }

    /**
     * remove
     * deletar usuarios por email
     *
     * @param $email String 
     * @author Eduardo Matias 
     * @return Bool
     */
    public function remove($email)
    {
        $retorno = 'false';
        if (($position = $this->findUser('Email', $email)) !== false) {
            unset($this->registros[$position]);
            $this->saveFileJson();
            $retorno = 'true';
        }
        return $retorno;
    }

    /**
     * add
     * adicionar um usuario novo
     *
     * @param $request String 
     * @author Eduardo Matias 
     * @return Bool
     */
    public function add($request)
    {
        array_push($this->registros, $this->prepareData($request));
        $this->saveFileJson();
        return 'true';
    }

    // 
    /**
     * edit
     * atualizar os dados do usuario
     *
     * @param $request String 
     * @author Eduardo Matias 
     * @return Bool
     */
    public function edit($request)
    {
        $retorno = 'false';
        $data = json_decode($request, true);
        if (isset($data['id'])) {
            $id = (int) $data['id'];
            if (!empty($this->registros[$id])) {
                unset($data['id']);
                $this->registros[$id] = $this->prepareData($data);
                $this->saveFileJson();
                $retorno = 'true';
            }
        }
        return $retorno;
    }

    /**
     * findUser
     * busca usuario por atributo($key)
     *
     * @param $key String 
     * @param $value String 
     * @author Eduardo Matias 
     * @return Int
     */
    private function findUser($key, $value)
    {
        $position = false;
        foreach ($this->registros as $k => $v) {
            if($v[$key] == $value) {                
                $position = $k;
                break;
            }
        }
        return $position;
    }
    
    /**
     * saveFileJson
     * salva registros no arquivo Json
     *
     * @author Eduardo Matias 
     * @return Bool
     */
    private function saveFileJson()
    {
        return file_put_contents($this->arquivoJson, json_encode($this->registros));
    }

    /**
     * prepareData
     * apenas campos permitidos
     *
     * @param $data array/Json
     * @author Eduardo Matias 
     * @return Array
     */
    private function prepareData($data)
    {
        $data = (is_array($data)) ? $data : json_decode($data, true);
        $prepareData = array();
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'Nome':
                case 'Sobrenome':
                case 'Email':
                case 'Telefone':
                    $prepareData[$key] = $value;
                    break;
            }
        }
        return $prepareData;
    }

}

$usuario = new UserApi();
$request = file_get_contents('php://input');
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo $usuario->get();
        break;
    case 'DELETE':
        echo $usuario->remove($request);
        break;
    case 'POST':
        echo $usuario->add($request);
        break;
    case 'PUT':
        echo $usuario->edit($request);
        break;
}