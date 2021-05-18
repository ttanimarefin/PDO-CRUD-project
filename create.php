<?php
if(isset($_POST['name']) && isset($_POST['phone'])&& isset($_POST['address'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    $connection = new PDO('mysql:host=localhost;dbname=project1', 'root', '');
    $statement=$connection->prepare("insert into teachers(name, email, phone, address) values (:name, :email, :phone, :address)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':address'=>$address

    ]);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
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
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
        <div class="card">
        
            <div class="card-header">
                <h2 class="text-center">Add New Teacher Info</h2>
            </div>
            <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" name="phone" id="phone" class="form-control">
                </div>

                <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-outline-info">Add a teacher</button>
                </div>
            </form>
            
            </div>
        
        </div>
    
    
    </div>
</body>
</html>