<?php
    session_start();
	if(isset($_SESSION["login"])){
	header("Location: mypage.php");
	}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Log in/Sign up site</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<div class="container">
  <div class="frame">
    <div class="nav">
      <ul class="links">
        <li class="signin-active"><a class="btn">Log in</a></li>
        <li class="signup-inactive"><a class="btn">Sign up </a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">
        <form class="form-signin" id="form_signin" action="" method="post" name="form">
          <label for="username">Username</label>
          <input class="form-styling" type="text" name="username" placeholder=""/>
          <label for="password">Password</label>
          <input class="form-styling" type="password" name="password" placeholder=""/>
          <input type="submit" class="btn-signup" id="btn3" value="Log In">
        </form>
        
        <form class="form-signup" id="form_signup" action="register.php" method="post" name="form">
            <input class="form-styling" type="text" name="username" placeholder="Username (login)*"/>
            <input class="form-styling" type="text" name="firstname" placeholder="First Name*"/>
            <input class="form-styling" type="text" name="lastname" placeholder="Last Name*"/>
            <input class="form-styling" type="email" name="email" placeholder="Email Adress*" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*"pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*"/>
            <input class="form-styling" type="date" name="date" style="color: rgba(255,255,255,.5);"  placeholder="Birthday*"/>
            <label for="username">Choose some interesting topics</label>
            <select class="form-styling-select" name="topics[]" style="color: rgba(255,255,255,.5);" required="required" multiple>
                <option value="1">Books</option>
                <option value="2">Cars</option>
                <option value="3">Cats</option>
                <option value="4">Movies</option>
                <option value="5">Ships</option>
                <option value="6">Technologies</option>
            </select>
            <input class="form-styling" type="password" name="password" id="txtNewPassword" placeholder="Set A Password"/>
            <input class="form-styling" type="password" name="password2" id="txtConfirmPassword" onCahge = "checkPasswordMatch ();" placeholder="Repeat A Password"/>
            <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
            <input type="checkbox" name="agree" id="checkbox2"/>
            <label for="checkbox2" ><span class="ui"></span>I confirm my registration</label>
            <br>
            <input type="submit" class="btn-signup" id="btn2" value="Sign Up">
        </form>


        <div  class="success">
            <div class="successtext" id="successtext">
            </div>
        </div>
  </div>
</div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>
