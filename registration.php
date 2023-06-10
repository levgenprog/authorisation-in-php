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
            <form action="" method="POST">
                <label>Имя пользователя: </label>
                <input type="text" name="login" id="login" placeholder="Логин" required>
                <label>Дата рождения: </label>
                <input type="date" id="birth">
                <label>Введите пароль: </label>
                <input type="password" name="password" id="pwd" placeholder="Пароль" required>
                <label>Повторите пароль: </label>
                <input type="password" name="password2" id="pwd2" placeholder="Повторите пароль" required>
                <button type="submit">Зарегистрироваться</button>
                <a href="./index.php">Уже зарегистрированы? Авторизоваться</a>
            </form>
        </div>
    </main>
</body>
</html>