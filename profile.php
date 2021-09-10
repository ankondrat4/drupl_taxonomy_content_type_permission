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
    if($result->num_rows == 1) {
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
        <form class="form-signin" id="form_profile" action="" method="post" name="form">
            <label for="name">Edit your profile:</label>
            <br>
            <label for="username">Username: </label>
            <input class="form-styling" type="text" name="username" placeholder="" value="<?php echo $user->GetLogin();?>" disabled/>
            <label for="firstname">First name:</label>
            <input class="form-styling" type="text" name="firstname" placeholder="First Name*" value="<?php echo $user->GetFirstName();?>"/>
            <label for="lastname">Last name:</label>
            <input class="form-styling" type="text" name="lastname" placeholder="Last Name*" value="<?php echo $user->GetLastName();?>"/>
            <label for="email">E-mail:</label>
            <input class="form-styling" type="email" name="email" value="<?php echo $user->GetEmail();?>" disabled placeholder="Email Adress*" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*"pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*"/>
            <label for="birth">Birthday: </label>
            <input class="form-styling" type="date" name="date" style="color: rgba(255,255,255,.5);"  placeholder="Birthday*"value="<?php $newDate = date("Y-m-d", strtotime($user->GetBirth())); echo $newDate?>"/>
            <input class="form-styling" type="password" name="password" placeholder="Enter Password*"/>
            <input type="button" class="btn-signup" id="btn_update" value="Edit profile">
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
