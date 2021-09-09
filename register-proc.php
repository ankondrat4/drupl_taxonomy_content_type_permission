<?php
require_once('config.php');


//validate input fields
    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['date']) && !empty($_POST['topics']) && !empty($_POST['password'])) {
        if(strcmp($_POST['password'],$_POST['password2']) == 0){
            if ($_POST['agree']!=""){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $date = $_POST['date'];
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

                //insert to BD
                $query = "insert into users(first_name,last_name,mail,birth,pass) values('$firstname','$lastname','$email','$date','$pass')";

                $result = mysqli_query($conn, $query);

                echo "<p> Thanks for signing up! You can log in now.</p>                       
                <script>
                    setTimeout(function(){
                    location.reload();
                    }, 2000);
                </script>";

                /*printf("Запрос SELECT вернул %d строк.\n", mysqli_num_rows($result));


                while($row = mysqli_fetch_array($result))
                {
                    echo $row['name']."<br>\n";
                }
                */

            } else echo "Error! You don't agree for registration!";
        } else echo "Error! Passwords do not match!";
    } else echo "Error! Fill in all required fields for registration!";



