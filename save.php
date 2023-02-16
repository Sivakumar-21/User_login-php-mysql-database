<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
$con = mysqli_connect($servername,$username,$password,$dbname);

if(is_numeric($_POST['amount'])&& is_string($_POST['budget'])){
$userid= $_POST['userid'];
$budget = $_POST['budget'];
$amount = $_POST['amount'];

$query= mysqli_query($con, "INSERT INTO budget_details (user_id,budget_name, amount) VALUE ('$userid','$budget','$amount')");
// $res=  ["name"=>$budget,"amount"=>$amount];
//   echo json_encode($res);

$select= mysqli_query($con, "SELECT * FROM budget_details WHERE user_id=$userid");
 

  echo "
  <tr>
  <td >$budget</td>
  <td >$amount</td>
  <td>
  <button class='btn btn-success'>edit</button>
  <button type='button' name='button' class='delete'>delete</button>
  </td>
</tr>
";
}