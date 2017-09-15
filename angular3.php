<!DOCTYPE html>
<html>
<head>
	<title>Angular Post</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
</head>
<body>
	<div ng-app= "test" ng-controller="Ctrl">
	<h3>Registration Form </h3>
	First Name:<input type="text" ng-model="first_name" name="first_name">
	Last Name: <input type="text" ng-model="last_name" name="last_name">
	Subject: <input type="text" ng-model="subject" name="subject">
	<button type="submit" ng-click="registration()">Submit</button>

	<script>
		var app = angular.module('test',[]);
		app.controller('Ctrl', function($scope,$http){

			$scope.registration = function (){
				$scope.data = [{
					"first_name" : $scope.first_name,
					"last_name" : $scope.last_name,
					"subject" : $scope.subject
				}];

				$http.post('insertObject.php',{datas: $scope.data})
				.then(function success(response){
					// $scope.PostDataResponse = response;
					console.log(response);
				});
			}

	});
	
</script>
</body>
	
		

	
</html>