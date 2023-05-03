<?php
    require_once "./db/db.php";

// ? заносим в карточку измененные даные
    if(isset($_POST['updating'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $descr = $_POST['description'];
        $categories = $_POST['categories'];
        // ? получаем файл через глобальную переменную
        $file = $_FILES['img'];
        // ? отправляем в нашу папку с названием картинки и случайным временем
        $path = "images/" . time() .basename($_FILES['img']['name']);
        // ? если получилось загрузить в нашу папку пишем гуд!
        if(move_uploaded_file($_FILES['img']['tmp_name'],$path)){
            echo "<p>Загружена картинка в папку images!</p>";
        }
        $updating = mysqli_query($con, "UPDATE `products` SET `name`='$name',`img`='$path',`descr`='$descr',`price`='$price',`categories`='$categories' WHERE id ='$id'");
        if($updating) {
            echo "Товар отредактирован!)";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redate</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <div class="wrapper"></div>

    <div class="container">


    
    

</body>
</html>