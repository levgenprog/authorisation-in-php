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
            <div id="loader"></div>
            <form action="" method="POST" id="form">
                <input type="text" name="login" id="login" placeholder="Логин" required>
                <input type="password" name="password" id="pwd" placeholder="Пароль" required>
                <span class="error-message" id="login-err">Неправильный логин или пароль</span>
                <button type="button" onclick="checkLogin(event)">Войти</button>
                <a href="./registration.php">Регистрация</a>
            </form>
            
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>