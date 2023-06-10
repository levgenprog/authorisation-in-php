<?php
session_start();
require_once 'db_connection.php';

    if(isset($_POST)){
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['login']) && isset($data['pwd'])) {
            $login = $data['login'];
            $password = $data['pwd'];

            $query = $db->prepare('SELECT * FROM users WHERE name = :username LIMIT 1');
            $query->bindParam(':username', $login);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $sessionId = uniqid();
                echo json_encode(['success' => true, 'session_id' => $sessionId]);
                exit();
            } else {
                echo json_encode(['success' => false, 'message' => 'Неправильный логин или пароль']);
                exit();
            }
        }
    }

?>