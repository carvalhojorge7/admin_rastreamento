# Sistema de Rastreio de Encomendas

Este é um sistema de rastreio de encomendas desenvolvido em Laravel, com o objetivo de permitir o acompanhamento do trajeto das encomendas pelos usuários.

## Funcionalidades

- Autenticação do usuário admin;
- Cadastro de encomendas no painel admin;
- Consulta é atualiza o histórico de localizações de uma encomenda no painel admin;
- Consulta do histórico de localizações de uma encomenda em uma página publica que pode ser incorporada ao seu e-commerce;

## Tecnologias utilizadas

- Laravel - framework PHP utilizado no backend;
- AdminLTE - Bootstrap 4 Admin Dashboard(https://adminlte.io) utilizado no frontend;
- PostgreSQL - banco de dados utilizado para armazenar os dados do sistema;

## Instalação

1. Clone o repositório em sua máquina;
2. Execute o comando `composer install` para instalar as dependências do Laravel;
3. Crie um banco de dados e configure as variáveis de ambiente do Laravel no arquivo `.env` com as credenciais de acesso ao banco de dados;
4. Execute o comando `php artisan migrate` para criar as tabelas no banco de dados;
5. Execute o comando `php artisan db:seed` para popular o banco de dados com dados de teste (opcional);
6. Execute o comando `php artisan serve` para iniciar o servidor local.

## Acesso

O backend roda no Laravel:
Ao executar o comando `php artisan serve`, a api estará disponível em `http://localhost:8000/api`. 
Lembre-se de rodar o migrate e o seed, para que o banco seja criado e alimentado com o usuário padrão.

O frontend roda no PHP 8.1
O dashboard estárá disponível em `http://localhost/login.php`
Para acessá-lo, utilize as seguintes credenciais de usuário:

- E-mail: admin@email.com
- Senha: 12345678

## Screenshots

![Página inicial](https://rastreio.de/screenshots/Screenshot_3.png)

![Dashboard](https://rastreio.de/screenshots/Screenshot_4.png)

![Atualização de encomendas](https://rastreio.de/screenshots/Screenshot_5.png)

## Contribuição

Este projeto foi desenvolvido como parte de um desafio pessoal e não é mantido ativamente. No entanto, sinta-se livre para contribuir com correções de bugs ou novas funcionalidades através de pull requests.

