<?php
require_once('class/database.php');

//validate input fields
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $login = $_POST['username'];
    $conn = new Database();
    $query = "SELECT pass from users WHERE login='$login'";
    $result = $conn->query($query, MYSQLI_USE_RESULT);
    if($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $password = $row["pass"];
        }
    }

    if(password_verify($_POST['password'], $password)) {
        // If the password inputs matched the hashed password in the database
        // log them in.
        session_start();
        $_SESSION["login"]=$_POST['username'];
        $login=$_POST['username'];
        //message for user
        echo "<p> Thanks for signing up ".$_POST['username']."!.</p>
        <script>
            setTimeout(function(){
            location.reload();
            }, 2000);
        </script>
        <meta http-equiv=\"refresh\" content=\"0;http://domain1.com/mypage.php?login=$login\">
        ";
    } else echo "<span style=\"color:red;\">Error! Wrong password or login!</span>";


} else echo "Error! Fill in all required fields for sign in!";