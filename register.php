    <div class="successtext">
        <p> Thanks for signing up! Check your email for confirmation.</p>
    </div>

</div>

<?php
require_once('config.php');

/*
if (isset($_POST['form-signup']))
{

$firstname=$_POST['firstname'];
*/
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$date=$_POST['date'];
$query="insert into users(first_name,last_name,mail,birth) values('$firstname','$lastname','$email','$date')";

$result = mysqli_query($conn, $query);
    /*printf("Запрос SELECT вернул %d строк.\n", mysqli_num_rows($result));


    while($row = mysqli_fetch_array($result))
    {
        echo $row['name']."<br>\n";
    }
    */



//}

