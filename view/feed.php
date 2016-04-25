<!DOCTYPE html>
<html>
<br><br>
    <div id='viewProfile'>
    <div class='thenav'>
    <a id='menu' href="#/profile">View Your Profile</a>
    <a id='menu' href="#/login">Logout</a>
    </div>        
    </div>
    <img id='logo' src='img/quenchlogo.png'/>
    </br>
    </br>

    <div id='allposts'>
    </div>
    
    <div id="display"></div>
    <div id='commentdisplay'></div>
    
    <div id="profileInfo"></div>
    <div id='userPost'></div>   
        
</html>

<script>

$(document).ready(function(){
                            
    var id = sessionStorage.myid;
    
            $.ajax({
                    url:"controller/images.php",
                    dataType:"json",
                    type:"POST",
                    data:{
                        method:"viewall"
    
                    },
                    success:function(resp){
                        console.log(resp);
                        
                        for(var i = 0; i<resp.length; i++){
                            
                            var img = document.createElement("img");
                            img.src = resp[i].path;
                            img.title = resp[i].title;
                            img.style.height = "150px";
                            img.style.width = "auto";
                            
                            var desc = document.createElement("p");
                            desc.innerHTML = resp[i].description;
                            desc.style.fontFamily = "Helvetica";
                            desc.style.fontWeight = "200";
                            desc.style.color = "white";
                            desc.style.fontSize = "15px";
                            
                            var title = document.createElement("h2")
                            title.innerHTML = img.title;
                            title.style.fontFamily = "Helvetica";
                            title.style.fontWeight = "100";
                            title.style.color = "white";
                            
                            var thename = document.createElement("p")
                            thename.innerHTML = resp[i].username;
                            thename.style.fontFamily = "Helvetica";
                            thename.style.fontWeight = "100";
                            thename.style.color = "black"; 
                            
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
                                        welcome.innerHTML = resp[i].username;

                                        profileInfo.appendChild(welcomeDiv)
                                        profileInfo.appendChild(nameDiv);
                                        welcomeDiv.appendChild(welcome); 

                                        profileInfo.style.margin = "auto";
                                        profileInfo.style.backgroundColor = "#ffffff";
                                        profileInfo.style.border = "solid 1px #d3d3d3";
                                        profileInfo.style.marginBottom = "10px";

                            }
                        }

                    });

                            var commentTitle = document.createElement("input");
                            commentTitle.id = "cmText"+resp[i].id;
                            commentTitle.placeholder = "Express interest in " + resp[i].title +"!";
                            commentTitle.style.marginTop = "10px";
                            commentTitle.style.width = "210px";
                            commentTitle.style.height = "2px";
                            
                            var comment = document.createElement("button");
                            comment.innerHTML = "Message!";
                            comment.style.marginBottom = "10px";
                            comment.style.width = "90px";
                            comment.style.marginLeft = "5px";
                            
                            var div = document.createElement("div");
                            div.class = 'div';
                            div.style.backgroundColor = "white";
                            
                            var masterDiv = document.getElementById("allposts");
                            masterDiv.appendChild(div);
                            
                            var imgDiv = document.createElement("div");
                            masterDiv.appendChild(imgDiv);
                            imgDiv.class = 'div';
                            imgDiv.style.backgroundColor = "rgb(226,108,100)";
                            
                            /*imgDiv.onclick = function(){
                                sessionStorage.image_id = this.id;
                                window.location.replace("#/otheruserprofile");   
                            }*/
                                                        
                            imgDiv.onclick = function() {
                                        sessionStorage.image_id = this.id;
                                        window.location.replace("#/imageinfo");
                                }
                            
                            var usrDiv = document.createElement("div");
                            usrDiv.style.marginTop = "";
                            
                            var commentDiv = document.createElement("div");
                            
                            var br2 = document.createElement("br"); 
                            var br = document.createElement("br"); 
                            var name = document.createElement("p");
                            
                            
                            
                           /* $.ajax({
                                         url:"controller/images.php",
                                         dataType:"json",
                                         type:"POST",
                                         data:{
                                                method:"userandimage",
                                              },
                                     
                                          success:function(resp){
                                                for(var i = 0; i<resp.length; i++){
                                                    console.log(resp);
                                                    name.innerHTML = resp[i].username;
                                               
                }
                                                
            }
        }); 
                            
                            $.ajax({
                                  url: "./controller/comment.php",
                                  type: "post",
                                  dataType: "json",
                                  data: {
                                  method: "getall",
                                  image_id: sessionStorage.image_id
                                  },
                                success: function (resp) {
                                    console.log(resp);
                                    var html = "<ul id='list'>";
                                    for (var i= 0; i < resp.length; i++) {
                                      html += "<li id='listItem'>"+resp[i].username+": "+resp[i].title+"</li>";
                                    }
                                      html += "";
                                      html += "</ul>";
                                    $("#commentdisplay").html(html);

                                      var list = document.getElementById("list");
                                      var listItem = document.getElementById("listItem");

                                      list.style.listStyleType = "none";

                                  },
                                error: function(jqXHR, textStatus, errorThrown) {
                              console.log(textStatus, errorThrown);
                            }
                                });
                            
                            */
                            masterDiv.style.margin = "auto";
                            
                            div.appendChild(imgDiv);
                            imgDiv.appendChild(br2);
                            imgDiv.appendChild(title);
                            imgDiv.appendChild(thename);
                            imgDiv.appendChild(img);
                            imgDiv.appendChild(desc);
                            imgDiv.appendChild(br);
                            div.appendChild(usrDiv);
                        
                            usrDiv.appendChild(name);
                            
                            div.appendChild(commentDiv);
                            commentDiv.appendChild(commentTitle);
                            commentDiv.appendChild(comment);
                            
                        
                            div.style.marginBottom = "10px";
                            usrDiv.style.backgroundColor = "#eee";
                            commentDiv.style.backgroundColor = "#eee";
                            masterDiv.style.width = "350px";
                            
                                                      
                            comment.id = resp[i].id;
                            div.id = resp[i].id;
                            imgDiv.id = resp[i].id;
                            thename.id = resp[i].id;
                            
                               comment.onclick = function(){
                               
                                var something = this.id;
                                   
                                    var text = document.getElementById('cmText' + something);

                                    $.ajax({
                                        url:"controller/comment.php",
                                        dataType:"html",
                                        type:"POST",
                                        data:{
                                            method:"insert",
                                            user_id:sessionStorage.myid,
                                            img_id: something,
                                            title: text.value
                                        },
                                        success:function(resp){
                                            text.value = "";
                                            console.log(resp);

                                }
                            });
                         }  
                               
        
                    }
                        
       
                }
            });
        });
    
    