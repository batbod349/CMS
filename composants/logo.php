
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
        $target_dir = "images/"; // Répertoire où vous souhaitez enregistrer les images téléchargées
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $upload = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //Vérifications du fichier
        if ($upload == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $imageUrl='images/' . rawurlencode(basename($_FILES["image"]["name"]));
                $logoImageAlt = htmlspecialchars(basename($_FILES["image"]["name"]));
            }
            else {
                echo "console.log('Désolé, une erreur s'est produite lors du téléchargement de votre fichier.');\n";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    
    <form action="logo.php" method="POST" enctype="multipart/form-data" id="image-form">
        <?php
        if(!empty($imageUrl)){ ?>
            <label for="image" id="custom-upload-btn" style="background:transparent">
            <img id="logo" alt="Logo" src="<?php echo $imageUrl; ?>" alt="<?php echo $logoImageAlt; ?>">
        </label><?php
        }
        else{ ?>
            <label for="image" id="custom-upload-btn">
            <img id="logo" alt="Logo">
        </label><?php
        } ?>
       
        <input type="file" name="image" id="image" accept="image/*">
        <input type="submit" value="Charger l'image" style="display:none;"> <!-- Masquez le bouton de soumission -->
    </form>

    <script>
        //Déclenche automatiquement le formulaire
        document.getElementById('image').addEventListener('change', function () {
            document.getElementById('image-form').submit();
        });
    </script>


    <style>
        #image {
            display: none;
        }

        /* Styles personnalisés pour le label */
        #custom-upload-btn {
            display: flex;
            justify-content: center; /* Centre horizontalement */
            align-items: center; /* Centre verticalement */
            width: 120px; /* Ajustez la taille du bouton selon vos besoins pour le rendre rond */
            height: 120px; /* Assurez-vous d'utiliser les mêmes valeurs pour la largeur et la hauteur */
            border-radius: 50%; /* Rend le bouton rond en utilisant la moitié de la largeur comme rayon */
            color: #000000;
            cursor: pointer;
            background-color: #C2C2C2; /* Couleur grise pour le fond du bouton */
            text-align: center;
        }

        /* Style pour le logo à l'intérieur du label */
        #custom-upload-btn img {
            max-width: 100%; /* Ajuste la taille du logo pour s'adapter au conteneur */
            max-height: 100%;
            display: block; /* Élimine tout espacement supplémentaire autour de l'image */
        }
    </style>


</body>

</html>
