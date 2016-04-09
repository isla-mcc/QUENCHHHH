<!DOCTYPE html>
<html  ng-app='MessageApp'>

<head>
    <title>Meow</title>
    <base href="/QUENCHHHH/" />
    <meta name="viewport" content="width=device-width" />
</head>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.js"></script>
    <script src="js/newapp.js"></script>
    <script src="js/controller.js"></script>

<body>
        <div id='content'>
 
            <div ng-view>
            </div>
            
        </div>
</body>
    
</html>