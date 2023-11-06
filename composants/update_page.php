<?php
require '../sql/ConnectionSQL.php';
require 'PageManager.php';

// Créez une instance de PageManager en lui passant la connexion PDO
$pageManager = new PageManager($db);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $page_id = isset($_POST['page_id']) ? $_POST['page_id'] : null;
    echo('ok');
    if ($page_id) {
        $page_data = $pageManager->getPageById($page_id);
        echo('ok2');
        if ($page_data) {
            $title = $page_data['title'];
            $content = $page_data['content'];
            $image = $page_data['image'];
            echo('ok3');
            if (isset($_POST['save'])) {
                // Le bouton "Enregistrer" a été soumis
                $new_photo = $_FILES['new_photo'];

                // Récupérez le nom du fichier de l'image actuelle depuis la base de données
                $current_image = $page_data['image']; // Remplacez ceci par la façon dont vous récupérez l'image depuis la base de données

                // Récupérez le nom du fichier de la nouvelle image téléchargée depuis le formulaire
                $new_photo_name = $new_photo['name'];

                // Comparez les noms de fichiers pour déterminer s'ils sont identiques
                if ($current_image === $new_photo_name) {
                    // Les noms de fichiers sont identiques, l'image n'a pas été modifiée
                    // Vous n'avez pas besoin de mettre à jour l'image
                } else {
                    // Les noms de fichiers sont différents, une nouvelle image a été téléchargée
                    // Mettez à jour l'image dans la base de données et dans le répertoire de téléchargement
                    // Assurez-vous de gérer correctement le téléchargement et le stockage de la nouvelle image

                    $new_photo_name = uniqid() . "_" . $new_photo_name; // Nommez la nouvelle image
                    $new_photo_path = 'uploads/' . $new_photo_name; // Chemin où stocker la nouvelle image

                }
                $update=$pageManager->updatePage($page_id, $title, $content, $page_data['image']);
                echo($update);
                if ($update) {
                    echo "Mise à jour réussie.";
                } else {
                    echo "Erreur lors de la mise à jour.";
                }
            }    
            if (isset($_POST['cancel'])) {
                // Le bouton "Annuler" a été soumis
                // Redirigez l'utilisateur ou effectuez d'autres actions en fonction de votre besoin
                header('Location: page.php?id=' . $page_id);
                exit();
            }
        }
        } else {
            echo "Page non trouvée.";
        }
    } else {
        echo "ID de page manquant.";
    }



?>