<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script>

	var app = angular.module('test',[]);
	app.controller('Ctrl', function($scope, $http){
	 	$scope.datas = [];

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
							<tr ng-repeat="row in datas">
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

