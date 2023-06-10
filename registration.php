<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
</head>
<body>
    <main>

        <div class="container">
            <h1>Регистрация</h1>
            <div id="loader"></div>
            <form action="" method="POST" id="form">
                <label>Имя пользователя: </label>
                <input type="text" name="login" id="login" placeholder="Логин" required>
                <span class="error-message" id="login-err">Пожалуйста, заполните имя корректно.</span>
                <label>Дата рождения: </label>
                <input type="date" name="date" id="date">
                <span class="error-message" id="date-err">Пожалуйста, заполните дату рождения.</span>
                <label>Введите пароль: </label>
                <input type="password" name="pwd" id="pwd" placeholder="Пароль" required>
                <span class="error-message" id="pwd-err">Пароль должен содержать минимум 6 символов</span>
                <label>Повторите пароль: </label>
                <input type="password" name="pwd2" id="pwd2" placeholder="Повторите пароль" required>
                <span class="error-message" id="pwd2-err">Пароли не совпадают</span>
                <button type="button" onclick="checkRegister(event)">Зарегистрироваться</button>
                <a href="./index.php">Уже зарегистрированы? Авторизоваться</a>
            </form>
            
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>