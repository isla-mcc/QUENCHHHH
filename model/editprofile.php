<?php
include("connect.php");

function get_profile(){
        global $db;
        $query = "SELECT users.id, users.username, users.password, users.bio FROM users";
        $result = $db->query($query);
        echo json_encode($result->fetchAll());
    }

function edit_profile(){
        global $db;
        $query = "UPDATE users SET username = '".$_POST['username']."', password = '".$_POST['password']."', bio = '".$_POST['bio']."' WHERE id ='".$_POST['id']."'";
    
        $result = $db->query($query);
        echo json_encode($result->fetchAll());
        
        //update info from users from the users table
}

function new_image(){
        global $db;
        $query = "INSERT INTO images (title, path, description, user_id) VALUES ('".$_POST['title']."', '".$_POST['path']."', '".$_POST['description']."', '".$_POST['user_id']."')";
        
        $result = $db->query($query);
        echo $query;
}

function view_all_images(){
    global $db;
    $query = "SELECT * FROM images";
    $result = $db->query($query);
    echo json_encode($result->fetchAll());
    
}

function delete_image(){
    global $db;
    $query = "DELETE FROM images WHERE id = '".$_POST['id']."'";
    $result = $db->query($query);

}

function update_info(){
    global $db;
    $query = "UPDATE images SET title = '".$_POST['title']."', description = '".$_POST['description']."'  WHERE id = '".$_POST['id']."'";
    $result = $db->query($query);
    echo json_encode($result->fetchAll());
   
}


?>