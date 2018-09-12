# Project proposal -  CI&amp;T

##Documentação Ex7 - Rest API - UserApi

API simples para manipular uma lista de usuários contendo os campos (Nome, Sobrenome, Email e Telefone)

- Dados deverão ser salvos em um arquivo de texto
- Usar Rest API
- Criar Endpoint para listar todos os usuarios
- Criar Endpoint para deletar usuarios por email
- Criar Endpoint para adicionar um usuario novo
- Criar Endpoint para atualizar os dados do usuario.
- Prover documentacao minima para usar a API.


## Listar usuários

ACTION  | Retorna todos os usuários cadastrados
------------- | -------------
REQUEST_METHOD  | ```GET```
PARAM  | ```void```
RETURN  | <pre>[<br />{<br />"Nome": "Nome", <br />"Sobrenome": "Sobrenome", <br />"Email": "test@mail.com", <br />"Telefone": "31999999999"<br />}, <br />{<br />"Nome": "Nome", <br />"Sobrenome": "Sobrenome", <br />"Email": "test@mail.com", <br />"Telefone": "31999999999"<br />}, <br />]</pre>


## Cadastrar usuário

ACTION  | Cadastrar novo usuário
------------- | -------------
REQUEST_METHOD  | ```POST```
PARAM  | <pre>{<br />"Nome": "Nome", <br />"Sobrenome": "Sobrenome", <br />"Email": "test@mail.com", <br />"Telefone": "31999999999"<br />}</pre>
RETURN  | ```Boolean```


## Editar usuário

ACTION  | Editar dados do usuário a partir do ID
------------- | -------------
REQUEST_METHOD  | ```PUT```
PARAM  | <pre>{<br />"id": 0, <br />"Nome": "Nome", <br />"Sobrenome": "Sobrenome", <br />"Email": "test@mail.com", <br />"Telefone": "31999999999"<br />}</pre>
RETURN  | ```Boolean```


## Excluir usuário

ACTION  | Excluir usuário a partir do e-mail
------------- | -------------
REQUEST_METHOD  | ```DELETE```
PARAM  | ```"test@mail.com"```
RETURN  |  ```Boolean```
