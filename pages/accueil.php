
<?php require '../includes/header.php'; ?>

<?php require '../sql/ConnectionSQL.php'; ?>


<body>

    <div class="welcome-section">
        <h2>Bienvenue sur ...</h2>
        <p>Choisissez votre modèle de page et modifiez le selon vos envies.</p>
    </div>

    <div class="container-pages">
        <?php $sql = "SELECT * FROM page";
        foreach ($db->query($sql) as $row)
        { ?>
            <div class="page">
                <a href = "page.php?p= <?php echo $row['Id']; ?>">
                    <img src="<?php echo $row['image']; ?>" alt="" width="250px" height="200px">
                    <h6><?php echo $row['Title']; ?></h6>
                </a>
            </div> <?php
        } 
        ?>
    </div>

    <style>

        /* Styles pour le conteneur principal */
        .container-pages {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 20px;
        }

        .page {
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
