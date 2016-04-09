var ctrl = angular.module("AllControllers", []);

ctrl.controller("chatCtrl", ["$scope", function($scope){
            $scope.hello = "How's it goin'?";
            $scope.myid = "coolId";
            $scope.clickFunc = function(id){
                $.ajax({
                    url:"controller/message.php",
                    type:"POST",
                    dataType:"html",
                    data:{
                        method:"like",
                        message_id:sessionStorage.id,
                        user_id:8 
                    },
                    success:function(resp){
                        alert("INSERT");
                    }
                
                });
            }
            
            setInterval(function(){
            $.ajax({
                    url:"controller/message.php",
                    dataType:"json",        
                    type:"POST",
                data:{
                method:"getall"
                },
                success:function(resp){
                    console.log(resp);
               
                    $scope.$apply(function(){
                        $scope.msgs = resp;
                    })
                }
             })
               }, 1000)
}]);