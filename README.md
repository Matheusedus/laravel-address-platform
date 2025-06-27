# Laravel Address Platform

Plataforma para cadastro e listagem de endereços de usuários, integrada à API ViaCEP, desenvolvida com Laravel 11, arquitetura em camadas e Docker.

---

## 🚀 Tecnologias

- **Laravel 11+**
- **PHP 8.2+**
- **Docker & Docker Compose**
- **MySQL 8**
- **Nginx**
- **Blade**
- **PHPUnit** (testes)

---

## ⚙️ Pré-requisitos

- Docker
- Docker Compose

---

## 🏗️ Como rodar o projeto

```bash
git clone https://github.com/seu-usuario/laravel-address-platform.git
cd laravel-address-platform
docker-compose up -d
```

- Acesse a aplicação em: [http://localhost:8000](http://localhost:8000)

---

## 🗄️ Setup do Banco de Dados

Execute as migrations e seeders para popular dados de teste:

```bash
docker-compose exec app php artisan migrate --seed
```

- Credenciais padrão:
  - Host: `localhost`
  - Database: `laravel`
  - User: `laravel`
  - Password: `secret`

---

## 🧪 Rodando os Testes

```bash
docker-compose exec -it laravel-app bash 
php artisan migrate --env=testing
php artisan test --env=testing
```

- Inclui testes unitários de validação e teste de integração da API de usuários.

---

## 🔗 Endpoints Principais

- **GET **`` — Lista usuários (paginado)
- **GET **`` — Detalha um usuário
- **POST **`` — Cadastra novo usuário (campos: `name`, `email`, `password`, `cep`)

> O endereço é preenchido automaticamente ao cadastrar usuário, consumindo a API pública do ViaCEP.

---

## 💻 Interface Web

- **Listagem de Usuários:** [http://localhost:8000/](http://localhost:8000/)
- **Cadastro de Usuário:** [http://localhost:8000/users/create](http://localhost:8000/users/create)

---

## 🗂️ Estrutura do Projeto

- `app/Services` — Lógica de negócio (ex: ViaCepService)
- `app/Repositories` — Camada de acesso a dados
- `app/Http/Requests` — Validação via Form Requests
- `app/Http/Controllers/Api` — Controllers da API
- `app/Http/Controllers` — Controllers das views Blade
- `resources/views` — Frontend Blade

## 📄 Observações

- Uso de boas práticas do Laravel
- Arquitetura limpa com Services e Repositories
- Paginação já implementada na listagem


