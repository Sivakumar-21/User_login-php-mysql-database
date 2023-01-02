<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
$con = mysqli_connect($servername,$username,$password,$dbname);
if(!$con){
    die('connection failed');
}
if(isset($_POST['submit']))
{
    //print_r($_POST);exit;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $phonenumber = $_POST['phonenumber'];

    $mysql_query = "INSERT INTO user_data (username,email,password,confirmpassword,phonenumber)
    VALUES('$username','$email','$password','$confirmpassword','$phonenumber')";
    $result = mysqli_query($con, $mysql_query);
    if($result)
    {
        echo "<script> alert('Registration Successful')</script>";
        // header("location:login.php");
    }
    else{
       echo
       "<script> alert('password does not match')</script>";
}
}
?>