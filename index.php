<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container pt-5">
    <div class="row">
    <div class="col-lg-4 py-3 card">
    
      <h2 class="">Insert Data into USER</h2>
      <form action="create-process.php" method="POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="text" id="password" name="password" class="form-control" placeholder="Password">
        </div>

        <button type="submit" name="ok" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="col-lg-8 py-3">
      <h2 class="">Data from USER</h2>
      <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
      <?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
      <tr class="<?php if(isset($classname)) echo $classname;?>">
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["password"]; ?></td>
        <td><a href="update-process.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning text-light">Update</a></td>
        <td><a href="delete-process.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger text-light">Delete</a></td>
       </tr>
       <?php
	$i++;
	} ?>
      </tbody>
 
</table>

      </div>
    </div>
    </div>
  </div>

</body>
</html>