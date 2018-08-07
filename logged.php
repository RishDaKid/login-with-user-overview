<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php
require_once 'config/config.php';
session_start();
if(isset($_SESSION['login'])){
	$message = false;
    $del_msg = false;
   $select = "SELECT * FROM login";
    $res = mysqli_query($conn,$select);
    $count = mysqli_num_rows($res);
    if(isset($_GET['del'])){
      $del = $_GET['del'];
      $query = "DELETE FROM login WHERE id='$del'";
      mysqli_query($conn,$query);
      
      $del_msg = true;
      $select = "SELECT * FROM login";
      $res = mysqli_query($conn,$select);
}}
?>
 <div class="box-body">

                <div></div>
              <table id="customers">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Pass</th>  
                  <th>DELETE</th>  

                </tr>
                </thead>
                <tbody>
               <?php while($row = mysqli_fetch_array($res)) {
                    $id = $row['id']; ?>
                    <tr>
                  <td><?php echo $row['id'];  ?></td>
                    <td><?php echo $row['name'];  ?></td>
                    <td><?php echo $row['pass'];  ?></td>
                    <td><?php echo "<a class='btn btn-primary' href='logged.php?del=".$id."'>Delete</a>";  ?></td>
                    <?php  } ?> 
                </tr>
            </tbody>
        </table>
    </div>
    