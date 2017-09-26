<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script>
	var app = angular.module('test',[]);
	app.controller('Ctrl', function($scope, $http, filterFilter){
	 	$scope.datas = [];
	 	
	 	 $scope.delete = function(index){
			    $http.post('/trials/delete/' + index.id)
				.then(function success(response){
					// $scope.PostDataResponse = response;
					console.log(response);
					$scope.getTrials();
			});
  		}

 		$scope.searchData = function(){
 			// console.log('test');
 			if($scope.search){
 				 var search ={
 				 	search:$scope.search
 				 };
 				$http.post('/trials/search',search)
				.then(function success(e){
					console.log(e);
					$scope.datas = e.data;
				});
  			}
 		}
 		
		$scope.getTrials = function(){
		 	$http.get('../Trials/view')
			.then(function success(e){
				$scope.datas = e.data;
			});
	 	}
		$scope.getTrials();


	}); 
</script>
<body>
	<div ng-app="test">
			<div ng-controller="Ctrl">
			<form method="POST">
				<input type="text" name="search" ng-model="search">
				<button class="btn btn-primary" type="submit" ng-click="searchData()">Search</button>
			</form>
				<div class="table-responsive">
					<table>
						<thead>
				  		  	<tr>
								<th>ID</th>
								<th>Username</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="row in datas ">
								<td>{{ row.Trial.id }}</td>
								<td>{{ row.Trial.username }}</td>
								<td><a ng-href="/trials/update/{{ row.Trial.id }}">Edit</a> |
									<a ng-click="delete(row.Trial)">Delete</a>
								</td>
							</tr>
						</tbody>
					</table>			
				</div>
			</div>
		</div>
</body>

