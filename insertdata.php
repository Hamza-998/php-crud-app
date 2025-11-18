<?php

include("./config/databaseconnection.php");


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $number = $_POST['number'];  
}


$query = "INSERT INTO `employeedata`(`id`, `name`, `email`, `age`, `number`) VALUES ('$id','$name','$email','$age','$number')";


$result = mysqli_query($conn, $query);

if(!$result){
    die("Query Failed: " . mysqli_error($conn));
}else   {
    header("Location: index.php?message=Employee Data Inserted Successfully");
    exit();
}
?>