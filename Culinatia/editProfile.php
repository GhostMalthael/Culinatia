<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="logOrReg">
       <form action="edit.php" method="post">
            <h1>Редактировать профиль</h1>
            <?php
            require "connectdb.php";          
            $user_id = $_COOKIE['IDUsers'];
            $query = mysqli_query($conn, "SELECT * FROM users WHERE IDUsers = $user_id");
            if($query->num_rows > 0)
            {
                $user_data = $query->fetch_assoc();
                echo '<p><input class="otstupTop" type="text" placeholder="Введите логин" value="' . $user_data['Login'] . '" name="login"></p>';
                echo '<p><input class="otstupTop" type="text" placeholder="Введите пароль" value="' . $user_data['Password'] . '" name="password"></p>';
                echo '<p><input class="otstupTop" type="text" placeholder="Введите ФИО" value="' . $user_data['FullName'] . '" name="fullName"></p>';
                echo '<p>Укажите пол:<input style="margin-left:20px;" type="radio" name="gender" value="М" ' . ($user_data['Gender'] == 'М' ? 'checked' : '') . '>Мужской';
                echo '<input style="margin-left:25px;" type="radio" name="gender" value="Ж" ' . ($user_data['Gender'] == 'Ж' ? 'checked' : '') . '>Женский</p>';                
                echo '<p><input class="otstupTop" type="text" placeholder="Введите почту" value="' . $user_data['Email'] . '" name="email"></p>';
                echo '<p><input class="otstupTop" type="text" placeholder="Введите номер телефона" value="' . $user_data['NumberPhone'] . '" name="numberPhone"></p>';
                echo '<p>Дата рождения:<input style="width: 188px;" type="date" min="1950-01-01" max="2017-01-01"  id="birthdate" value="' . $user_data['DateBirth'] . '" name="birthDate"></p>';
            }
            ?>
            <button type="submit">Сохранить</button>
        </form>
    </div>
</body>
</html>
