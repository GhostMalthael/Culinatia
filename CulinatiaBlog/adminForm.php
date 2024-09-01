<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #86cfce;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .user_cards_container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .user_card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 10px;
            background-color: #00c7c5;
            box-sizing: border-box;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .user_card img {
            width: 30px; 
            height: 30px;
            margin-right: 10px;
        }
        .user_card p {
            margin: 0 0 10px;
            color: #555;
        }
        .button {
            display: inline-block;
            margin-top: 10px;
            margin-left: 10px;
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            background-color: #ff3800;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #730505;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Все пользователи Кулинатии</h2>
        <div class="user_cards_container">
            <?php
                require "connecting.php";

                function updateStatus($userId, $newStatus) {
                    global $conn;
                    $sql = "UPDATE users SET statusUser='$newStatus' WHERE idUser=$userId";
                    mysqli_query($conn, $sql);
                }

                if (isset($_GET['action']) && isset($_GET['user_id'])) {
                    $action = $_GET['action'];
                    $user_id = $_GET['user_id'];

                    if ($action == 'block') {
                        updateStatus($user_id, 'blocked');
                    } elseif ($action == 'unblock' || $action == 'restore') {
                        updateStatus($user_id, 'активный');
                    }
                }

                $sql = "SELECT users.idUser, users.nameUser, users.numberUser,users.genderUser,users.emailUser, users.statusUser
                        FROM users
                        WHERE users.idRole=2";
                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='user_card'>";
                        echo "<p>ID: ". $row["idUser"]. "</p>";
                        echo "<p>Имя пользователя: ". $row["nameUser"]. "</p>";
                        echo "<p>Номер телефона пользователя: ". $row["numberUser"]. "</p>";
                        echo "<p>Пол пользователя: ". $row["genderUser"]. "</p>";
                        echo "<p>Email: ". $row["emailUser"]. "</p>";
                        echo "<p>Статус: ". $row["statusUser"]. "</p>";
                        echo '<div>'; 
                        if ($row['statusUser'] == 'активный') {
                            echo '<a href="?action=block&user_id='. $row['idUser'].'" class="button">Заблокировать</a>'; 
                        } elseif ($row['statusUser'] == 'blocked') {
                            echo '<a href="?action=unblock&user_id='. $row['idUser'].'" class="button">Разблокировать</a>'; 
                        } elseif ($row['statusUser'] == 'удален') {
                            echo '<a href="?action=restore&user_id='. $row['idUser'].'" class="button">Восстановить</a>'; 
                        }
                        echo '<a href="?action=block&user_id='. $row['idUser'].'" class="button" style="background-color:#88ff00;" ">Просмотреть рецепты</a>'; 

                        echo '</div>'; 
                        echo "</div>";
                    }
                } else {
                    echo "<p>Пользователи не найдены.</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>
