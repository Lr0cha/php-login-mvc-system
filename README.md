# **Sistema de Login e Cadastro em PHP (MVC)**

Este é um simples sistema de **login e cadastro** em PHP, reforçando os aprendizados adquiridos nas aulas de programação em scripts da faculdade, utilizando o padrão **MVC (Model-View-Controller)**. O projeto foi desenvolvido com foco em boas práticas de segurança, como **hashing de senhas**, **PDO (PHP Data Objects)** para interações com o banco de dados e **validação de entradas**.

## **Tecnologias Utilizadas**

- **PHP**: Linguagem de programação utilizada para o desenvolvimento do sistema.
- **MySQL**: Banco de dados relacional para armazenar as informações de usuários.
- **PDO**: PHP Data Objects, uma maneira segura e flexível de interagir com o banco de dados.
- **HTML/CSS**: Para construção das páginas web e estilização da interface.


## **Funcionalidades**

- **Cadastro de Usuários**: Permite que novos usuários se cadastrem no sistema.
- **Login de Usuários**: Permite que usuários se autentiquem no sistema com email e senha.
- **Sessão de Usuário**: Após o login, o usuário tem acesso a uma área restrita do sistema.
- **Logout**: Permite que o usuário saia da sua sessão.
- **Validação e Sanitização**: O sistema verifica a validade dos dados de entrada (email) e protege contra **SQL Injection** e **XSS**.


## **Estrutura do Projeto**

<details>
<summary>Clique para ver a estrutura do projeto</summary>

- **Model**: Lógica de negócios, como autenticação de usuários e interações com o banco de dados.
  - `User.php`: Contém os métodos para autenticar e registrar usuários no banco de dados.
  - `Database.php`: Conexão com o banco de dados MySQL usando PDO.
  
- **Controller**: Gerencia as requisições, processa os dados e carrega as views.
  - `AuthController.php`: Controlador que lida com as ações de login e registro de usuários.

- **View**: Páginas HTML que exibem a interface com o usuário.
  - `login.php`: Página de login.
  - `register.php`: Página de cadastro.
  - `home.php`: Página principal, exibida após o login com boas-vindas.
  
- **config.php**: Arquivo de configuração, que define o autoload para carregar as classes automaticamente.
- **index.php**: Funciona como o **Front Controller**. Ele lida com todas as requisições e decide qual ação o controlador deve tomar com base na URL ou parâmetros da requisição (como `action=login` ou `action=register`).

</details>

## **Pré-Requisitos**

<details>
<summary>Clique para ver os pré-requisitos</summary>

- **XAMPP** ou **WAMP** (ou outro servidor Apache com PHP e MySQL) instalado.
- Banco de dados MySQL configurado.

</details>

## **Como Configurar**

<details>
<summary>Clique para ver o passo a passo de configuração</summary>

### 1. **Clone o repositório**

### 2. **Configuração do Banco de Dados**

Crie um banco de dados MySQL chamado `login` e execute o seguinte SQL para criar a tabela de usuários:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

### 3. **Configuração do Arquivo `config.php`**

No arquivo `config.php`, você pode ajustar as configurações do banco de dados conforme necessário. Por padrão, está configurado para usar **localhost** e as credenciais padrão do MySQL (usuário: `root`, senha: vazia).

```php
define('HOST', 'localhost');
define('DBNAME', 'login');
define('USER', 'root');
define('PASSWORD', '');
```

### 4. **Inicie o Servidor Apache e MySQL no XAMPP**

### 5. **Acesse o Sistema**
</details>
