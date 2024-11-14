<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <main>
        <div class="left-login">
            <div class="text-login">
                <h1>Faça o login<br><span>entre para o nosso time</span></h1>
            </div>
            <div class="img-login">
                <img src="./assets/img/group.svg" alt="Pessoas conversando">
            </div>
        </div>
        <div class="right-login">
            <div class="card">
                <h2>Login</h2>
                <form method="POST" action="index.php?action=login">
                    <div class="text-field">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="text-field">
                        <label for="password">Senha:</label>
                        <input type="password" id="password" name="password" placeholder="Senha" required>
                    </div>
                    <div class="btn-forms">
                        <input type="submit" name="btn_login" value="Entrar">
                    </div>
                </form>

                <?php
                if (isset($_SESSION['error_message'])) {
                    echo "<script type='text/javascript'>
                            alert('" . addslashes($_SESSION['error_message']) . "');
                          </script>";
                    unset($_SESSION['error_message']); // destrói a variável especificada
                }
                ?>
                <div class="link-register">
                    <a href="index.php?action=register">Não tem conta? Registre-se aqui</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
