<?php
if (isset($_COOKIE['connected'])) {
    header('Location: accueil.php');
}

// Assurez-vous que le fichier de connexion à la base de données est inclus ici
include('C:\laragon\www\CMS\sql\ConnectionSQL.php');
require '../includes/header.php';

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
            // Définir un cookie pour indiquer que l'utilisateur est connecté
            setcookie("connected", true, time()+(60*60*24*30) ); // Le cookie expire dans 1 minute
            header('Location: accueil.php');
            exit();
        }
        else {
            $error_message = "Mot de passe incorrect.";
        }
    }
    else {
        $error_message = "Adresse e-mail non trouvée.";
    }
}

?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const connexionForm = document.getElementById('connexionForm');

    connexionForm.addEventListener('submit', function(event) {  });
    });
    </script>
<div class="bodyCo">
    <div class="containerCo">
        <h2>Connexion</h2>

        <form id="connexionForm" method="POST" action="connexion.php">
            <label for="email">Adresse mail :</label>

            <div class="itemCo input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">@</span>
            <input type="text" id="email" name="email" class="form-control" placeholder="Adresse mail" aria-label="Adresse mail" aria-describedby="addon-wrapping" required><br>
            </div>

            <label for="password">Mot de passe :</label>

            <div class="itemCo input-group flex-nowrap">
            <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe" aria-label="Mot de passe" aria-describedby="addon-wrapping" required><br>
            </div>

            <input type="submit" class="itemCo btn btn-secondary btn-lg" value="Connexion">
        </form>
    </div>
</div>

<?php require '../includes/footer.php'; ?>