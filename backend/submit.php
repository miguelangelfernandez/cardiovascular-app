<?php 
	/* Author: Cozy👽 https://github.com/ItsCosmas */


	include ('connection.php');
    include ('functions/main.php');
    

	if(isset($_SESSION['loggedin'])===false){
		header('Location: ../index.php');
	}else{

 	if($_POST){
		$id = $_POST['id'];
        $Age= $_POST['Age'];
		$Gender= $_POST['Gender'];
        $Height= $_POST['Height'];
        $Weight= $_POST['Weight'];

 		if(empty($id) or empty($Age)){
			$errors = '<div class="alert alert-warning"><strong> All fields are required! </strong> Please try again 😒</div>';
			header('Location: ../index.php');
		}else{
				 	
			$query = $pdo->prepare("INSERT INTO patients (id,Age,Gender,Height, Weight,Doctor)
            VALUES ( ?,?,?,?,?,?)");
			$query->bindValue(1, $id);	
			$query->bindValue(2, $Age);
			$query->bindValue(3, $Gender);
			$query->bindValue(4, $Height);
			$query->bindValue(5, $Weight);			
			$query->bindValue(6, $_SESSION['username']);
			            
            $query -> execute(); 
		    header('Location: ../index.php');	

					 }
				 	}
				}
	
?>