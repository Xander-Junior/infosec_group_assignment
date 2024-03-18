<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="bg-img">
    <div class="content">
        <header>Login Form</header>
        <form action="../backend/api/login.php" method="POST">
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" name="email_or_phone" required placeholder="Email or Phone">
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input type="password" name="password" class="pass-key" required placeholder="Password">
                <span class="show">SHOW</span>
            </div>
            <div class="pass">
                <a href="signup.php">Sign Up</a>
            </div>
            <div class="field">
                <input type="submit" value="LOGIN">
            </div>
        </form>
    </div>
</div>
<script>
         const pass_field = document.querySelector('.pass-key');
         const showBtn = document.querySelector('.show');
         showBtn.addEventListener('click', function(){
          if(pass_field.type === "password"){
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
          }else{
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
          }
         });
</script>
</body>
</html>

