<?php
require_once('config.php');

$query="select * from topics";

$result = mysqli_query($conn, $query);
printf("Запрос SELECT вернул %d строк.\n", mysqli_num_rows($result));
while($row = mysqli_fetch_array($result))
{
    echo $row['name']."<br>\n";
}
