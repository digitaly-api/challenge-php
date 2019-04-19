## Pré requisitos
- PHP >= 7
- Mysql >= 5
- Composer

## Instalação
- Abra o Mysql e crie um banco de dados para projeto, com um nome de sua escolha
- Baixe os aquivos com git clone
- Na raiz do projeto renomei o aquivo .env.example para .env
- Abra o arquivo .env no editor e edite as seguintes linhas:

Em DB_HOST informe o endereço do banco de dados;

Em DB_PORT informe a porta do banco de dados;

Em DB_DATABASE informe o nome do banco de dados, criado no passo 1 dessa instalação;

Em DB_USERNAME informe o nome do usuário do banco de dados;

Em DB_PASSWORD informe a senha do banco de dados

- Abra o terminal, acesse a raiz do projeto e execute os seguintes comandos na sequência:

composer install

Após rodar o comando acima, execute: php artisan migrate

Após o migrate, suba o servidor com o comando: php -S localhost:8000 -t public

## Utilização

## PESSOAS

A url para acesso da API é: localhost:8000. Os endpoints virão a seguir com as suas respectivas explicações

Cadastrar pessoa envie um POST para /people.

Requisição:
{
	"name" : "João",
	"lastName" : "Aparecido",
	"birthDate" : "1980-05-01"
}

Resposta:
{
    "id": 8,
    "name": "João",
    "lastName": "Aparecido",
    "birthDate": "1980-05-01"
}

Alterar pessoa envie um PUT/PATCH com o id da pessoa a ser alterada /people/{$id}.

Requisição:
{
	"name" : "Patricia",
	"lastName" : "Souza",
	"birthDate" : "1982-06-10"
}

Resposta:
{
    "id": "8",
    "name": "Patricia",
    "lastName": "Souza",
    "birthDate": "1982-06-10"
}

Excluir pessoa envie um DELETE com o id da pessoa a ser excluida /people/{$id}.

## ENDEREÇOS

Cadastrar um endereço envie um POST para /address.

Requisição:
{  
   "idPerson":"8",
   "postalCode":"07083-130",
   "address":"Rua xyz",
   "number":"321 A",
   "complement":"viela",
   "state":"São Paulo",
   "country":"Guarulhos"
}

Resposta:
{
    "id": 10,
    "idPerson": "8",
    "postalCode": "07083-130",
    "address": "Rua xyz",
    "number": "321 A",
    "complement": "viela",
    "state": "São Paulo",
    "country": "Guarulhos"
}

Alterar endereço envie um PUT/PATCH com o id do endereço a ser alterado /address/{$id}.

Requisição:
{  
   "postalCode":"07124-740",
   "address":"Rua Waldemar",
   "number":"999",
   "complement":"",
   "state":"SP",
   "country":"Guarulhos"
}

Resposta:
{
    "id": "10",
    "postalCode": "07124-740",
    "address": "Rua Waldemar",
    "number": "999",
    "complement": "",
    "state": "SP",
    "country": "Guarulhos"
}

Excluir endereço envie um DELETE com o id do endereço a ser excluido /address/{$id}.

## Consultas
Para fazer uma consulta envie um GET /people

Se quiser dados de uma pessoa especifica, informe o id como parâmetro /people/{$id}

Resposta: 
[
    {
        "id": 1,
        "name": "João",
        "lastName": "Aparecido",
        "birthDate": "1980-05-01",
        "address": [
            {
                "id": 1,
                "postalCode": "0100",
                "address": "Rua xl",
                "number": "321 A",
                "complement": "viela",
                "state": "RJ",
                "country": "Realengo"
            },
            {
                "id": 5,
                "postalCode": "0100",
                "address": "Rua xl",
                "number": "321 A",
                "complement": "viela",
                "state": "RJ",
                "country": "Realengo"
            },
            {
                "id": 7,
                "postalCode": "0100",
                "address": "Rua xl",
                "number": "321 A",
                "complement": "viela",
                "state": "RJ",
                "country": "Realengo"
            }
        ]
    }
]
