<?php
    require "connectdb.php";
    $sql = "SELECT iDCategory, nameCategory FROM Categories";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Добавление рецепта</title>
    <style>
        .button-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-top: 20px;
        }
        .button-container button:first-child {
            margin-right: 60px; 
        }
    </style>
</head>
<body>
<div class="logOrReg">
    <form action="reg.php" method="post">
        <h1>Добавление рецепта</h1>
        <p><input class="otstupTop" type="text" placeholder="Название блюда" name="nameRecipe"></p>
        <p><input class="otstupTop" type="text" placeholder="Описание" name="descriptionRecipe"></p>
        <p>
            <select style= "height: 30px;" class="otstupTop" name="categoryRecipe">
                <option value="">Выберите категорию рецепта</option>
                <?php
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['iDCategory'] . '">' . $row['nameCategory'] . '</option>';
                    }
                }
                ?>
            </select>
        </p>
        <p><input class="otstupTop" type="text" placeholder="Калорийность" name="fullName"></p>
        <div class="button-container">
            <button type="submit">Назад</button>
            <button type="submit">Добавить</button>
        </div>
    </form>
</div>
</body>
</html>
