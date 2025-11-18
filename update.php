<?php
 include 'config/databaseconnection.php';
 include 'header.php';

?>





<?php


if(isset($_GET["id"])) {

    $id = $_GET["id"];

    $query = "SELECT * FROM employeedata WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }else{

     $row = mysqli_fetch_assoc($result);
} 
}

?>













<?php


if(isset($_POST['update'])) {

    if(isset($_GET['new_id'])) {
        $old_id = $_GET['new_id'];
    } else {
        die("Error: Missing employee ID for update.");
    }

    $new_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $number = $_POST['number'];  

    $query = "UPDATE employeedata SET `id`='$new_id', `name`='$name', `email`='$email', `age`='$age', `number`='$number' WHERE `id`='$old_id'";

    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query Failed: " . mysqli_error($conn));
    } else {
        header("Location: index.php?message=Employee Data Updated Successfully");
        exit();
    }
}










?>


<form action="update.php?new_id=<?php echo $id; ?>" method="POST" class="styled-form">
  
   
      <div class="modal-header">
        <h1 class="modal-title fs-5">Update New Employee Data</h1>
      </div>
      <div class="modal-body">
       <div class="form-group">
    <input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" required>
    <label for="id">Employee ID</label>
  </div>
  




  <div class="form-group">
    <input type="text" name="name" id="name"  value="<?php echo $row['name'] ?>" required>
    <label for="name">Name</label>
  </div>

  <div class="form-group">
    <input type="email" name="email" id="email"  value="<?php echo $row['email'] ?>" required>
    <label for="email">Email</label>
  </div>

  <div class="form-group">
    <input type="number" name="age" id="age" value="<?php echo $row['age'] ?>" required>
    <label for="age">Age</label>
  </div>

  <div class="form-group">
    <input type="text" name="number" id="number" value="<?php echo $row['number'] ?>" required>
    <label for="number">Phone Number</label>
  </div>

   <input type="submit" name="update" class="btn btn-primary mt-3" value="Update Data">


</form>





<?php
include 'footer.php';
?>








