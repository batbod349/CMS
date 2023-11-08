<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/style.scss">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

</head>
<body>
    <header>
        <script>
            feather.replace()
        </script>

         <div class="header">  
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="#">Mon Site</a>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Catégories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Articles</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <?php require '../composants/ajoutComp.php'; ?>

</body>
</html>
