<?php

    require "define.php";

    $string = file_get_contents("hotels.json");
    
    if ($string === false) {
        // deal with error...
    }

    echo $string;

?>