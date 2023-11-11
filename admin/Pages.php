<?php
 include('../sql/ConnectionSQL.php');
 $sql = 'SELECT * FROM page';
$req = $db->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <table>
    <thead>
        <tr>
        <th colspan="2">The table header</th>
        </tr>
    </thead>
    <tbody>
            <? while($row = $req->fetch()) { ?>
     <tr>
            <td><? echo $row['Id']; ?></td>
            <td><? echo $row['Title']; ?></td>
            <td><button name="modif"class="">modification</button></td>
            <td><button name="supre" class="">supression</button></td>
     </tr>
        <? }   ?>
    </tbody>
    </table>
</body>
</html>