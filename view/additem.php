<!DOCTYPE html>
<html>
    <head>
        <title>Add Item</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>
            <br><br>
            <h1>Add a Cat!</h1>
            
            <input type="text" id="title" placeholder="Cat's Name"/><br>
            <input type="text" id="path" placeholder="Image URL"/><br>
            <input type="text" id="description" placeholder="Describe this cat"/><br>
            <button type="submit" id="additem">Add Your Cat!</button><br><br>
            <a href="#/profile"><--Go Back--<</a>
            <br><br><br>
     </body>
    
    <script>
        
$(document).ready(function(){

    var id = sessionStorage.myid;
    
    document.getElementById('additem').onclick = function(){
           //connect and insert 
            $.ajax({
               url:"controller/editprofile.php",
                type:"post",
                dataType:"html",
                data: {
                    method:"new_image",
                    title: document.getElementById('title').value,
                    path: document.getElementById('path').value,
                    description: document.getElementById('description').value,
                    user_id:id
                },
                success:function(resp){
                    window.location.replace("#/profile");
                }
            });
            
            } 
            
        });

    </script>
</html>
