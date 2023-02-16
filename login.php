<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
</head>
<body>
    <div class="container">   
         <div class="heading">
            <h2>login</h2>
        </div> 

       <form action="login_proces.php" method="post"> 
        <?php
        
       if(isset($_GET['error'])){
        echo $_GET['error'];
       }
       ?>
      
        <div class="form-control">
                <label for="#">Email id</label>
                <input type="email" placeholder="sivakumar85260@gmail.com" id="email" name="email" autocomplete="off">
                <i class="fa-solid fa-check"></i>
                <i class="fa-solid fa-exclamation"></i>
                <small></small>
            </div>
            <div class="form-control">
                <label for="#">Password</label>
                <input type="password" placeholder="password" id="password" name="password" >
                <i class="fa-solid fa-check"></i>
                <i class="fa-solid fa-exclamation"></i>
                <small></small>
            </div>
       

            <button type="login" name="login" id="login">login</button>

            <div style="text-align: center;">You not register<a href="registr.php">Register</a></div>
    
       </form>
        </div> 

    <style>
 *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.container{
    display: flex;
    align-items: center;
    justify-items: center;
    flex-direction: column;
    /* width: 100vh; */
    height: 100vh;
    padding: 100px 0;
    background-color: lightblue;
    
}

 .form-control input{
    padding: 10px;
    display: block;
    text-align: center;
    
}
.form-control input:focus{
    outline: none;
    border-color: rgb(167, 107, 202);
}
.form-control.success input{
    border-color: green;
}
button{
    padding: 10px 40px;
    border-radius: 20px;
    border: none;
    background: #3f51b3;
    color: white;
    margin: 20px;
}
</style>        
</body>
</html>