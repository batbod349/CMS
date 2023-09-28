<?php

$user ="root";
$pass = "";

try
{
    $db = new PDO ('mysql:host=localhost;dbname=cmd',$user,$pass);
    // foreach($db->query('SELECT*FROM users') as $row)
    // {
    //     print_r($row);
    // }

}
catch(PDOException $e)
{
    print "erreur :".$e->getMessage() . "<br/>";
    die;
}

?>