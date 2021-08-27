<?php
include_once 'database.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE users set id='" . $_POST['id'] . "', email='" . $_POST['email'] . "' ,password='" . $_POST['password'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Employee Data</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<div class="container pt-5">
    <div class="row">
        <div class="col-lg-6 m-auto card p-5">
        <h2 class="pb-3">update Data into User</h2>
        <form name="frmUser" method="post" action="">
    
            <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" id="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
            <?php if(isset($message)) { echo 
                " <div class='alert alert-success' role='alert'>".$message. "</div>" ; } ?>

        <a href="index.php" class="btn btn-primary">Backt to Home</a>
        </div>

    </div>
</div>
</body>
</html>