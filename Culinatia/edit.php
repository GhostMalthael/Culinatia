<?php
require 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['fullName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['numberPhone'];
    $birthdate = $_POST['birthDate'];
    $ID_USER = $_COOKIE['IDUsers'];

    if (empty($login) || empty($password) || empty($name) || empty($email) || empty($phone) ) {
        echo "Заполните все поля";
    } 
    else
     {
    
            $sql = "UPDATE users SET 
                    Login='$login', 
                    Password='$password', 
                    FullName='$name', 
                    Gender='$gender', 
                    Email='$email', 
                    NumberPhone='$phone', 
                    DateBirth='$birthdate'
                    WHERE IDUsers='$ID_USER'"; 

             if ($conn->query($sql) === TRUE) 
             {
                 echo "<script>
                 alert('Профиль сохранен');
                 location.href = 'mainMenu.php';
                 </script>";
             } 
             else 
             {
                 echo "Ошибка при обновлении профиля: " . $conn->error;
             }
    }
}


$conn->close();
?>
