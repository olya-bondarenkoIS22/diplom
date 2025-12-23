<?php
// session_start(); 
// Добавьте в начало файла

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/constants.php';

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validatePhone($phone) {
    $cleaned = preg_replace('/[^\d+()\-\s]/', '', $phone);
    $digits = preg_replace('/\D/', '', $phone);
    return strlen($digits) >= 10 && strlen($digits) <= 15;
}

function validatePassword($password) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Z-za-z\d@$!%*?&]{8,}$/', $password);
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

function checkUserExists($phone_number) {
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "SELECT id FROM users WHERE phone_number = :phone_number";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":phone_number", $phone_number);
    $stmt->execute();
    
    return $stmt->rowCount() > 0;
}

function registerUser($login, $phone_number, $password) {
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "INSERT INTO users (login, phone_number, password, date_registration, id_role) 
              VALUES (:login, :phone_number, :password, NOW(), :id_role)";
    
    $stmt = $db->prepare($query);
    $hashedPassword = hashPassword($password);
    $roleId = ROLE_USER;
    
    $stmt->bindParam(":login", $login);
    $stmt->bindParam(":phone_number", $phone_number);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->bindParam(":id_role", $roleId);
    
    return $stmt->execute();
}

function loginUser($login, $password) {
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "SELECT id, login, phone_number, password, date_registration FROM users WHERE login = :login";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":login", $login);
    $stmt->execute();
    
    if($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(verifyPassword($password, $row['password'])) {
            // Сохраняем данные пользователя в сессию
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_login'] = $row['login'];
            $_SESSION['user_phone'] = $row['phone_number'];
            $_SESSION['user_date_registration'] = $row['date_registration'];
            $_SESSION['logged_in'] = true;
            
            return [
                'id' => $row['id'],
                'login' => $row['login'],
                'phone_number' => $row['phone_number'],
                'date_registration' => $row['date_registration']
            ];
        }
    }
    
    return false;
}

// Функция выхода
function logoutUser() {
    $_SESSION = array();
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    session_destroy();
}

// Функция получения данных текущего пользователя
function getCurrentUser() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'],
            'login' => $_SESSION['user_login'],
            'phone_number' => $_SESSION['user_phone'],
            'date_registration' => $_SESSION['user_date_registration']
        ];
    }
    return null;
}

function saveBlog($id_user, $blog_name, $address, $description, $image) {
    $database = new Database();
    $db = $database->getConnection();

    $query = "INSERT INTO blogs (id_user, blog_name, created_date, description, address, image) 
              VALUES (:id_user, :blog_name, NOW(), :description, :address, :image)";
    $stmt = $db->prepare($query);
    
    $stmt->bindParam(':id_user', $id_user);
    $stmt->bindParam(':blog_name', $blog_name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':image', $image);
    return $stmt->execute();
}
?>