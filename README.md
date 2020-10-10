# README

Desafio SWAPI ( https://swapi.dev/ )

O desafio consiste em construir uma aplicação que deverá receber um valor inteiro, referente à distância em Mega lights (MGLT).

Baseado nos dados constantes na SWAPI, calcular a quantidade de paradas necessárias para reabastecimento de cada nave para percorrer a distância informada.

Há uma tabela com alguns valores de referência para algumas naves quando a distância informada é 1000000 MGLT:
- Executor: 0
- Y-Wing: 74
- X-Wing: 59
- Millenium Falcon: 9

Uma vez que não há informações de armazenamento/autonomia de combustível, utilizei o 'consumables' como parâmetro.

Requisitos principais:
- A aplicação deve trazer os valores esperados
- Não utilizar frameworks




# Instruções
- clonar este repositório

- navegar até a pasta onde ele se encontra

- composer install

- php -S 127.0.0.1:8000 -t public

- no browser, acessar 127.0.0.1:8000 ou localhost:8000




(bônus)
Também é possível consultar via api (com o Postman, por exemplo) em http://localhost:8000/restapi/{int distancia}

- ex.:
http://localhost:8000/restapi/1000000


