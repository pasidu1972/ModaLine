<?php

session_start();
require './connection.php';

if(isset($_GET["id"])){

    $w_id = $_GET["id"];

    if(isset($_SESSION["u"])){
        $uemail = $_SESSION["u"]["email"];

        $watch_list_item_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='$w_id' AND `users_email`='$uemail'");
        $watch_list_item_num = $watch_list_item_rs->num_rows;

        if($watch_list_item_num == 0){
            Database::iud("INSERT INTO `watchlist` (`product_id`,`users_email` ) VALUES ('$w_id', '$uemail')");
            echo("success");
        } else {
            Database::iud("DELETE FROM `watchlist` WHERE `product_id`='$w_id' AND `users_email`='$uemail'");
            echo("Removed");

        }

    } else {
        echo ("Please Login");
    }
}



?>
