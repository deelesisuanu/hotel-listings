<?php

    require "define.php";

    $string = file_get_contents("bookings.json");
    
    if ($string === false) {
        // deal with error...
    }

    echo $string;

?>