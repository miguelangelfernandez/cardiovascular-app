<?php

	/* Author: Cozy https://github.com/ItsCosmas */
	
	include_once('connection.php');
	if(isset($_SESSION['loggedin'])===false){
		header('Location: ../index.php');
	}else{


		if(isset($_GET['id'])){
			$noteID = $_GET['id'];
			
			$query = $pdo->prepare("DELETE FROM patients WHERE id = ?");
			$query->bindValue(1,$noteID);
			$query->execute();
			header('Location: ../index.php');
            exit();
        }
            
            
    }
			
?>