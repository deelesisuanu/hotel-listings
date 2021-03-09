<?php
    
    require "../controller/utils/Validations.php";
    require "../controller/utils/Generators.php";
    require "../controller/Constants.php";

    $generatedAccountNumber = Generators::getRandomNumbersWithinRange(1000000000, 9999999999);
    $generatedPin = Generators::getRandomNumbersWithinRange(1000, 9999);
    
    $generatedOtp110 = Generators::getRandomNumbersWithinRange(100000, 999999);
    $generatedOtp210 = Generators::getRandomNumbersWithinRange(100000, 999999);

    $current = time();
    $currentMonth = date('m');
    $currentYear = date('Y');

?>