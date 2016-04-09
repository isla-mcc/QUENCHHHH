<?php
include("../model/editprofile.php");
    
    if($_POST['method'] == "editprofile"){
    edit_profile(); 
}

   if($_POST['method'] == "getprofile"){
    get_profile(); 
} 

    if($_POST['method'] == "new_image"){
    new_image();
}


?>