# Microservices


## DOC
### Subir os projetos (Gateway, Service)
Execute o arquivo makefile com o comando: `make build`

### Endpoints API
Estão sendo executados em http://localhost:8080

##### Lista de pessoas
`[GET] http://localhost:8080/pessoas`

##### Inserindo uma pessoa
`[POST] http://localhost:8080/pessoas`
```
{
     "nome": "<Nome (string)>",
     "sobrenome": "<Sobrenome (string)>",
     "dataNascimento": "<Data de Nascimento (string). ex: 1995-01-25>",
     "enderecos": [
         {
             "cep": "<CEP (string)>",
             "rua": "<Nome da rua (string)>",
             "complemento": "<Complemento (string)>",
             "numero": <Número (int)>,
             "estado": "<Estado (string)>",
             "pais": "<Pais (string)>"
         }
     ]
 }
 ```

##### Atualizando uma pessoa
`[PUT] http://localhost:8080/pessoas/{idPessoa}`
```
{
     "nome": "<Nome (string)>",
     "sobrenome": "<Sobrenome (string)>",
     "dataNascimento": "<Data de Nascimento (string). ex: 1995-01-25>"
 }
 ```

##### Atualizando uma pessoa por campo especifico
`[PATCH] http://localhost:8080/pessoas/{idPessoa}`
```
{
     "sobrenome": "<Sobrenome (string)>"
 }
 ```
 
##### Apagando uma pessoa
`[DELETE] http://localhost:8080/pessoas/{idPessoa}`
 

 
 ##### Lista de endereços
 `[GET] http://localhost:8080/pessoas/{idPessoa}/enderecos`
 
 ##### Inserindo um endereço
 `[POST] http://localhost:8080/pessoas/{idPessoa}/enderecos`
 ```
 {
     "cep": "<CEP (string)>",
     "rua": "<Nome da rua (string)>",
     "complemento": "<Complemento (string)>",
     "numero": <Número (int)>,
     "estado": "<Estado (string)>",
     "pais": "<Pais (string)>"
 }
  ```
 
 ##### Atualizando um endereço
 `[PUT] http://localhost:8080/pessoas/{idPessoa}/enderecos/{idEndereco}`
 ```
 {
      "cep": "<CEP (string)>",
      "rua": "<Nome da rua (string)>",
      "complemento": "<Complemento (string)>",
      "numero": <Número (int)>,
      "estado": "<Estado (string)>",
      "pais": "<Pais (string)>"
  }
  ```
 
##### Atualizando um endereço por campo especifico
`[PATCH] http://localhost:8080/pessoas/{idPessoa}/enderecos/{idEndereco}`
```
{
      "complemento": "<Complemento (string)>"
}
```
  
##### Apagando um endereço
`[DELETE] http://localhost:8080/pessoas/{idPessoa}/enderecos/{idEndereco}`
