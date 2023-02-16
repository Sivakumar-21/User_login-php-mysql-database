<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
<form id="form">
  <!-- Email input -->
  <h4 style="text-align: center;" class="h3 mb-3 font-weight-normal"><b>User update</b></h4>
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example1">Old password</label>
    <input type="password" id="oldpassword" name="oldpassword" class="form-control" required/>
    
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">New Password</label>
    <input type="password" id="newpassword" name="newpassword" class="form-control" required/>
  </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2">conform Password</label>
    <input type="password" id="conformpassword" name="conformpassword" class="form-control" required/>
  </div>
  <hr>

  <!-- 2 column grid layout for inline styling -->
  
  <!-- Submit button -->
  <div class="form-outline mb-4">
  <button type="button" class="btn btn-primary " id="update" name="update">Update</button><br><br>
  <button type="button" class="btn btn-primary " id="home" ><a href="home.php" style="color:white;" >Home</a></button>
</div>
<div id="content"></div>
</form>
</body>
<style>
    form{
        width: 50%;
        margin: 0 auto;
        padding-top: 10em;

    }
</style>
<script>
    
     $(document).ready(function(){
        $("#update").click(function(e){
           e.preventDefault();
           $.ajax({
            url:'password_update.php',
            type:'post',
            data:$('#form').serialize(),
            success:function(data){
                alert("data insert successfully");
                $('#oldpassword').val('');
                $('#newpassword').val('');
                $('#conformpassword').val('');

            }

           });
        })
       
     });
</script>
</html>