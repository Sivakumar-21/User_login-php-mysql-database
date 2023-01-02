<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['email'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    
      <h1 style="text-align: center;">Hii <?php echo $_SESSION['username'];?></h1>
      <h1 style="text-align: center;"><?php echo $_SESSION['email'];?></h1>
       <button style="text-align: center;"><a href="logout.php">logout</a></button>
</body>
</html>

<?php
}
else{
    header("location:login.php");
    exit();
}
?>