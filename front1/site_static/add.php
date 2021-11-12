<?php
if (isset($_POST['first']) && isset($_POST['second'])) {
 
    $num1 = $_POST['first'];
    $num2 = $_POST['second'];
    $result = $num1 + $num2;
    
    echo $result . "<br />";
    echo $_SERVER['SERVER_NAME'] . "<br />";
    echo $_SERVER['SERVER_ADDR'];

}
?>
