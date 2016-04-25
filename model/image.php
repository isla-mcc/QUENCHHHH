<?php
include("connect.php");

function view_images(){
    
    global $db;
    $query = "SELECT * FROM images WHERE user_id = '".$_POST['user_id']."'";
    
    $result = $db->query($query);
    
    echo json_encode($result->fetchAll());   
}

function view_all(){
    global $db;
    $query = "SELECT * FROM images";
    $result = $db->query($query);
    echo json_encode($result->fetchAll());
    
}

function view_username(){
    
}


/*
function view_all(){
      global $db;
      $query = "SELECT images.id AS user_id, images.title, images.description, images.path, images.user_id, users.username 
      FROM images
      LEFT JOIN users ON images.user_id = users.id 
      WHERE user_id = '".$_POST['user_id']."'";
      $result = $db->query($query);
      echo json_encode($result->fetchAll());

}*/

function insert_comment(){
    
        global $db;
        $query = "INSERT INTO comments (title, user_id, img_id) VALUES ('".$_POST['title']."', '".$_POST['user_id']."', '".$_POST['img_id']."')";
    
     $result = $db->query($query);
    echo $query;
        
 
}


function delete_image(){
    
    global $db;
    
    $query = "DELETE FROM images WHERE id = '".$_POST['id']."'";
    
    $result = $db->query($query);

}

function update_img(){
    
    global $db;
    
    $query = "UPDATE images SET title = '".$_POST['title']."', description = '".$_POST['description']."'  WHERE id = '".$_POST['id']."'";
    
    $result = $db->query($query);
    
    echo json_encode($result->fetchAll());
   
}

function user_and_image(){
    
    global $db;
    
    $query = "SELECT *
              FROM images
              LEFT JOIN users
              ON images.user_id = users.id";
    
    $result = $db->query($query);
    
    echo json_encode($result->fetchAll());
}


?>