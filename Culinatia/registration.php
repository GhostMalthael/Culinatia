<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
    <title>Регистрация</title>
</head>
<body>
    <div class="logOrReg">
        <form action="reg.php" method="post">
            <h1>Регистрация</h1>
            <p><input class="otstupTop" type="text" placeholder="Введите логин" name="login"></p>
            <p><input class="otstupTop" type="text" placeholder="Введите пароль" name="password"></p>
            <p><input class="otstupTop" type="text" placeholder="Повторите пароль" name="repeatPassword"></p>
            <p><input class="otstupTop" type="text" placeholder="Введите ФИО" name="fullName"></p>
            <p>Укажите пол:<input style="margin-left:20px;" type="radio" name="gender" value="М">Мужской
            <input style="margin-left:25px;" type="radio" name="gender" value="Ж">Женский</p>
            <p><input class="otstupTop" type="text" placeholder="Введите почту" name="email"></p>
            <p><input class="otstupTop" type="text" placeholder="Введите номер телефона" name="numberPhone"></p>
            <p>Дата рождения:<input style="margin-left:42px; width: 150px;" type="date" id="birthdate" name="birthDate"></p>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>