<?php 
$id = $_GET['id'];

$con = new PDO('mysql:host=localhost;dbname=project1', 'root', '');
$statement = $con->prepare('select * from teachers where id=:id');
$statement->execute([
  ':id' => $id
]);
if(isset($_POST['name']) && isset($_POST['phone'])&& isset($_POST['address'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
  $statement = $con->prepare("update teachers set name=:name, email=:email, phone=:phone, address=:address where id=:id");
  $statement->execute([
    ':name' => $name,
    ':email' => $email,
    ':phone' => $phone,
    ':address' => $address,
    ':id' => $id,
  ]);
  header('location:index.php');
}


$teachers = $statement->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
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
  <div class="container">
    
  </div>
 <div class="container">
   <div class="card mt-5">
     <div class="card-header">
       <h2>Edit Teacher Details</h2>
     </div>
     <div class="card-body">
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $teachers->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input value="<?= $teachers->email; ?>" type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
        <div class="form-group">
                <label for="phone">Phone</label>
                <input value="<?= $teachers->phone; ?>" type="phone" name="phone" id="phone" class="form-control">
         </div>
         <div class="form-group">
                <label for="address">Address</label>
                <input value="<?= $teachers->address; ?>" type="text" name="address" id="address" class="form-control">
         </div>

        <div class="form-group">
          <button type="submit" class="btn btn-outline-info">Update</button>
        </div>
      </form>
     </div>
   </div>
 </div> 
</body>
</html>