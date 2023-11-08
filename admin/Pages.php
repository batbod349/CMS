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
            <?php while($row=$req->fetch()) { ?>
     <tr>
            <td><?php echo $row['Id']; ?></td>
            <td><?php echo $row['Title']; ?></td>
            <td><a href="../pages/Editpage.php?p=<?php echo $row['Id'];?>"><button name="modif"class="">modification</button></a></td>
            <td><a href="../composants/delectpage.php?p=<?php echo $row['Id'];?>"><button name="supre" class="">supression</button></a></td>
     </tr>
        <?php }   ?>
    </tbody>
    </table>
</body>
</html>