<?php
session_start();
if(!isset($_SESSION['admin'])){
require_once 'config/config.php';
      
   
$error= false;
if(isset($_POST['submit'])){
      
 $name = $_POST['name'];
 $pass = $_POST['pass'];
$hash = md5 ($pass);
$login = "SELECT * FROM `login` WHERE name = '$name' AND pass = '$hash'";
  
$loginres = mysqli_query($conn, $login);
$row = mysqli_fetch_array($loginres);
    $count= mysqli_num_rows($loginres);
    if($count>0){
$_SESSION['name'] = $row['name'];
$_SESSION['pass'] = $row['pass'];
header("location:logged.php");
     }else{
        $error= true;
    }
}
}
?>
<ul>
  <li><a href="registration.php">Registration</a></li>
</ul>
 <section class="col-lg-4 connectedSortable"></section>
          
          
        <section class="col-lg-4 connectedSortable">
            <?php if($error){ ?>
          	<div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Email or Password!
            </div>
            
            <?php } ?>
        <div class="box box-info">
            <div class="box-header with-border text-center">
              <h1 class="box-title">Login</h1>
            </div>
           
            <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];  ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="name" class="form-control" id="name" placeholder="Name" name="name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" placeholder="Pass" name="pass" required>
                  </div>
                </div>
                <div class="form-group">
                 
                </div>
              </div>
      
              <div class="box-footer">
              
                <button type="submit" class="btn btn-info pull-right" name="submit">Sign in</button>
              </div>
             
            </form>
          </div>

        </section>
        <!-- /.Left col -->
    
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
