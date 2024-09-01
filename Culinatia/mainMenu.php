<?php
    require "connectdb.php";
    $sql = "SELECT * FROM Recipes
        INNER JOIN Categories ON Recipes.categoryRecipes=Categories.iDCategory;";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главное меню</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #6bdfa8;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .recipesGallery {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            padding: 20px;
        }
        .recipe {
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            padding: 20px;
            margin-bottom: 20px;
            width: calc(33.33% - 40px);
            margin-right: 20px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .recipe h3 {
            margin-top: 0;
            margin-bottom: 5px;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .imgSettings {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .buttonSettings {
            display: inline-block;
            padding: 10px 20px;
            background-color: #66cdaa;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
        }

        .buttonSettings:hover {
            background-color: #fb08ff;
        }

        .recipe .text-content {
            flex-grow: 1;
        }

        .description-container {
            display: flex;
            justify-content: space-between;
        }

        .calories {
            margin-left: auto;
            margin-top: 16px ;
        }
    </style>
</head>
<body>
<header>
    <h1>Главное меню</h1>
    <a href="editProfile.php" class="edit-profile-button">Редактировать профиль</a>
</header>
    <div class="recipesGallery">
        <?php 
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                echo '<div class="recipe">';
                echo '<img class="imgSettings" src="' . $row['imageRecipes'] . '" />';
                echo '<div class="text-content">';
                echo '<h3>' . $row['nameRecipes'] . '<span>' . $row['nameCategory'] . '</span></h3>'; 
                echo '<div class="description-container"><p>' . $row['descriptionRecipes'] . '</p><span class="calories">' . $row['caloriesRecipes'] . ' ккал</span></div>';
                echo '</div>';
                echo '<div>';
                echo '<a href="moreAboutRecipe.php?id=' . $row['idRecipe'] . '" class="buttonSettings">Подробнее</a>';
                echo '<a href="#" class="buttonSettings">Сохранить</a>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
<footer>
    <a href="index.php" class="buttonSettings">Выйти</a>
    <a href="addNewRecipe.php" class="buttonSettings">Добавить рецепт</a>
</footer>
</body>
</html>
