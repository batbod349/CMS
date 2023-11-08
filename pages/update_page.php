<?php
require '../sql/ConnectionSQL.php';
require '../composants/PageManager.php';

$pageManager = new PageManager($db);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $page_id = isset($_POST['page_id']) ? $_POST['page_id'] : null;

    if ($page_id) {
        $page_data = $pageManager->getPageById($page_id);

        if ($page_data) {
            $title = $_POST['title']; // Utilisez la valeur du champ de formulaire 'title'
            $content = $_POST['content']; // Utilisez la valeur du champ de formulaire 'content'
            $new_photo = $_FILES['new_photo'];
            $new_photo_name = ''; // Initialize $new_photo_name

            $new_photo = $_FILES['new_photo'];
            $new_photo_name = ''; // Initialize $new_photo_name

            if ($new_photo['error'] === UPLOAD_ERR_OK) {
                // Récupérez le nom du fichier de la nouvelle image téléchargée depuis le formulaire
                $new_photo_name = $new_photo['name'];
                $new_photo_path = '../uploads/' . $new_photo_name; // Chemin où stocker la nouvelle image

                // Déplacez le fichier téléchargé vers le chemin de stockage
                move_uploaded_file($new_photo['tmp_name'], $new_photo_path);
            }

            $updateRequired = false; // Variable pour suivre si une mise à jour est nécessaire

            // Comparez le nouveau titre avec l'ancien
            if ($title !== $page_data['title']) {
                $updateRequired = true;
            }

            // Comparez le nouveau contenu avec l'ancien
            if ($content !== $page_data['content']) {
                $updateRequired = true;
            }

            // Comparez le nouveau nom de l'image avec l'ancien
            if ($new_photo_path !== $page_data['image']) {
                $updateRequired = true;
            }

            if ($updateRequired) {
                // Au moins une valeur a été modifiée, mettez à jour la base de données avec les nouvelles valeurs


                $update = $pageManager->updatePage($page_id, $title, $content, $new_photo_path);

                if ($update) {
                    echo "Mise à jour réussie.";
                } else {
                    echo "Erreur lors de la mise à jour.";
                }
            } else {
                // Aucune modification détectée, aucun besoin de mettre à jour la base de données
                echo "Aucune modification détectée.";
            }
        } else {
            echo "Page non trouvée.";
        }
    } else {
        echo "ID de page manquant.";
    }
}
?>
