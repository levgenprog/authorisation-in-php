<?php
session_start();
$dbHost = '127.0.0.1:3306';
$dbName = 'authorisation';
$dbUser = 'myadmin';
$dbPassword = 'jmvHt333555777';

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Handle the connection error appropriately
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}


// Обработка входа пользователя
    if(isset($_POST)){
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['login']) && isset($data['pwd'])) {
            $login = $data['login'];
            $password = $data['pwd'];
            $date = $data['date'];

            $query = $db->prepare('SELECT * FROM users WHERE name = :username LIMIT 1');
            $query->bindParam(':username', $login);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Пользователь с таким логином уже существует
                http_response_code(409);
                echo json_encode(['success' => false, 'message' => 'Пользователь с таким логином уже существует']);
                exit();
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


            $query2 = $db->prepare('INSERT INTO users (name, password, birthday) VALUES (:username, :password, :birthdate)');
            $query2->bindParam(':username', $login);
            $query2->bindParam(':password', $hashedPassword);
            $query2->bindParam(':birthdate', $date);

            if ($query2->execute()) {
                $sessionId = uniqid();
                $_SESSION['user_id'] = $db->lastInsertId();;

                // Return the session ID to the client
                echo json_encode(['success' => true, 'session_id' => $sessionId]);
                exit();
            } else {
                // Ошибка при регистрации пользователя
                http_response_code(500);
                echo 'Ошибка при регистрации пользователя';
                exit();
            }
        }
    }

// 7249

?>
