<?php

include("connect.php");

    function insert_comment(){
      global $db;
      $query = "INSERT INTO comment (title, user_id, img_id) VALUES ('".$_POST['title']."', '".$_POST['user_id']."', '".$_POST['img_id']."')";
     
      $result = $db->query($query);
    }

    function get_comments(){
      global $db;
      $query = "SELECT comment.title, comment.user_id, users.username, users.id
      FROM comment 
      LEFT JOIN users ON comment.user_id = users.id 
      WHERE img_id = '".$_POST['image_id']."'";
//        var_dump($result);
        $result = $db->query($query);
        
//        echo "[{\"Data\" : ".$result."}]";
    //    print_r($result);
      //echo $result;
      echo json_encode($result->fetchAll());
  
    }

    function get_my_comments(){
      global $db;
      $query = "SELECT comment.id AS comment_id, comment.title, comment.user_id, users.username 
      FROM comment
      LEFT JOIN users ON comment.user_id = users.id 
      WHERE user_id = '".$_POST['user_id']."'";
      $result = $db->query($query);
      echo json_encode($result->fetchAll());
    }

    function update_comment(){
      global $db;
      $query = "UPDATE comment SET title = '".$_POST['title']."' WHERE ID='".$_POST['comment_id']."'";
      $result = $db->query($query);
    }

    function delete_comment(){
      global $db;
      $query = "DELETE FROM comment WHERE ID = '".$_POST['comment_id']."'";
      $result = $db->query($query);
    }

?>