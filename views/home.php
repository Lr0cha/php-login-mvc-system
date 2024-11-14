<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php?action=login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
</head>
<body>
    <h1>Olá, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h1>
    <a href="index.php?action=logout">Sair</a>
</body>
</html>
