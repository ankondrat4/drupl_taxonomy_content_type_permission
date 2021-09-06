<?php
$config = array(
    'DB_HOST' => 'localhost',
    'DB_USERNAME' => 'admin',
    'DB_PASSWORD' => 'Flvbybcnhfnjh123$',
    'DB_DATABASE' => 'site'
);

try
{
    $host=$config['DB_HOST'];
    $dbname=$config['DB_DATABASE'];
    $conn = new mysqli($config['DB_HOST'],$config['DB_USERNAME'],$config['DB_PASSWORD'],$config['DB_DATABASE']);

    //$conn= new PDO("mysql:host=$host;dbname=$dbname",$config['DB_USERNAME'],$config['DB_PASSWORD']);

    echo "<p>Connect OK!</p>>";
}
catch(Exception $e)
{
    echo "Error:".$e->getMessage();
}



