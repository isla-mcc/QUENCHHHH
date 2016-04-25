<!DOCTYPE html>
<html>
<br><br>
<a href='#/homepage'>Back</a>
<div id="display">

</div>
<div id='commentdisplay'>
  
</div>
<script>
 $(document).ready(function () {

    $.ajax({
      url: "./controller/images.php",
      type: "post",
      dataType: "json",
      data: {
        method: "viewall",
        image_id: sessionStorage.image_id
      },
      success: function (resp) {
          
          for(var i = 0; i<resp.length; i++){
                if (resp[i].id != sessionStorage.image_id)
                continue;
              
        var html = "";
          html += "<div class='singleimage'>";
          html += "<h2>"+resp[i].title+"</h2>";
          html += "<img id='infoImg' src='" + resp[i].path + "' />"
          html += "<div>";
          html += "<p>"+resp[i].description+"</p>";
          html += "</div>";
          html += "</div>";
        $("#display").html(html);
           
          var infoImg = document.getElementById('infoImg'); 
            infoImg.style.width = "200px";
            infoImg.style.height = "auto";
              
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
     
  }); 
</script>
</html>