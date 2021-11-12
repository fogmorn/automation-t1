<?php
if (isset($_GET['first']) && isset($_GET['second'])) {
 
    $num1 = $_GET['first'];
    $num2 = $_GET['second'];
    $result = $num1 * $num2;
    
    echo $result . "<br />";
    echo $_SERVER['SERVER_NAME'] . "<br />";
    echo $_SERVER['SERVER_ADDR'];

}
?>
