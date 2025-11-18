<?php
 include 'config/databaseconnection.php';
 include 'header.php';

?>

<div class="section-header">
    <h2 class="sub-heading">Employee Data</h2>
    <a class="add-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Employee </a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Phone Number</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    
    <?php
    $query = "SELECT * FROM employeedata";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error($conn));
    }else{
        while($row = mysqli_fetch_assoc($result)){

    ?>

    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['age'] ?></td>
        <td><?php echo $row['number'] ?></td>
        <td><a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i></a></td>
        <td><a href="deletedata.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
        
        
    </tr>


    <?php
        }

    }

    ?>
</tbody>


</table>

<?php
if (isset($_GET['message'])) {
    echo "<h4 id='flash-message' class='alert alert-success text-center' role='alert'>".$_GET['message']."</h4>";
}
?>

<script>
// 2 second baad message chhupa do
setTimeout(function() {
    var msg = document.getElementById('flash-message');
    if (msg) {
        msg.style.display = 'none';
    }
}, 15000);

// URL se ?message=... hata do taake refresh par na aaye
if (window.location.search.includes('message=')) {
    const url = new URL(window.location);
    url.searchParams.delete('message');
    window.history.replaceState({}, document.title, url.pathname);
}
</script>







<!-- Modal -->
<form action="insertdata.php" method="post" class="styled-form">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Employee Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="form-group">
    <input type="text" name="id" id="id" required>
    <label for="id">Employee ID</label>
  </div>

  <div class="form-group">
    <input type="text" name="name" id="name" required>
    <label for="name">Name</label>
  </div>

  <div class="form-group">
    <input type="email" name="email" id="email" required>
    <label for="email">Email</label>
  </div>

  <div class="form-group">
    <input type="number" name="age" id="age" required>
    <label for="age">Age</label>
  </div>

  <div class="form-group">
    <input type="text" name="number" id="number" required>
    <label for="number">Phone Number</label>
  </div>
</div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <input type="submit" name="submit" class="btn btn-primary" value="Add">
        
      </div>
    </div>
  </div>
</div>


</form>
















































<?php
include 'footer.php';
?>

    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>