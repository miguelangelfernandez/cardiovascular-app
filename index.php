<?php
/* Author: Cozy👽 https://github.com/ItsCosmas */
include_once ('backend/connection.php');
include_once ('backend/functions/main.php');

$thePatients = new Main;
$check = new Main;

$patients = $thePatients->getAllPatients($_SESSION['username']);
$check_login = $check->logged_in();
if($check_login === false){
    header('Location: backend/login.php');
}else{

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cardio Risk Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/style.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="ckeditor/ckeditor.js"></script> <!-- CK Editor-->

</head>
<body>
<div class="container">
<h6>Welcome to cardiovascular risk tool. Active user: <?php echo $_SESSION['username'] ?> </h6>
<Button type="button" class="btn btn-secondary" onClick="logOut()">Log Out</Button>
</div>
<hr>

<div class="container">
<!-- A Bootstrap Table -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Patien ID</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Height</th>
      <th scope="col">Weight</th>
      <th scope="col">AP_HI</th>
      <th scope="col">AP_LO </th>
      <th scope="col">Cholesterol</th>
      <th scope="col">Glucose</th>
      <th scope="col">Smoke</th>
      <th scope="col">Alcohol</th>     
      <th scope="col">Active</th>     
      <th scope="col">Risk</th>     
    </tr>
  </thead>
  <tbody>
        
        <?php foreach($patients as $patients){?>
            <tr>
                    <th scope="row"><h6><?php echo $patients['id']?></h6></th>
                    <td><h6><?php echo $patients['Age']?>Years</h6></td>
                    <td><?php echo $patients['Gender']?></td>
                    <td><?php echo $patients['Height']?></td>
                    <td><?php echo $patients['Weight']?></td>
                    <td><?php echo $patients['id']?></td>
                    <td><?php echo $patients['id']?></td>
                    <td><?php echo $patients['id']?></td>
                    <td><?php echo $patients['id']?></td>
                    <td><?php echo $patients['id']?></td>
                    <td><?php echo $patients['id']?></td>
                    <td><?php echo $patients['id']?></td>
                    <td><span><?php echo $patients['id']?></span></td>
                    <td><a href="backend/edit.php?id<?php echo $patients['id'];?>"><Button type="button" class="btn btn-primary">Edit</Button></a>
                    <Button type="button" class="btn btn-danger" name="<?php echo $patients['id']; ?>" onClick="deletePatient(<?php echo $patients['id']; ?>)">Delete</Button></td>
            </tr>    
        <?php } ?>
  </tbody>
</table>
</div> <hr>
<form action="backend/submit.php" method="POST">
<div class="container">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-left">
<br>
<label for="id"><h6>New Patient Id: </h6></label>
<input type="text" name="id" id="" size="1" >
<label for="Age"><h6>Age: </h6></label>
<input type="text" name="Age" id="editor" size="1">
<label for="Gender"><h6>Gender: </h6></label>
<select name="Gender" id="editor">
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
<label for="Height"><h6>Height: </h6></label>
<input name="Height" id="editor" size="1">
<label for="Weight"><h6>Weight: </h6></label>
<input name="Weight" id="editor" size="1">
</br>
<Br>
<label for="AP_HI"><h6>AP_HI: </h6></label>
<input type="text" name="AP_HI" id="" size="1" >
<label for="AP_LO"><h6>AP_LO: </h6></label>
<input type="text" name="AP_LO" id="" size="1" >

<label for="Cholesterol"><h6>Cholesterol: </h6></label>
<input type="text" name="Cholesterol  " id="" size="1" >

<label for="Glucose"><h6>Glucose: </h6></label>
<input type="text" name="Glucose" id="" size="1" >  

</Br>
<Br>
<label for="Smoke"><h6>Smoke: </h6></label>
<select name="Smoke" id="editor">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
<label for="Alcohol"><h6>Alcohol: </h6></label>
<select name="Alcohol" id="editor">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
<label for="Active"><h6>Active: </h6></label>
<select name="Active" id="editor">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
<label for="Risk"><h6>Risk: </h6></label>
<select name="Risk" id="editor">
  <option value="Y">Y</option>
  <option value="N">N</option>
</select>
</Br>
<Br>
</Br>
<button type="submit" class="btn btn-primary">Create new patient</button></div>
</div>
</form>
<div class="container">
<!--show erros if isset-->
<?php if(isset($errors)){
                            echo $errors;
                            }?>
</div>
    
<script>
//<!-- This Script Adds CK Editor to the page -->
CKEDITOR.replace( 'editor' );
function deletePatient(x){
         var confirmDelete = confirm( "Are you sure you want to delete this Patient?");
             if(confirmDelete == true){              
             window.location = "backend/delete.php?id=" + x;
             }
	}
function logOut(){
    window.location = "backend/logout.php";
}
</script>
</body>
</html>
<?php }?>