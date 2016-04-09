<?php
include("../model/commentdb.php");

if($_POST['method'] == "insert"){
    insert_comment();   
}

if($_POST['method'] == "getall"){
    get_comments();   
}

if($_POST['method'] == "getmy"){
    get_my_comments();   
}

if($_POST['method'] == "delete"){
    delete_comment();   
}

if($_POST['method'] == "update"){
    update_comment();   
}
?>