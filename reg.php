<?php

if (isset($_POST['registration'])) {
    // Получаем данные из формы
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $paswword_hash = md5($password);

    // Проверяем, что все поля заполнены
    if (empty($username) || empty($email) || empty($password)) {
        exit();
    }
   
    $conn = mysqli_connect("localhost", "root", "root", "ItCompany");
    // Проверяем подключение к базе данных
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 
    // Добавляем пользователя в базу данных
    $sql = mysqli_query($conn, "INSERT INTO user (id_user, username,  email, password, admin) VALUES (NULL, '$username','$email', '$paswword_hash', '0')");

    mysqli_close($conn);
    header('Location: index.php ');
}
?>