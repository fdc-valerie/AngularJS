<?php 	
include('classAngular.php');
	$pdo = new AngularClass();

		if($pdo){
		$result = $pdo->viewRow();
		echo json_encode($result);
		}else{
			echo 'error';
		}
		
	
		//foreach($result as $row){
	
		// echo json_encode $row['ID'];
	    // echo json_encode($row['first_name']);
	    //echo $row['last_name'];
	 //    echo $row['type'];
		// echo $row['subject'];
	
	//} 
?>