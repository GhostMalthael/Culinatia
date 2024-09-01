<?php
    require "connectdb.php";
    $query = mysqli_query($conn, "SELECT books.IDBooks, books.TitleBooks, books.Image, books.Description, books.Cost,categories.NameCategory  FROM books 
    INNER JOIN categories ON books.IDCategory=categories.IDCategory;");
    $booksAll = mysqli_fetch_all($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Использование БД</title>
</head>
<body>
    <div class="booksAll">
        <?php foreach($booksAll as $book):?>
            <div class="bookOne">
                <p>IDBooks: <?=$book[0]?></p>
                <p>TitleBooks: <?=$book[1]?></p>
                <p>Image: <img src="<?=$book[2]?>" alt="Пусто" style="width: 100px; height: 100px;"></p>
                <p>Description: <?=$book[3]?></p>
                <p>Cost: <?=$book[4]?></p>
                <p>Categories: <?=$book[5]?></p>
            </div>
        <?endforeach;?>
    </div>
</body>
</html>