<?php
session_start();
$userid=$_SESSION['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
$con = mysqli_connect($servername,$username,$password,$dbname);


if($con->connect_error){
    die("connection failed:".$con->connect_error);
}
$total = 0;
$update = false;
$id=0;
$name = '';
$amount = '';



// Total budget

$result= mysqli_query($con,"SELECT * FROM budget_details WHERE user_id=$userid");
while($row= $result -> fetch_assoc()){
    if(!empty($row['amount'])){
        $total=$total + $row['amount']; 
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-inverse bg-dark navbar-dark">
        <span class="navbar-brand">Budget detail</span>
    </nav>
      <h1 style="text-align: center;"><?php echo $_SESSION['username'];?></h1>
       <button style="text-align: center;margin:0 43%;" class="btn btn-secondary"><a href="logout.php">logout</a></button>
       <button type="button" class="btn btn-primary"><a href="user_update.php" style="color:white;">User update</a></button>
       <div class="container">
        <div class="row">
            <div class="col-xs-9 col-md-7">
                <h2 class="text-center">Add Expense</h2>
                <hr><br>
                <form id="form" >
                    <div class="form-group">
                    <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['id'];?>"><br>
                        <label for="budget">Budget name</label>
                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"/>
                        <input type="text" name="budget" id="budgettitle"  class="form-control" placeholder="Enter the Budget Name" required  value="<?php echo $name; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="Amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter the Amount" required value="<?php echo $amount; ?>"/>
                    </div>
                  
                    <input  type="button" name="update" value="update" id="update"/>
                  
                    <input type="button" id="Save" name="Save"  value="save"/>
                </form>
                <div class="col-xs-9 ">
                <h2 class="text-center">Total Expense : Rs. <?php echo $total; ?></h2>
                <hr>
                <br><br>
                <h2>Expense List</h2>
                <?php
                $result= mysqli_query($con,"SELECT * FROM budget_details WHERE user_id=$userid");
                ?>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Budget details</th>
                                <th>Amount</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                            <?php
                            while($row=$result->fetch_assoc()):
                                // print_r($row);
                            ?>
                            
                            <tr  id="tr_<?php echo $row['budget_id']?>">
                                <td ><?php echo $row['budget_name']; ?></td>
                                <td ><?php echo $row['amount']; ?></td>
                                <td>
                                   <a href="index.php" id="<?php echo $row['budget_id']; ?>" class="btn btn-success  ">edit</a>
                                  <button type="button" name="button" class="delete" id="<?php echo $row['budget_id']?>">delete</button>
                                </td>
                            </tr>
                            <?php endwhile ?>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
      $('#update').hide();
      $("#Save").click(function(e) {
        e.preventDefault();
        $.ajax({
          type: 'POST',
          url: 'save.php',
          data: $("#form").serialize(),
          success: function(data) {
            // alert("Data submitted successfully");
            $("thead").append(data);
            $('#budgettitle').val('');
            $('#amount').val('');
          }
        });
      });
      $(".delete").click(function(e) {
        e.preventDefault();
        var del=$(this).attr('id');
        $.ajax({
          type: 'POST',
          url: 'delete.php',
          data:'delete_id='+ del,
          success: function(data) {
            // alert("delete successfully");
            let obj= JSON.parse(data)
            var del=obj.id
          $("#tr_"+del).remove();
          }
        });
      });
      $(".btn-success").click(function(e) {
          e.preventDefault();
          $('#update').show();
          $('#Save').hide();
          var row= $(this);
          var Id=$(this).attr('id');
          $("#id").val(Id);
          var budget= row.closest("tr").find("td:eq(0)").text();
          $("#budgettitle").val(budget);
          var amount= row.closest("tr").find("td:eq(1)").text();
          $("#amount").val(amount);
      });
      $("#update").click(function(e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'update.php',
            data: $("#form").serialize(),
            success: function(data) {
            let name= JSON.parse(data)
            console.log(name);
              $('#tr_'+name.id).find('td:eq(1)').text(name.amount);
              $('#tr_'+name.id).find('td:eq(0)').text(name.name);
              $('#budgettitle').val('');
              $('#amount').val('');
              $('#update').hide();
              $('#Save').show();
            }
          });
        });
  });
</script>
</body>
</html>

