<?php

$user ="root";
$pass = "";

try
{
    $db = new PDO ('mysql:host=localhost;dbname=cmd',$user,$pass);
    $query = 'SELECT * FROM users';
    foreach ($db->query($query) as $row)
    {
        print_r($row);
    }

}
catch(PDOException $e)
{
    print "erreur :".$e->getMessage() . "<br/>";
    die;
}

?>