<?php
// Inclui o autoload para carregar as classes
require_once('config.php');

// Inicia ou retoma sessão
session_start();


// variável está declarada e é diferente de null
$action = isset($_GET['action']) ? $_GET['action'] : 'login'; // login é a ação padrão

// Verifica qual controlador e ação executar com switch case
switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController = new AuthController();
            $authController->login($_POST['email'], $_POST['password']);
        } else {
            include('views/login.php');
        }
        break;

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController = new AuthController();
            $authController->register($_POST['name'], $_POST['email'], $_POST['password']);
        } else {
            include('views/register.php');
        }
        break;

    case 'home':
        // Verifica se o usuário está logado
        if (isset($_SESSION['user'])) {
            include('views/home.php');
        } else {
            header('Location: index.php?action=login');
            exit;
        }
        break;

    case 'logout':
        session_destroy();
        header('Location: index.php?action=login');
        exit;
        break;

    default:
        echo "Ação não reconhecida!";
        break;    
}
?>
