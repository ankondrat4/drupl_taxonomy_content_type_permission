<?php
require_once('class/database.php');
require_once('class/user.php');
session_start();
if(isset($_SESSION["login"])) {
    $user = new User();
    $login = $_SESSION["login"];
    $user->SetLogin($login);
    $conn = new Database();
    $query = "SELECT * from users WHERE login='$login'";
    $result = $conn->query($query, MYSQLI_USE_RESULT);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            //$user = new User($login,$row["first_name"],$row["last_name"],$row["birth"],$row["mail"],$row["password"],$row["id"]);
            $user->SetFirstName($row["first_name"]);
            $user->SetLastName($row["last_name"]);
            $user->SetEmail($row["mail"]);
            $user->SetBirth($row["birth"]);
        }
    }
} else header("Location: /");
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>My page</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<div class="container">
  <div class="frame">
    <div ng-app ng-init="checked = false">
        <form class="form-signin" id="form_signin" action="" method="post" name="form">
            <label for="name">Your profile:</label>
            <br>
            <label for="username">Username: <span id="login" style="color:coral;"><?php echo $user->GetLogin();?></span> </label>
            <label for="firstname">First name: <span style="color:coral;"><?php echo $user->GetFirstName();?></span> </label>
            <label for="lastname">Last name: <span style="color:coral;"><?php echo $user->GetLastName();?></span> </label>
            <label for="email">E-mail: <span style="color:coral;"><?php echo $user->GetEmail();?></span> </label>
            <label for="birth">Birthday: <span style="color:coral;"><?php echo $user->GetBirth();?></span> </label>
            <?php echo "<input type=\"button\" class=\"btn-signup\" id=\"btn4\" onclick=\"document.location.href = 'http://domain1.com/profile.php'\" value=\"Edit profile\">";?>
            <?php echo "<input type=\"button\" class=\"btn-signup\" id=\"btn5\" onclick=\"document.location.href = 'http://domain1.com/logout.php'\" value=\"Log out\">";?>
        </form>

        <div  class="success">
          <div class="successtext" id="successtext">
          </div>
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