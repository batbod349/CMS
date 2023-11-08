<?php
// Assurez-vous que le fichier de connexion à la base de données est inclus ici
include('C:\laragon\www\CMS\sql\ConnectionSQL.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérez les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    // Vérifiez si les mots de passe correspondent
    if ($password !== $passwordConfirm) {
        $error_message = "Les mots de passe ne correspondent pas.";
    } else {
        // Hachez le mot de passe avant de le stocker en toute sécurité dans la base de données
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insérez l'utilisateur dans la base de données
        $query = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $hashed_password);

        if ($query->execute()) {
            // L'inscription a réussi, redirigez l'utilisateur vers une page de confirmation ou de connexion
            header('C:\laragon\www\CMS\pages\accueil.php');
            exit();
        } else {
            $error_message = "Une erreur s'est produite lors de l'inscription.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 350px;
            height: 430px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            text-align: center;
            padding: 10px;
            display: flex; /* Utilisation de flexbox pour centrer verticalement */
            flex-direction: column; /* Les éléments seront alignés verticalement */
            justify-content: center; /* Centrer verticalement les éléments */
            align-items: center; /* Centrer horizontalement les éléments */
            border-radius: 20px; /* Ajout de bords arrondis */
        }
        .item {
            margin: 5px; /* Espacement de 5px entre les éléments */
            text-align: center;
            padding: 10px;
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const inscriptionForm = document.getElementById('inscriptionForm');

        inscriptionForm.addEventListener('submit', function(event) {
        // Empêcher l'envoi du formulaire par défaut
        event.preventDefault();

        // Masquer la fenêtre d'accueil
        document.getElementById('accueil').style.display = 'none';

        // Soumettre le formulaire réel (si nécessaire)
        inscriptionForm.submit();
        });
    });
    </script>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <?php if (isset($error_message)) { ?>
            <p><?php echo $error_message; ?></p>
        <?php } ?>
        <form id="inscriptionForm" method="POST" action="accueil.php">
            <label for="email">Adresse mail :</label>

            <div class="item input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">@</span>
            <input type="text" id="email" name="email" class="form-control" placeholder="Adresse mail" aria-label="Adresse mail" aria-describedby="addon-wrapping" required><br>
            </div>

            <label for="password">Mot de passe :</label>

            <div class="item input-group flex-nowrap">
            <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe" aria-label="Mot de passe" aria-describedby="addon-wrapping" required><br>
            </div>

            <label for="passwordConfirm">Confirmer le mot de passe :</label>

            <div class="item input-group flex-nowrap">
            <input class="form-control" type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirmer le mot de passe" aria-label="Confirmer le mot de passe" aria-describedby="addon-wrapping" required><br>
            </div>

            <input type="submit" class="item btn btn-secondary btn-lg" value="Inscription">
        </form>
    </div>
</body>
</html>