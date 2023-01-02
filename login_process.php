<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
$con = mysqli_connect($servername,$username,$password,$dbname);
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        header("location:login.php?error=Email is Required");
        exit();
    }elseif(empty($password)){
        header("location:login.php?error=password is Required");
        exit();
    }else{
        $sql = "SELECT * FROM user_data WHERE email='$email' AND password='$password'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            if($row['email']===$email && $row['password']===$password){
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                header("location:homepage.php");
                exit();
            }
        }
        else{
            header("location:login.php?error=please fill the correct email & password");
            exit();
        }
    }

}
?>