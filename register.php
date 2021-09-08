<?php
require_once('config.php');


//if (($_POST["firstname"]!="") && ($_POST["lastname"]!="") ) {
/*
    // Формируем массив для JSON ответа
    $result = array(
        'firstname' => $_POST["firstname"],
        'lastname' => $_POST["lastname"]
    );


    // Переводим массив в JSON
    echo json_encode($result);
*/
//   echo "ntntnttntnnt";
//}





    if (($_POST['firstname']!="") && ($_POST['lastname']!="") && ($_POST['email']!="") && ($_POST['date']!="") && ($_POST['topics']!="") && ($_POST['password']!="") ) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $query = "insert into users(first_name,last_name,mail,birth) values('$firstname','$lastname','$email','$date')";

        $result = mysqli_query($conn, $query);
        /*printf("Запрос SELECT вернул %d строк.\n", mysqli_num_rows($result));


        while($row = mysqli_fetch_array($result))
        {
            echo $row['name']."<br>\n";
        }
        */
    }
    else echo "Заполните все обязательные поля для регистрации!";




