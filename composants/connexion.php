<?php
// Assurez-vous que le fichier de connexion à la base de données est inclus ici
include('C:\laragon\www\CMS\sql\ConnectionSQL.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérez les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Recherchez l'utilisateur dans la base de données par son adresse e-mail
    $query = $db->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // L'utilisateur a été trouvé, vérifiez le mot de passe
        if (password_verify($password, $user['password'])) {
            // Le mot de passe est correct, l'utilisateur est connecté
             $_COOKIE['user_id'] = $user['id'];
            header('C:\laragon\www\CMS\pages\page.php');
            exit();
        } else {
            $error_message = "Mot de passe incorrect.";
        }
    } else {
        $error_message = "Adresse e-mail non trouvée.";
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
            height: 350px;
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
    const connexionForm = document.getElementById('connexionForm');

    connexionForm.addEventListener('submit', function(event) {
      //IF erreur
        // Empêcher l'envoi du formulaire par défaut
      //event.preventDefault();

      // Modifier le contenu du paragraph
    });
    });
    </script>

</head>
<body>
    <div class="container">
        <h2>Connexion</h2>

        <form id="connexionForm" method="POST" action="page.php">
            <label for="email">Adresse mail :</label>

            <div class="item input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">@</span>
            <input type="text" id="email" name="email" class="form-control" placeholder="Adresse mail" aria-label="Adresse mail" aria-describedby="addon-wrapping" required><br>
            </div>

            <label for="password">Mot de passe :</label>

            <div class="item input-group flex-nowrap">
            <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe" aria-label="Mot de passe" aria-describedby="addon-wrapping" required><br>
            </div>

            <input type="submit" class="item btn btn-secondary btn-lg" value="Connexion">
        </form>
    </div>
</body>
</html>