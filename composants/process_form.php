<?php
require '../sql/ConnectionSQL.php';
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        /* Style pour l'affichage des données */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Données soumises depuis le formulaire :</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = $_POST["title"];
            $content = $_POST["content"];

            // Vérifier si un fichier a été téléchargé
            if (isset($_FILES["photo"])) {
                $photo_name = $_FILES["photo"]["name"];
                $photo_type = $_FILES["photo"]["type"];
                $photo_size = $_FILES["photo"]["size"];
                $photo_temp = $_FILES["photo"]["tmp_name"];

                // Vous pouvez également effectuer des vérifications sur le type et la taille du fichier ici

                // Déplacez le fichier téléchargé vers un emplacement souhaité (par exemple, un dossier "uploads")
                $upload_dir = "../uploads/";
                $upload_path = $upload_dir . $photo_name;
                move_uploaded_file($photo_temp, $upload_path);
            }

            // // Afficher les données récupérées
            // echo "<p><strong>Titre :</strong> $title</p>";
            // echo "<p><strong>Contenu :</strong> $content</p>";

            // if (isset($upload_path)) {
            //     echo "<p><strong>Photo :</strong> <img src='$upload_path' alt='Téléchargé'></p>";
            // }

            // Insérer les données dans la table "Page"
            $insert_query = "INSERT INTO Page (Title, editeur, image) VALUES (:title, :content, :image)";

            $stmt = $db->prepare($insert_query);

            // Assurez-vous que les noms de paramètres correspondent aux colonnes de la table
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $upload_path);

            if ($stmt->execute()) 
            {
                 echo "Données insérées avec succès dans la base de données.";
            } 
            else 
            {
                 echo "Erreur lors de l'insertion des données dans la base de données.";
            }
        }
        ?>
    </div>
</body>
</html>