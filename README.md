# Microservices

Versão mínima: PHP 7 e MySQL 5</br>
Framework Lumen</br>
Framework Illuminate com Eloquent ORM</br>
Gerenciador de dependências Composer</br>
Usar containers Docker para subir as API's</br>

Serão consideradas funcionalidades completas se:</br>
- O descritivo da funcionalidade for implementado completamente.</br>
- Os EndPoints responderem corretamente as requisições.</br>
- Não houver bugs impeditivos que atrapalhem ou impossibilitem a execução do projeto.</br>

Serão considerados bônus:</br>
- Unit Testing </br>
- Integration test

## DESAFIO

### 1 - Construir uma API para gerenciar Pessoas
	
###### Premissas:
- Possibilitar cadastrar, alterar e excluir uma pessoa.
- Retornar os códigos corretos do HTTP Request/Response.

###### Cadastrar 01
Efetuar uma requisição POST na API enviando no corpo da requisição, no formato JSON, os dados da pessoa: name, lastName e birthDate. Deve retornar um JSON com os dados inseridos mais o id da pessoa.

###### Alterar 02
Efetuar uma requisição PUT/PATCH na API passando o id da pessoa e enviando no corpo da requisição, no formato JSON, os dados a serem alterados. Deve retornar um JSON com os dados alterados mais o id da pessoa.

###### Excluir 03
Efetuar uma requisição DELETE na API passando o id da pessoa. Se houver endereços cadastrado para essa pessoa não pode autorizar a exclusão dos dados, deve retornar uma mensagem de erro. Não retornar nada se deletado com sucesso.

### 2 - Construir uma API para gerenciar os Endereços da Pessoa
	
###### Premissas:
- Possibilitar cadastrar, alterar e excluir uma endereço.
- Retornar os códigos corretos do HTTP Request/Response.

###### Cadastrar 01
Efetuar uma requisição POST na API enviando no corpo da requisição, no formato JSON, os dados do endereço: idPerson, postalCode, address, number, complement, state e country. Deve retornar um JSON com os dados inseridos mais o id do endereço.

###### Alterar 02
Efetuar uma requisição PUT/PATCH na API passando o id do endereço e enviando no corpo da requisição, no formato JSON, os dados a serem alterados. Deve retornar um JSON com os dados alterados mais o id do endereço.

###### Excluir 03
Efetuar uma requisição DELETE na API passando o id do endereço. Não retornar nada se deletado com sucesso.

### 3 - Construir uma API/Proxy para Consultar dados da Pessoas

###### Premissas:
- Possibilitar consultar todas pessoas/endereço e pessoa/endereço por id da pessoa (se não houver endereço cadastrado dever vir nulo) com retorno no mesmo JSON.
- Retornar os códigos corretos do HTTP Request/Response.

###### Consultar todos 01
Efetuar uma requisição GET na API solicitando todos os dados cadastrados nas API's de Pessoa e Endereço no mesmo JSON no seguinte formato: id, name, lastName, birthDate e address (address deve ser um array de objetos com os seguintes dados: id, postalCode, address, number, complement, state e country). Deve retornar uma lista com os dados requisitados.

###### Consultar por id 02
Efetuar uma requisição GET na API, passando o id da pessoa, solicitando uma Pessoa com seus Endereços no mesmo JSON no seguinte formato: id, name, lastName, birthDate e address (address deve ser um array de objetos com os seguintes dados: id, postalCode, address, number, complement, state e country). Deve retornar um objeto.

## CONCLUSÃO

Crie um Fork desse repositório e envie um pull request.</br>
Caso seu projeto possua alguma pré condição para ser executado (EX: fazer o compeser install ou docker build), crie um arquivo README.md com um passo a passo para que seja possível executá-lo.</br>
Projetos que não puderem ser executados não serão avaliados.

# COMEÇAR!!!

Foque em entregar funcionalidades completas!</br></br>
Quantidade não é qualidade!
