<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script>
	var app = angular.module('test',[]);
		app.controller('Ctrl', function($scope, $http){

			$scope.registration = function (){
			
				if ($scope.username && $scope.password) {

					var data = {
							username : $scope.username,
							password : $scope.password,
					};

					$http.post('/trials/insert',data)
					.then(function success(response){
						// $scope.PostDataResponse = response;
						console.log(response);
						window.location.href = '/trials/index';
					});		
				}
			}
	});

	$(function() {
		$('form').submit(function(e) {
			console.log('test');
			e.preventDefault();
		});
	});
	
</script>
<div>
	<div ng-app="test">
		<div ng-controller="Ctrl">
		 <h3>Add User</h3>
		  <?php 
				echo $this->Form->create('Trial', array(''));
				echo $this->Form->input('username',array(
				'name'=>'username',
				'ng-model' => 'username' 
					)	
				);
				echo $this->Form->input('password',array(
					'name'=>'password',
					'ng-model' => 'password'
					)
				);
				echo $this->Form->button('Add',array(
					'type' => 'submit',
					'ng-click' => 'registration()'
					)
				);
				echo $this->Form->end();
		  ?>
		</div>
	</div>
</div> 