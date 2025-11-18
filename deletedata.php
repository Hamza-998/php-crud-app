<?php
include 'config/databaseconnection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Delete query
    $query = "DELETE FROM employeedata WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    if($stmt){
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Redirect with success message
        header("Location: index.php?message=Record+deleted+successfully");
        exit();
    } else {
        // Redirect with error message
        header("Location: index.php?message=Error+deleting+record");
        exit();
    }
} else {
    // Redirect if no id provided
    header("Location: index.php");
    exit();
}
?>
