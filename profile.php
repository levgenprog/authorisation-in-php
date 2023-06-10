<?php
session_start();
require_once 'db_connection.php';

// Проверка авторизации пользователя

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}


// Получение данных пользователя
$user_id = $_SESSION['user_id'];

$stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch();
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
     <title>Профиль</title>
     <link rel="stylesheet" href="styles_personal.css">
     <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Профиль</h1>
        <div id="success-message" class="success-message">
          Вы успешно авторизованы!
        </div>
        <div class="profile">
            <div class="profile-info">
                <img src="<?php echo $user['photo']; ?>" alt="Фото профиля">
               <div class="user-info">
                    <div><strong>Имя:</strong> <?php echo $user['name']; ?></div>
                    <div><strong>Дата рождения:</strong> <?php echo $user['birthday']; ?></div>
               </div>
            </div>
            <a href="logout.php" class="logout-btn">Выйти</a>
        </div>
    </div>
    <script>
         setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            successMessage.style.display = 'none';
        }, 10000);
    </script>
</body>
</html>
