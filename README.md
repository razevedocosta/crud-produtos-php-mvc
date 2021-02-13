# Crud de Produtos
Aplicação desenvolvida utilizando php/doctrine e bootstrap para estilização

![](https://github.com/razevedocosta/crud-produtos-php-mvc/blob/master/assets/login.png)

![](https://github.com/razevedocosta/crud-produtos-php-mvc/blob/master/assets/home.png)

**Para executar o projeto**
- fazer um clone do projeto para o seu computador
- no diretório raiz, executar **composer install** para baixar todas as dependências
- **php -S localhost:8080 -t public** para rodar a aplicação e acessar pelo navegador
- para realizar login na aplicação usar os seguintes dados: (email: rodrigo@teste.com | senha: 321654) 
  **OU** criar um usuário por meio do comando vendor/bin/doctrine dbal:run-sql 'insert into usuarios (email, senha) values ('nome@email.com', 'senhaaqui')
  documentação doctrine: https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/tools.html

**Funcionalidades:**
- crud para produtos (criar, editar, excluir)
- login/logout na aplicação
- verificação de acesso, controle de sessão
- validação de rotas e endereços

**A desenvolver:**
- mensagens de alertas no estilo toast
- botões de navegação para a listagem de produtos
- refatoração no envio de alguns métodos das classes
