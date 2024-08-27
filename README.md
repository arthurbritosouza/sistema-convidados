<h1>Um sistema de convidados simples</h1>
<h5>
    --Usei o PHP 8.1 e laravel 10<br>
    --Fiz um sisma de convidados para um evento, apenas fiz tabelas para exibir o nome, idade e um botão para marcar se o convidade esta presente ou não<br>
    --Apenas fiz um cadastro de base de convidados e um link para os convidados fazerem o chekIn<br>
</h5>

### Pré-requisitos
- Composer para gerenciar dependências PHP.
- Php 8.3.10
- Laravel 10.46.0
### Instalação

1. Clone o repositório:
    ```bash
    git clone https://github.com/seu-usuario/seu-repositorio.git
    cd seu-repositorio
    ```

2. Configure o ambiente:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3. Instale as dependências:
    ```bash
    composer install
    npm install
    ```

4. Rode as migrações do banco de dados:
    ```bash
    php artisan migrate
    ```

5. Suba o servidor web:
    ```bash
    php artisan serve
    ```

### Uso

Acesse [http://localhost:8000](http://localhost:8000) no seu navegador. Registre-se ou faça login para começar a gerenciar suas finanças.


