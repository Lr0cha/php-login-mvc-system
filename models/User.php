<?php
require_once('./database/Database.php');

class User extends Database {
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'users';
    }

    // Função para autenticar o usuário
    public function authenticate($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) { // verifica hash
            return $user;
        }

        return false;
    }

    // Função para registrar um novo usuário
    public function register($name, $email, $password) {
        $name = htmlspecialchars(trim($name));  // Sanitiza o nome
        // Verificar se o email já existe
        if ($this->emailExists($email)) {
            return false;
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT); //cria hash pro BD
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $passwordHash]); //sql injection
    }

    public function emailExists($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }

    // validar o formato do email
    public function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
?>
