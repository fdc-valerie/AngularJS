<!DOCTYPE html>
<html>
<head>
	<title>Angular Get</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"  />
</head>
	<body>
		<div ng-app="test" ng-controller="Ctrl">
		<div >
			<table border="1">
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Type</th>
				<th>Subject</th>
			</tr>
			<tr ng-repeat = "row in jsondata">
				<td>{{row.ID}}</td>
				<td>{{row.first_name}}</td>
				<td>{{row.last_name}}</td>
				<td>{{row.type}}</td>
				<td>{{row.subject}}</td>
				<td><a class="'btn btn-info'"></td>
			</tr>
			</table>
		
		</div>
		</div>
	<script>
		var app = angular.module('test',[]);
		app.controller('Ctrl', function($scope,$http){
		 // $http.get('jsonObject.php')
		 $http.get('dataObject.php')
		.then(function (response){

			console.warn(response);

			$scope.jsondata = response.data;
			console.log("status:" + response.status);
		}).catch(function(response) {
		  console.error('Error occurred:', response.status, response.data);
		}).finally(function() {
			 console.log("Task Finished.");
		});
}); 
	</script>
	</body>
</html>