<?php
require_once('class/database.php');
require_once('class/user.php');

session_start();
if(isset($_SESSION["login"])) {
    //validate input fields
    if (!empty($_POST['password'])) {
        $login = $_SESSION["login"];
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
                $user = new User();
                $user->SetFistName($_POST['first_name']);
                $user->SetLastName($_POST['last_name']);
                $user->SetBirth($_POST['date']);
                $conn = new Database();
                $query = "UPDATE users SET first_name='$user->GetFirstName()', last_name='$user->GetLastName()', birth='$user->GetBirth()' WHERE login='$login'";
                $result = $conn->query($query);
                //message for user
                echo "<p> Your update profile!</p>
                <script>
                    setTimeout(function(){
                    location.reload();
                    }, 1000);
                </script>
                <meta http-equiv=\"refresh\" content=\"0;http://domain1.com/profile.php\">
                ";
        } else echo "<span style=\"color:red;\">Error! Wrong password!</span>";
    } else echo "<span style=\"color:red;\">Error! Enter your password for confirm update!</span>";
} else header("Location: /");