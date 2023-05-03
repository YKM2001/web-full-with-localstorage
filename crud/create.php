<?php
    require_once "./db/db.php";

    if(isset($_POST['create'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $descr = $_POST['descr'];
        $categories = $_POST['categories'];
        // ? получаем файл через глобальную переменную
        $file = $_FILES['img'];
        // ? отправляем в нашу папку с названием картинки и случайным временем
        $path = "images/" .time() .basename($_FILES['img']['name']);
        // ? если получилось загрузить в нашу папку пишем гуд!
        if(move_uploaded_file($_FILES['img']['tmp_name'],$path)){
            echo "<p>Загружена картинка в папку images!</p>";
        }
        $sql = mysqli_query($con, "INSERT INTO `products`(`id`, `name`, `img`, `descr`, `price`, `categories`) VALUES (NULL,'$name','$path','$descr','$price', '$categories')");
        if($sql) {
            echo "<p>Запрос прошёл успешно и товар сгенерирован!</p>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create product!</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <div class="wrapper"></div>
    <!-- ? тип кодирования данных -->
    <form enctype="multipart/form-data" action="create.php" method="post">

    <select name="categories" required>
        <option>Выберите категорию</option>
        <option name="action">Экшен</option>
        <option name="anime">Аниме</option>
        <option name="racer">Гонки</option>
        <option name="strategies">Стратегии</option>
        <option name="indie">Инди</option>
        <option name="adventures">Приключения</option>
    </select>

    <input type="file" name="img" required>

    <input type="text" name="name" placeholder="name" required>

    <input type="text" name="descr" placeholder="описание" required>

    <input type="number" name="price" placeholder="цена" required>

    <input type="submit" value="Создать продукт" name="create">

    </form>

</body>
</html>