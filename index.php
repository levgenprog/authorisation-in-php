<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Authorisation</title>
</head>
<body>
    <main>

        <div class="container">
            <h1>Авторизация</h1>
            <form action="" method="POST">
                <input type="text" name="login" placeholder="Логин" required>
                <input type="password" name="password" placeholder="Пароль" required>
                <button type="submit">Войти</button>
                <a href="./registration.php">Регистрация</a>
            </form>
            <div id="loader"></div>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>