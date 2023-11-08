
<?php require '../includes/header.php'; ?>

<body>

    <!--<div class="welcome-section">
        <h2>Bienvenue sur ...</h2>
        <p>Choisissez votre modèle de page et modifiez le selon vos envies.</p>
    </div>-->

    <div class="container-pages">
        <div class="page1">
            <img src="e1.jpg" alt="" width="250px" height="200px">
            <h6>page 1</h6>
        </div>
        <div class="page2">
            <img src="/Applications/MAMP/htdocs/cms/banque d'image/Unknown.jpg" width="250px" height="200px">
            <h6>page 2</h6>
        </div>
        <div class="page3">
            <img src="e3.jpg" alt="" width="250px" height="250px">
            <h6>page 3</h6>
        </div>
    </div>

    <div class="container">
        <div class="buttCréer">
            <button onclick="window.location.href='createPage.php'"><span>Créer une page</span></button>
        </div>
    </div>

    <style>

        /* Styles pour le conteneur principal */
        .container-pages {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 20px;
        }

        .container-pages .page1,
        .container-pages .page2,
        .container-pages .page3 {
            text-align: center;
            padding: 10px;
        }

        .container-pages img {
            width: 250px;
            height: 200px;
            border: 1px solid #ccc;
        }

        .container-pages h6 {
            font-size: 16px;
            margin-top: 10px;
            color: #333;
        }

        .buttCréer button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-bottom: 20px;
        }

        .buttCréer button:hover {
            background-color: #0056b3;
        }

    </style>

</body>

<?php require '../includes/footer.php'; ?>

</html>
