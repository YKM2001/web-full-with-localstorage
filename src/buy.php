<?php

    require_once('../crud/db/db.php');


    if(isset($_POST['submit'])) {
        $number = $_POST['number'];
        $sql = mysqli_query($con, "INSERT INTO `buylist`(`id`, `number`) VALUES (NULL,'$number')");
        if($sql) {
            echo "Вы купили товар! Ждите скоро придёт доставка";
        }
    }
?>