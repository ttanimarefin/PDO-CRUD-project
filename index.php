<?php  
$connection= new PDO('mysql:host=localhost;dbname=project1', 'root', '');
$statement=$connection->prepare('select * from teachers order by id desc');
$statement->execute();
$teac=$statement->fetchAll(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
 <div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Teacher</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="create.php">Add Teacher</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Pricing</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
  </div>
 <div class="container">
   <div class="card mt-5">
     <div class="card-header">
       <h2 class="text-center">All Teachers Information</h2>
     </div>
     <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
        <?php foreach($teac as $teachers): ?>
        <tr>
          <td><?= $teachers->id; ?></td>
          <td><?= $teachers->name; ?></td>
          <td><?= $teachers->email; ?></td>
          <td><?= $teachers->phone; ?></td>
          <td><?= $teachers->address; ?></td>
          <td>
            <a class="btn btn-info" href="edit.php?id=<?= $teachers->id; ?>">Edit</a>
            <a class="btn btn-warning" id="delete" href="delete.php?id=<?= $teachers->id; ?>">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>


      </table>
     </div>
   </div>
 </div> 
</body>
</html>