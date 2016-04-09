var MessageApp = angular.module("MessageApp", [
    "ngRoute", 
    "AllControllers"
]);

MessageApp.config([
    "$routeProvider", "$locationProvider", function($routeProvider, $locationProvider){
        $routeProvider.when(
            "/profile",
            {
                templateUrl:"view/profile.php",
            }
        ).when(
            "/edit",
            {
                templateUrl:"view/user.html",
            }
        ).when(
            "/login",
            {
                templateUrl:"view/index.html"
            }    
            
        ).when(
            "/register",
            {
                templateUrl:"view/register.php"
            }  
        ).when(
            "/homepage",
            {
                templateUrl:"view/feed.php"
            } 

        ).when(
            "/additem",
            {
                templateUrl:"view/additem.php"
            } 

        ).when(
            "/mycomments",
            {
                templateUrl:"view/mycomments.php"
            } 
        ).when(
            "/imageinfo",
            {
                templateUrl:"view/imageinfo.php"
            } 
        ).when(
            "/homepage2",
            {
                templateUrl:"view/homepage.php"
            } 
        ).otherwise(
      {redirectTo: "/login"}
        )
    }
]);