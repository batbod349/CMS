<!DOCTYPE html>

<html>
<head>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#editor', // Sélectionnez l'ID de votre textarea
            height: 400, // Hauteur de la zone d'édition
            plugins: 'link image code', // Les plugins que vous souhaitez activer
            toolbar: 'undo redo | bold italic | link image | code', // Les boutons de la barre d'outils
        });
    </script>
    <style>
        /* Style pour le formulaire */
        form {
            width: 96%; /* Le formulaire occupe toute la largeur de la page */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f5f5f5;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px; 
        }

        textarea {
            width: 100%; /* Le textarea occupe toute la largeur du formulaire */
            height: 400px; /* Hauteur du textarea (à adapter selon vos besoins) */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"], input[type="file"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button-container {
            text-align: center;
        }

        .button-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container input[type="button"] {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    require '../sql/ConnectionSQL.php';
    require 'PageManager.php';
    $pageManager=new PageManager($db);
    $page_data = $pageManager->getPageById($_GET['p']);
    $title = '';
    $content = '';

    if (!empty($page_data)) {
        $title = isset($page_data['title']) ? htmlspecialchars($page_data['title']) : '';
        $content = isset($page_data['content']) ? htmlspecialchars($page_data['content']) : '';
        $img = isset($page_data['image']) ? htmlspecialchars($page_data['image']) : '';
        // Autres données à initialiser si nécessaire
        
    } else {
        echo "Page non trouvée.";
    }
    ?>

    <form method="post" action="../pages/update_page.php?p=<?php $_GET['p'] ?>" enctype="multipart/form-data">
        <label for="title">Le titre du site:</label>
        <input type="text" id="title" name="title" value="<?php echo $title ?>" required>

        <label for="content">La partie édition du site:</label>
        <textarea id="editor" name="content"><?php echo $content; ?></textarea>

        <label for="photo">Télécharger une nouvelle photo:</label>
        <input type="file" id="new_photo" name="new_photo" accept="image/*">

        <label for="photo_old">ancienne image:</label>
        <img  id="photo_old" name="photo_old" src="<?php echo $img ?>" width="30%" height="30%"/> 

        <div class="button-container">
            <input type="submit" name="save" value="Enregistrer">
            <input type="button" value="Annuler" >
        </div>

        <input type="hidden" name="page_id" value="<?php $_GET['p']?>" >

    </form>
</body>
</html> 