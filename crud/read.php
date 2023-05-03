<?php
    require_once "./db/db.php";

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

    <div class="container">
        <?php
        $sql = mysqli_query($con, "SELECT * FROM `products`");
        while($row = mysqli_fetch_assoc($sql)) {
            echo '
            <form method="post" action="redate.php">
            <input type="number" name="id" value="'.$row['id'].'"/>
            <input type="text" name="name" value="'.$row['name'].'"/>
            <img src="'.$row['img'].'">
            <input type="text" name="description" value="'.$row['descr'].'"/>
            <input type="number" name="price" value="'.$row['price'].'"/>
            <input type="text" name="categories" value="'.$row['categories'].'"/>
            <input type="submit" name="update" value="update"/>
            <input type="submit" name="delete" value="delete"/>
            </form>
            ';
        };
        ?>

    </div>
    

</body>
</html>