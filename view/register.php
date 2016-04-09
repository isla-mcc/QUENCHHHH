
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>

    <body>
                <br><br>
                <a href="#/homepage">View Homepage</a>
                <a href="#/login">Login</a>
                <br><br>
        
        <section class='loginsection'>
            <br><br>
            <img id='logo' src='img/quenchlogo.png'/>
            <h2>Register</h2>
            <input type="text" id="username_r" placeholder="Username" /><br/>
            <input type="password" id="password_r" placeholder="Password"/><br/>
            <input type="password" id='c_password_r' placeholder='Confirm Your Password'/><br/>
            <button type="submit" id="sub">Register</button><br/><br/><br/> 
        </section>
        

        <!--<input type='text' id='title' placeholder='title' />
        <input type='text' id='path' placeholder='path' /> 
        <button id='submit'>Submit</button> -->
        
    </body>

    <script>
       $(document).ready(function(){
            
            document.getElementById('sub').onclick = function(){
           //connect and insert 
            $.ajax({
               url:"controller/register.php",
                type:"post",
                dataType:"html",
                data: {
                    method:"insert",
                    username: document.getElementById('username_r').value,
                    password: document.getElementById('password_r').value
                },
                success:function(resp){
                    //alert("INSERT!");
                    window.location = '#/login';
                }
            });
            
            }
            
        });

    </script>
        
        
    <!-- <script src="./js/register_val.js"></script> -->
</html>

