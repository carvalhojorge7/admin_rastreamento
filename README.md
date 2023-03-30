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
- MySQL - banco de dados utilizado para armazenar os dados do sistema;

## Instalação

1. Clone o repositório em sua máquina;
2. Execute o comando `composer install` para instalar as dependências do Laravel;
3. Crie um banco de dados MySQL e configure as variáveis de ambiente do Laravel no arquivo `.env` com as credenciais de acesso ao banco de dados;
4. Execute o comando `php artisan migrate` para criar as tabelas no banco de dados;
5. Execute o comando `php artisan db:seed` para popular o banco de dados com dados de teste (opcional);
6. Execute o comando `php artisan serve` para iniciar o servidor local.

## Acesso

Ao executar o comando `php artisan serve`, o sistema estará disponível em `http://localhost:8000`. Para acessá-lo, utilize as seguintes credenciais de usuário:

- E-mail: admin@example.com
- Senha: password

## Screenshots

![Página inicial](https://example.com/images/home.png)

![Cadastro de encomendas](https://example.com/images/shipment.png)

![Histórico de localizações](https://example.com/images/history.png)

## Contribuição

Este projeto foi desenvolvido como parte de um desafio pessoal e não é mantido ativamente. No entanto, sinta-se livre para contribuir com correções de bugs ou novas funcionalidades através de pull requests.

## Licença

Este projeto é licenciado sob a licença MIT. Veja o arquivo LICENSE.md para mais detalhes.
