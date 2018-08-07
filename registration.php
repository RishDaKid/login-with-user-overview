<?php

require_once 'config/config.php';
$message = false;
if(isset($_POST['submit'])){      
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $hash = md5 ($pass);
  
    $insert = "INSERT INTO `login`(`name`, `pass`)
     VALUES ('$name','$hash')";
    mysqli_query($conn,$insert); 
    
    $message = true;
}
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<ul>
  <li><a href="index.php">Login</a></li>
</ul>
<body>


    <div class="content">
<h1 align="center">Registration</h1>
<?php if($message){ ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#">×</a>Record Inserted Successfully!
            </div>
            
            <?php } ?>
            <form role="form" method="post" enctype="multipart/form-data" action="<?php  $_SERVER['PHP_SELF']; ?>">
              <div class="box-body">

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name..." required>
                </div>

                <div class="form-group">
                  <label for="pass">Password</label>
                  <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Email..." required>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button  type="submit" class="button" name="submit">Add</button>

           
              </div>
          </div>
            </form>


</body>
</html>