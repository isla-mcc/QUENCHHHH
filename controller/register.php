<?php
include("../model/userdb.php");

if($_POST['method'] == "insert"){
    var_dump($_POST);
    insert_user();   
    
}

?>