<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
$con = mysqli_connect($servername,$username,$password,$dbname);
// print_r($id);
$id=$_POST['delete_id'];

$query= mysqli_query($con,"DELETE  FROM budget_details WHERE budget_id=$id");

$del=  ["id"=>$id];
echo json_encode($del);