<?php
session_start();
$userid=$_SESSION['id'];
$password=$_SESSION['password'];

// echo $userid;
// echo $password;
// print_r($_POST['oldpassword']);
// print_r($_POST['newpassword']);
// print_r($_POST['conformpassword']);
//  print_r($userid);

// var_dump($password == $_POST['oldpassword']);

if($password == $_POST['oldpassword'] && $_POST['newpassword'] ==$_POST['conformpassword']){
$newpassword=$_POST['newpassword'];
$newconformpassword=$_POST['conformpassword'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
$con = mysqli_connect($servername,$username,$password,$dbname);

$query= mysqli_query($con, "UPDATE user_data SET password='$newpassword',confirmpassword='$newconformpassword 'WHERE Id='$userid'");

}
elseif($_POST['newpassword']!==$_POST['conformpassword']){
    echo " newpassword and conformpassword does not match";

}else{
    echo "old password wrong";
}