<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
$con = mysqli_connect($servername,$username,$password,$dbname);
  $id= $_POST['id'];
  $name = $_POST['budget'];
  $amount = $_POST['amount'];
  $result= mysqli_query($con, "UPDATE budget_details SET budget_name='$name', amount='$amount' WHERE budget_id=$id");
  
  $res=  ["id"=>$id,"name"=>$name,"amount"=>$amount];
  echo json_encode($res);