<?php

include("../model/image.php");

if($_POST['method'] == "myimages"){
    view_images();
}

if($_POST['method'] == "viewall"){
    view_all();
}

if($_POST['method'] == "insertcomment"){
    insert_comment();
}

if($_POST['method'] == "delete"){
    delete_image();
}

if($_POST['method'] == "update"){
    update_img();
}

if($_POST['method'] == "userandimage"){
    user_and_image();
}

?>