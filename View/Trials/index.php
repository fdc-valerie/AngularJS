<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script>
	var app = angular.module('test',[]);
	app.controller('Ctrl', function($scope, $http){
	 	$scope.datas = [];
	 	
	 	 $scope.delete = function(index){
			    $http.post('/trials/delete/' + index.id)
				.then(function success(response){
					// $scope.PostDataResponse = response;
					console.log(response);
					$scope.getTrials();
			});
  		}
  		$scope.search = function(){
  			if($scope.searchData){
				var search = $scope.searchData;
				console.log(search);
				$http.post('/trials/search',search)
				.then(function success(response){
				console.log(response);
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
			<?php 
				echo $this->Form->create('Trial', array('default'=>false));
				echo $this->Form->input('search', array(
					'id' => 'searchid',
					'ng-model' => 'searchData')
				);
				echo	 $this->Form->button('Search',array(
					'type' => 'submit',
					'ng-click' => 'search()'
					)
				);
				echo $this->Form->end();
			 ?>
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

<?php 
	echo $this->Paginator->prev(
	'« Previous ',
	null ,
	null ,
	array('class' => 'disabled')
	); 
	echo $this->Paginator->numbers();
	echo $this->Paginator->counter(array(
		'format' => ' Page {:page} of {:page}'));
?>