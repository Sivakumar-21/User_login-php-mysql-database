
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="https://kit.fontawesome.com/8413be6fa2.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h2>Registration</h2>
        </div>
        <form class="form" id="form" method="post" action="connect.php" >
            <div class="form-control">
                <label for="#">Username</label>
                <input type="text" placeholder="siva1234" id="username" name="username">
                <i class="fa-solid fa-check"></i>
                <i class="fa-solid fa-exclamation"></i>
                <small></small>
            </div>
            <div class="form-control">
                <label for="#">Email id</label>
                <input type="email" placeholder="sivakumar85260@gmail.com" id="email" name="email">
                <i class="fa-solid fa-check"></i>
                <i class="fa-solid fa-exclamation"></i>
                <small></small>
            </div>
            <div class="form-control">
                <label for="#">Password</label>
                <input type="password" placeholder="password" id="password" name="password">
                <i class="fa-solid fa-check"></i>
                <i class="fa-solid fa-exclamation"></i>
                <small></small>
            </div>
            <div class="form-control">
                <label for="#">Confirm Password</label>
                <input type="password" placeholder="confirmpassword" id="confirmpassword" name="confirmpassword">
                <i class="fa-solid fa-check"></i>
                <i class="fa-solid fa-exclamation"></i>
                <small></small>
            </div>
            <div class="form-control">
                <label for="#">Mobile number</label>
                <input type="tel" id="phone" name="phonenumber" placeholder="8220176526" title="Please enter valid phone number">
                <i class="fa-solid fa-check"></i>
                <i class="fa-solid fa-exclamation"></i>
                <small></small>
            </div>
            <button type="submit" name="submit">Register</button>
            <a href="login.php" class="form-control">login</a>
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
    /* height: 100vh; */
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
.form-control.error input{
    border-color: red;
}

 i{
    visibility: hidden;
}
.form-control.success i.fa-check{
    visibility: visible;
    color: green;
    padding-bottom: 10px;
}
.form-control.error i.fa-exclamation{
    visibility: visible;
    color: red;
    padding-bottom: 10px;
}
 small{
    color: red;
    position: absolute;
    bottom: 0;
    right: 25px;
    top: 70px;
}
.form-control{
    position: relative;
}

form{
    display: flex;
    flex-direction: column;
    gap: 20px;
}
 button{
    padding: 10px;
    border-radius: 20px;
    border: none;
    background: #3f51b3;
    color: white;
}
button:hover{
    background: radial-gradient(#3951c7, transparent);
}
textarea{
    display: block;
    text-align: center;
}
.form-control.success textarea{
    border-color: green;
}
.form-control.error textarea{
    border-color: red;
}
.form-control textarea:focus{
    outline: none;
    border-color: rgb(167, 107, 202);
}   
</style> 

<script src="script.js">
const form = document.getElementById("form");
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const password2 = document.getElementById("confirmpassword");
const phone = document.getElementById("phone");
const textarea = document.getElementById("textarea");

form.addEventListener('submit',e => {
      e.preventDefault();
      checkInput();
});

function checkInput() {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const phonevalue = phone.value.trim();
    const textareavalue = textarea.value.trim();

    if(usernameValue === ''){
        setError(username, "Username cannot be blank");
    }
    else{
        setSuccess(username, "success");
    }

    if(emailValue === ''){
        setError(email, "Email cannot be blank");
    }
    else if(!isEmail(emailValue)){
        setError(email, 'Invalid email ID. please enter correct email ID');
    }
    else
    {
        setSuccess(email);
    }


    if(passwordValue === ''){
        setError(password, "Password cannot be blank");
    }
    else{
        setSuccess(password);
    }

    if(password2Value === ''){
        setError(password2, "Password cannot be blank");
    }
    else if(passwordValue !== password2Value)
    {
        setError(password2, " Password Does not match")
    }
    else{
        setSuccess(password2);
    }
    if(phonevalue === ''){
        setError(phone, "Fill the phone number");
    }
    else
    {
        setSuccess(phone);
    }
    if(textareavalue === ''){
        setError(textarea, "Message cannot be blank");
    }
    else
    {
        setSuccess(textarea);
    }
}


    function setError(input, message){
       const formcontrol = input.parentElement;
       const small = formcontrol.querySelector('small');
       formcontrol.className = 'form-control error';
       small.innerText = message;
    }

    function setSuccess(input){
       const formcontrol = input.parentElement;
       formcontrol.className = 'form-control success';
    }
    

function isEmail(email){
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
}
 </script>
</body>
</html>