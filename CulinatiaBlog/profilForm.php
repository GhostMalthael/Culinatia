<?php
    $idUser = $_COOKIE['idUser'];
    require "connecting.php";
    $query = mysqli_query($conn, "SELECT * FROM users WHERE idUser=$idUser");
    $users = mysqli_fetch_assoc($query); 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $password = $_POST['password'];
        $update_query = "UPDATE users SET nameUser='$name', emailUser='$email', numberUser='$number', passwordUser='$password' WHERE idUser=$idUser";
        mysqli_query($conn, $update_query);
        $delete_query = "UPDATE users SET status='удален' WHERE idUser=$idUser";
        mysqli_query($conn, $delete_query);
    
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="st.css"/>
    <title>Профиль</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #782d99;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            margin: 0;
            color: #d00;
        }
        input[type="text"], textarea, select, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        button, .button {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover, .button:hover {
            background-color: #0056b3;
        }
        .button {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
        form a.button {
            background-color: #6c757d;
        }
        form a.button:hover {
            background-color: #5a6268;
        }
    </style>
</head>  
<body>
    <div>
        <form action="profilUser.php" method="post">
            <h1>Профиль</h1>
                
            <p>Введите Имя:</p>
            <input type="text" name="name" value="<?php echo $users['nameUser']; ?>">   

            <p>Введите email:</p>
            <input type="email" name="email" value="<?php echo $users['emailUser']; ?>">   

            <p>Введите телефон:</p>
            <input type="tel" name="number" value="<?php echo $users['numberUser']; ?>">

            <p>Введите пароль:</p>
            <input type="password" name="password" value="<?php echo $users['passwordUser']; ?>">   

            <button type="submit">Изменить</button>
            <a href="autForm.php" class="button">Выход из профиля</a>
        <a href="delete.php" class="button" onclick="return confirm('Вы уверены, что хотите удалить аккаунт?')">Удалить аккаунт</a>
        </form>
    </div>
</body>
</html>
