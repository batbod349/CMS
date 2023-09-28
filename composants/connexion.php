<?php
// Inclure la configuration de la base de données ici
// Vous devez configurer la connexion à votre base de données dans config.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérifier l'authentification (vous devez implémenter la logique d'authentification)
    // Par exemple, vous pouvez comparer les informations avec celles de votre base de données
    if (verifyAuthentication($username, $password)) {
        // L'authentification est réussie, rediriger l'utilisateur vers une page sécurisée
        header("Location: /admin");
        exit();
    } else {
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
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
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <?php if (isset($error_message)) { ?>
            <p><?php echo $error_message; ?></p>
        <?php } ?>
        <form method="POST" action="login.php">
            <label for="username">Adresse mail :</label>

            <div class="item input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">@</span>
            <input type="text" id="username" name="username" class="form-control" placeholder="Adresse mail" aria-label="Adresse mail" aria-describedby="addon-wrapping" required><br>
            </div>

            <label for="password">Mot de passe :</label>

            <div class="item input-group flex-nowrap">
            <input class="form-control" type="password" id="mdp" name="password" placeholder="Mot de passe" aria-label="Mot de passe" aria-describedby="addon-wrapping" required><br>
            </div>

            <input type="submit" class="item btn btn-secondary btn-lg" value="Se connecter">
        </form>
    </div>
</body>
</html>

<?php
// Fonction pour vérifier l'authentification (exemple simplifié, adaptez-la à vos besoins)
function verifyAuthentication($username, $password) {
    // Inclure le fichier de configuration de la base de données
    include("includes/config.php");

    // Vous devez écrire la logique d'authentification ici
    // Par exemple, exécutez une requête SQL pour vérifier si l'utilisateur existe dans la base de données et si le mot de passe est correct

    // Si l'authentification réussit, retournez true
    // Sinon, retournez false

    // Exemple basique de vérification d'authentification
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        return true;
    } else {
        return false;
    }
}
?>