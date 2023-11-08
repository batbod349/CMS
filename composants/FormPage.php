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

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="post" action="../pages/process_form.php" enctype="multipart/form-data">
        <label for="title">Le titre du site:</label>
        <input type="text" id="title" name="title" required>

        <label for="content">La partie édition du site:</label>
        <textarea id="editor" name="content"></textarea>

        <label for="photo">Télécharger une photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>
        </br>
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>