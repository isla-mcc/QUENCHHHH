<?php
    
try {
    $db = new PDO("mysql:dbname=meow; host=localhost", "root", "root");
} catch(PDOException $e) {
    echo "FAIL";
}

?>