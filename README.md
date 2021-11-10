<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p> -->

## Teste Prático KPMG 
<br>

<p aling="center">
        <img src="https://m-ce.github.io/profile/images/kpmg.jpg"
        width="400" alt="KPMG image">
</p>

<hr>

## Sobre o Projeto

Projeto Desenvolvido com PHP/Laravel no backend, crud simples desenvolvido como teste para a empresa KPMG.
A intenção do projeto, era desenvolver um crud, com algumas peculiaridades. Entre elas, mensagens de sucesso ou erro, validação de campos ao criar ou atualizar um registro e validação de dados para que o mesmo não se repita no banco de dados:

<hr>

## Recursos do Projeto
- Listagem de registros na tela principal.
- Cadastro de novos registros, com o determinados campos: Nome, Matricula, CPF e E-mail.
- Atualização de dados existentes no banco de dados.
- Deleção de dados.
- Validação de campos ao cadastrar ou atualizar registros existentes
- Services contendo a camada de validação e chamado Repositorie
- Repositorie responsável pela chamada do ORM, e fazer a listagem, atualização, criação e deleção de dados com o Eloquent ORM.

<hr>

## Tecnologias utilizadas:

- **HTML**
- **CSS**
- **JavaScript**
- **Bootstrap**
- **PHP**
- **Laravel**
- **ORM Eloquent**
- **MySQL**
- **Docker**
- **Docker Compose**

<hr>

## Ambiente Docker


### Requisito

- **Docker**
- **Docker Compose**


#### Projeto

1° Clonar o Projeto

2° Abrir um terminal com a pasta do projeto

3° docker-compose up -d --build (Subindo o container)

4° docker exec -it app bash (Entrar dentro do container)

5° composer install

6° cp .env.example .env

7° php artisan key:generate (Gerar a chave do arquivo .env)

8° Criar o banco de dados e trocar o nome do mesmo no arquivo (.env)

9° 

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=database
    DB_USERNAME=root
    DB_PASSWORD=root

10° php artisan migrate (Criar as tabelas do banco de dados)