<?php
require('connectdb.php');

$login = $_POST['login'];
$password = $_POST['password'];

if(empty($login) || empty($password))
{
    echo "Заполните все поля";
}
else
{
    $sql = "SELECT * FROM `users` WHERE login = '$login' AND password = '$password'";
    $result = $conn -> query($sql);

    if($result -> num_rows > 0)
    {
        while($row = $result -> fetch_assoc())
        {
            setcookie("IDUsers", $row['IDUsers'], time() + 3600, "/");
            header('Location: mainMenu.php');
            exit(); 
        }
    }
    else
    {
       echo "<script>
            alert('Неверный логин или пароль');
            location.href = 'authorization.php';
       </script>";

    }
}
$conn->close();
?>