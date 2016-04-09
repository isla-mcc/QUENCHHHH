<a href='#/homepage'>Back</a>
<style>
    
li {
float: left;
}

#display {
height: 500px;
width: 310px;
}
    
#commentdisplay {
height: auto;
}
    
</style>
<div id="display">


<div id='commentdisplay'>

</div>
<script>
  $(document).ready(function () {
 
    $.ajax({
      url: "./controller/comment.php",
      type: "post",
      dataType: "json",
      data: {
        method: "getmy",
        user_id: sessionStorage.myid
        
      },
      success: function (resp) {
          
        var html = "<ul id='listId'>";
        for (var i = 0; i < resp.length; i++) {
          html += "<li id=''something'>" + resp[i].username + ": " + resp[i].title + "  ";
          html += "<a id='" + resp[i].comment_id + "' class='editcomment'>Edit</a>  <a id='" + resp[i].comment_id + "' class='deletecomment'>Delete</a><br>";
            html += "<br>";
          html += "</li>";
        }
        html += "</ul>";
        $("#commentdisplay").html(html);
          
       var listId = document.getElementById('listId');
       var something = document.getElementById('something');
          
        listId.style.listStyle = "none";
       
$(".deletecomment").click(function () {
          $.ajax({
            url: "./controller/comment.php",
            type: "post",
            dataType: "html",
            data: {
              method: "delete",
              comment_id: $(this).attr("id")
            },
            success: function (resp) {
              location.reload();
            }
          });
        });

        $(".editcomment").click(function () {
          var commentid = $(this).attr("id");
          $("#commentdisplay").html("<textarea id='newcomment'></textarea><button id='newcommentsub'>Edit</button>");
          $("#newcommentsub").click(function () {
            $.ajax({
              url: "./controller/comment.php",
              type: "post",
              dataType: "html",
              data: {
                method: "update",
                comment_id: commentid,
                title: $("#newcomment").val()
              },
              success: function (resp) {
                location.reload();
              }
            });
          });

        });

      }
    });

  });
      
</script>