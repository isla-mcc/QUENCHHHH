<html>
    <head>
<title>My Images</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>
    
#nav {
font-color: #ced;
}
    
</style>
</head>
<body>
<div id='viewProfile'>
<br><br>
<div class='thenav'> 
    <a id='menu' href="#/homepage">Homepage</a>
    <a id='menu' href="#/edit">Edit Profile</a>
    <a id='menu' href="#/additem">Upload Image</a>
    <a id='menu' href="#/mycomments">My Messages</a>
</div>       
    </div>
    
<div id="profileInfo"></div>
    
<div id='userPost'></div>
<br>
</body>
<script>
    
$(document).ready(function(){
    console.log(sessionStorage.myid);
    var id = sessionStorage.myid;
    
    
    
    $.ajax({
                url:"controller/editprofile.php",
                type:"POST",
                dataType:"json",
                data: {
                    method:"getprofile",
                    user_id: sessionStorage.myid,
                    id:id
                },
                success:function(resp){
                console.log(resp);
                    
                    for(var i = 0; i<resp.length; i++){
                        if (resp[i].id != sessionStorage.myid)
                            continue;
                        
                        var welcomeDiv = document.createElement("div");
                        var nameDiv = document.createElement("div");
                        
                        var welcome = document.createElement("h3");
                        welcome.innerHTML = resp[i].username+ "'s Profile!";
                        
                        var bio = document.createElement("p");
                        bio.innerHTML = resp[i].bio;
                        
                        var profileInfo = document.getElementById("profileInfo");
                        profileInfo.style.width= "49.8vw";
                        
                        profileInfo.appendChild(welcomeDiv)
                        profileInfo.appendChild(nameDiv);
                        welcomeDiv.appendChild(welcome); 
                        profileInfo.appendChild(bio);
                        
                        profileInfo.style.margin = "auto";
                        profileInfo.style.backgroundColor = "#ffffff";
                        profileInfo.style.border = "solid 1px #d3d3d3";
                        profileInfo.style.marginBottom = "10px";
                        
                        
            }
        }
    
    });
    
            $.ajax({
                    url:"controller/images.php",
                    dataType:"json",
                    type:"POST",
                    data:{
                        method:"myimages",
                        user_id:id
                    },
                    success:function(resp3){
                        console.log(resp3);
                        for(var i = 0; i<resp3.length; i++){
                            var imgs = document.createElement("img");
                            imgs.src = resp3[i].path;
                            imgs.title = resp3[i].title;
                            imgs.style.height = "200px";
                            imgs.style.width = "auto";
                            
                            var p = document.createElement("p");
                            var p2 = document.createElement("h2");
                            p.innerHTML = resp3[i].description;
                            p2.innerHTML = imgs.title;
                            
                            var editImg = document.createElement("button");
                            var deleteImg = document.createElement("button");
                            
                            editImg.innerHTML = "Edit";
                            deleteImg.innerHTML = "Delete";

                            editImg.style.width = "60px";
                            deleteImg.style.width = "60px";
                            
                            deleteImg.id = resp3[i].id;
                            editImg.id = resp3[i].id;
                            
                            deleteImg.style.marginBottom = "10px";
                                      
                            var div = document.getElementById("userPost");
                            var onePost = document.createElement("div");
                            div.style.margin = "auto";
                            div.style.backgroundColor = "#ced";
                            //div.appendChild(p);
                            div.appendChild(onePost);
                            onePost.appendChild(p2);
                            onePost.appendChild(imgs);
                            onePost.appendChild(p);
                            onePost.appendChild(editImg);
                            onePost.appendChild(deleteImg);
                            
                            onePost.style.borderBottom = "solid 1px grey";
                            onePost.style.marginBottom = "10px";
                            div.style.width = "350px";
                                          
                            deleteImg.onclick = function(){
                                
                                var butt_id = this.id;
                                
                                $.ajax({
                                    url: "controller/images.php",
                                    dataType: "html",
                                    type: "POST",
                                    data:{
                                        method: "delete",
                                        id: butt_id
                                        

                                    },
                                    success:function(resp){
                                        console.log(resp);
                                        alert("Deleted!");
                                        window.location.reload();
                                    }
                                });
                            }
                  
                                editImg.onclick = function(){
                                
                                var new_info = this.id;
                                var updateDiv = document.createElement("div");
                                updateDiv.style.backgroundColor = "#ced";
                                updateDiv.style.height = "auto";
                                updateDiv.style.width = "349px";
                                updateDiv.style.position = "relative";
                                updateDiv.style.marginRight = "auto";
                                updateDiv.style.marginLeft = "auto";

                                var edit = document.createElement("div");
                                    
                                var newTitle = document.createElement("input");
                                newTitle.style.marginTop = "15px";
                                    
                                var newDesc = document.createElement("input");
                                
                                newTitle.placeholder = "edit name";
                                newDesc.placeholder = "edit description";
                                
                                var updateBtn = document.createElement("button");
                                updateBtn.innerHTML = "Update!";
                                updateBtn.style.marginBottom = "15px";
                                updateBtn.style.marginRight = "5px";
                                    
                                var cancel = document.createElement("button");
                                cancel.innerHTML = "Cancel";
                                cancel.style.marginLeft = "5px";
                                    
                                    
                                onePost.appendChild(updateDiv);
                                updateDiv.appendChild(edit);
                                    
                                edit.appendChild(newTitle);
                                edit.appendChild(newDesc);
                                edit.appendChild(updateBtn);
                                edit.appendChild(cancel);
                                
                                    
                                updateBtn.id = this.id;
                                
                                var title2 = newTitle.value;
                                var desc2 = newDesc.value;
                                    
                                cancel.onclick = function(){ 
                                    
                                     onePost.removeChild(updateDiv); 
                                    
                                    }
                                
                                
                                updateBtn.onclick = function(){ 
                                    
                      
                                    $.ajax({
                                        url: "controller/images.php",
                                        dataType: "html",
                                        type: "POST",
                                        data:{
                                            method: "update",
                                            id: new_info,
                                            title: newTitle.value,
                                            description:newDesc.value,


                                        },
                                        success:function(resp){
                                            console.log(resp);
                                            window.location.reload();
                                        }  
      
                                    });
                            
                                }
                    
                            }
                        
                        
                        }
     
                }
        });
});

</script>
    
    
</html>