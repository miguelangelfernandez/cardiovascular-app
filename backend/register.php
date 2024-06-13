<?php 
	/* Author: Cozy👽 https://github.com/ItsCosmas */


	include ('connection.php');
    include ('functions/main.php');

    $theUsers = new Main;
    
	if(isset($_SESSION['loggedin'])===true){ // esta condicion no funciona bien y no controla bien la session, esta frozada a true
        header('Location: login.php');
	}else{

 	if($_POST){

        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $acceptConditions = $_POST['check'];  // No se controla que se acepten las condicionoes
        $userCount = 0; // se asume que no existe en user... no esta controado aun
 		if(empty($fullName) or empty($email) or empty($username) or empty($pwd) or empty($confirmPassword)){
            $errors = '<div class="alert alert-warning"><strong> All fields are required! </strong> Please try again 😒</div>';
            header('Location: signup.php');
		}else if($pwd != $confirmPassword){
            $errors = '<div class="alert alert-warning"><strong> Both Passwords should Match! </strong> Please try again 😒</div>';
            header('Location: signup.php');	
        }else if($userCount > 1){
            $errors = '<div class="alert alert-warning"><strong> Username is Taken </strong> Please Try Another one 😒</div>';
            header('Location: signup.php');
           
        }else{
            $dbPassword = md5($pwd);
            $query = $pdo->prepare("INSERT INTO user ( username ,userEmail, fullName,password) VALUES ( ?,?,?,?)");
			$query->bindValue(1, $username);	
            $query->bindValue(2, $email);
            $query->bindValue(3, $fullName);
            $query->bindValue(4, $dbPassword);
        
            
            $query -> execute(); 
		    header('Location:login.php');
        }
				 	}
				}
	
?>