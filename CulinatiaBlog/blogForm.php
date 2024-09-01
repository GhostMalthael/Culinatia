<?php
require "connecting.php";

$queryCategories = "SELECT idCategory, name FROM categories";
$resultCategories = mysqli_query($conn, $queryCategories);

if ($resultCategories === false) {
    die("Ошибка выполнения запроса: " . mysqli_error($conn));
} else {
    $categories = mysqli_fetch_all($resultCategories, MYSQLI_ASSOC);
}

$searchFilter = '';
$categoryFilter = '';
$sortDirection = 'ASC';

$sql = "SELECT recipes.idRecipes, recipes.title, recipes.description, recipes.image, categories.name, users.nameUser 
        FROM recipes
        JOIN categories ON recipes.idCategory = categories.idCategory
        JOIN users ON recipes.idUser = users.idUser";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $searchFilter = "recipes.title LIKE '%$search%'";
    }

    if (!empty($_POST['category'])) {
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $categoryFilter = "categories.idCategory = '$category'";
    }

    if (!empty($_POST['sortDirection'])) {
        $sortDirection = $_POST['sortDirection'] == 'desc' ? 'DESC' : 'ASC';
    }
}

$filters = [];
if (!empty($searchFilter)) {
    $filters[] = $searchFilter;
}
if (!empty($categoryFilter)) {
    $filters[] = $categoryFilter;
}

if (count($filters) > 0) {
    $sql .= " WHERE " . implode(' AND ', $filters);
}

$sql .= " ORDER BY recipes.title $sortDirection";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blogsKitch.css"/>
    <link rel="stylesheet" href="blogStyle.css"/>
    <title>Кулинатия</title>
</head>
<body>
<header>
    <h1>Кулинатия</h1>
    <nav class="nav-container">
        <div class="profile-and-exit">
            <a href="profilForm.php"><img src="profil.png" alt="Профиль" class="profile-icon"></a>
            <a href="createrecept.php" class="button">Создать рецепт</a>
            <a href="" class="link">Избранное</a>
            <a href="exitUser.php" class="link">Выйти</a>

        </div>
    </nav>
</header>
<div class="recipes">
    <h1>Все самые клааааааассные рецепты</h1>
    <div class="filt">
        <form method="post">
            <input type="text" name="search" placeholder="Поиск по названию..." value="<?= htmlspecialchars($_POST['search'] ?? '') ?>">
            <select name="category">
                <option value="">Все категории</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['idCategory']; ?>" <?= (isset($_POST['category']) && $_POST['category'] == $category['idCategory']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select name="sortDirection">
                <option value="asc" <?= (isset($_POST['sortDirection']) && $_POST['sortDirection'] == 'asc') ? 'selected' : '' ?>>От А до Я</option>
                <option value="desc" <?= (isset($_POST['sortDirection']) && $_POST['sortDirection'] == 'desc') ? 'selected' : '' ?>>От Я до А</option>
            </select>
            <button type="submit" name="filter">Фильтровать</button>
        </form>
    </div>
    <div class="cart-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='recipe-card'>";
                echo "<img src='" . htmlspecialchars($row["image"]) . "' alt='Recipe Image'>";
                echo "<h2>Название: " . htmlspecialchars($row["title"]) . "</h2>";
                echo "<p>Описание: " . htmlspecialchars($row["description"]) . "</p>";
                echo "<p>Категория: " . htmlspecialchars($row["name"]) . "</p>";
                echo "<p>Автор: " . htmlspecialchars($row["nameUser"]) . "</p>";
                echo "<a href='editrecept.php?idRecipes=" . $row["idRecipes"] . "' class='button'>Редактировать</a>";
                echo "<a href='deleterecept.php?idRecipes=" . $row["idRecipes"] . "' class='button' onclick='return confirm(\"Вы уверены, что хотите удалить рецепт?\")'>Удалить</a>";
                echo "</div>";
            }
        } else {
            echo "<p>0 результатов</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
