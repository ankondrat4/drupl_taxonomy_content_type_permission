<?php
require_once('class/database.php');
//validate input fields
if (!empty($_POST['username']) &&!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['date']) && !empty($_POST['topics']) && !empty($_POST['password'])) {
    if(strcmp($_POST['password'],$_POST['password2']) == 0){
        if ($_POST['agree']!=""){
            //work with BD with method class
            $conn = new Database();
            $username = $conn->mysqli()->real_escape_string($_POST['username']);
            $firstname = $conn->mysqli()->real_escape_string($_POST['firstname']);
            $lastname = $conn->mysqli()->real_escape_string(_POST['lastname']);
            $email = $conn->mysqli()->real_escape_string($_POST['email']);
            $date = $conn->mysqli()->real_escape_string($_POST['date']);
            $pass = password_hash($conn->mysqli()->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
            //insert table users
            $query = "INSERT INTO users(first_name,last_name,mail,birth,pass,login) VALUES ('$firstname','$lastname','$email','$date','$pass','$username')";
            $conn->query($query);
            $id = $conn->mysqli()->insert_id;
            //insert table user_topics
            $topics = $_POST['topics'];
            for($i=0; $i < count($topics); $i++)
            {
                $query = "INSERT INTO user_topics(id_user,id_topic) VALUES ('$id','$topics[$i]')";
                $conn->query($query);
            }

            //message for user
            echo "<p> Thanks for signing up ".$_POST['username']."! You can log in now.</p>
            <script>
                setTimeout(function(){
                location.reload();
                }, 2000);
            </script>";
       } else echo "Error! You don't agree for registration!";
    } else echo "Error! Passwords do not match!";
} else echo "Error! Fill in all required fields for registration!";