<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script>
	var username = "<?php echo $trial['Trial']['username']; ?>";
	var password = "<?php echo $trial['Trial']['password']; ?>";
	var id = "<?php echo $trial['Trial']['id']; ?>";

	var app = angular.module('test',[]);
	app.controller('Ctrl', function($scope,$http){

		$scope.username = username;
		$scope.password = password;

		$scope.update = function (){
			
		// 	console.log('test 1');
			console.log($scope.username);
			console.log($scope.password);
			if ($scope.username && $scope.password) {

				var data = {
						username : $scope.username,
						password : $scope.password,
				};

				$http.post('/trials/edit/' + id, data)
				.then(function success(response){
					// $scope.PostDataResponse = response;
					console.log(response);
					window.location.href = '/trials/index';
				});		
			}
		}
	});

	$(function(){
		$('form').submit(function(e) {
			e.preventDefault();
		});
	});
</script>
<div ng-app="test">
	<div ng-controller="Ctrl">
		<h3>Edit User Info</h3>
	

	  <?php echo $this->Form->create('Trial', array(''));
	 	  echo $this->Form->input('username',array(
	 	  		'ng-model' =>'username',
	 	  	)
	 	  );
	      echo $this->Form->input('password',array(
	 	  		'ng-model' => 'password',
	      	)
	      );
	      echo $this->Form->button('Update',array(
	      	'type' => 'submit',
	      	'ng-click' => 'update()'
	      	)
	      );
	      echo $this->Form->end();
	  ?>
	</div>
</div>
