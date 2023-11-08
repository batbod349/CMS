<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nom du site</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

        <header>
            <nav class="navbar">
                <div class="logo">
                    <a>Logo</a>
                </div>
                <div class="container">
                    <a class="navbar-brand" href="#">CMS MASTER</a>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/CMS/pages/accueil.php" >Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Catégories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Articles</a>
                        </li>
                    </ul>
                    <nav class="Wrapper">
                        <ul class="menuroulant">
                            <li>
                                <a href="">
                                    <img src="../assets/utilisateur.png" alt="Connexion" width="35" height="35">
                                </a>
                                <ul class="sousmenu">
                                <?php
                                if (isset($_COOKIE['connected'])) {?>
                                    <li>
                                        <a href="http://localhost/CMS/admin/index.php">Administration</a>
                                    </li>
                                    <li>
                                        <a href="http://localhost/CMS/pages/logout.php">Déconnexion</a>
                                    </li>
                                <?php } else {?>
                                    <li>
                                        <a href="http://localhost/CMS/pages/connexion.php">Connexion</a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </header>