<?php
    require_once "./db/db.php";
    // ? удаляем товар
    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
        $del = mysqli_query($con, "DELETE FROM `products` WHERE id = '$id'");
        if($del) {
            echo '<p>Товар удален из базы данных!</p>
            <a href="read.php">Отправиться обратно!</a>
            ';
            
        }
    };
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
    <?php
        // ? вытаскиваем карточку которую мы хотим заапдейтить
        if(isset($_POST['update'])) {
            $id = $_POST['id'];
            $update = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = '$id'");
            while($row = mysqli_fetch_assoc($update)) {
                echo '
                <form enctype="multipart/form-data" method="post" action="update.php">
                <input type="number" name="id" value="'.$row['id'].'"/>
                <input type="text" name="name" value="'.$row['name'].'"/>
                <img src="'.$row['img'].'">
                <input type="file" name="img"/>
                <input type="text" name="description" value="'.$row['descr'].'"/>
                <input type="number" name="price" value="'.$row['price'].'"/>
                <input type="text" name="categories" value="'.$row['categories'].'"/>
                <input type="submit" name="updating" value="update"/>
                </form>
                ';
            };
        }
    ?>

    </div>
    

</body>
</html>