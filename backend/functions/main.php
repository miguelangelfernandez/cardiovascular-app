<?php
/* Author: Cozy👽 https://github.com/ItsCosmas */
class Main{
//Check if user is logged in 
public function logged_in(){
    return (isset($_SESSION['loggedin'])) ? true : false;
}

//fetch all patients
public function getAllPatients($Doctor){
    global $pdo;

    $query = $pdo->prepare('SELECT * FROM patients where Doctor = ?');
    $query->BindValue(1,$Doctor);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//fetch Patients by ID 
public function fetchPatientData($id){
    global $pdo;

    $query = $pdo->prepare('SELECT * FROM patients where id = ?');
    $query->BindValue(1,$id);
    $query->execute();

    return $query->fetch();
}

//fetch user by username
public function fetchUser($username){
    global $pdo;

    $query = $pdo->prepare('SELECT * FROM user WHERE username = ?');
    $query->bindValue(1, $username);
    $query->execute();


}

}
?>