<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS du footer */
        footer {
            background-image: url("../assets/fond-footer.png");
            background-size: cover;
            color: #fff;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
        }


        .réseaux-sociaux {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .réseaux-sociaux a {
            text-decoration: none;
            border: 1px solid #fff;
            border-radius: 50%;
            padding: 5px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .réseaux-sociaux a:hover {
            background-color: #fff;
            border-color: #4583A2;
        }

        .réseaux-sociaux img {
            width: 30px;
            height: 30px;
        }

        .image-du-milieu {
            flex: 1;
            background-image: url('../assets/CMS-MASTER.png');
            background-size: 500px 300px;
            background-position: 430px center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>

    <!-- Footer -->
    <footer>
        <div>
            <p>&copy; CMS MASTER 2023. Tous droits réservés</p>
            <p>24 Ave. Joannès Masset, 69009 Lyon</p>
        </div>

        <div class="image-du-milieu"></div>

        <div class="réseaux-sociaux">
            <a href="https://www.facebook.com/"><img src="../assets/facebook.png" alt="Facebook"></a>
            <a href="https://twitter.com/"><img src="../assets/twitter.png" alt="Twitter"></a>
            <a href="https://www.instagram.com/"><img src="../assets/instagram.png" alt="Instagram"></a>
        </div>
    </footer>

</body>
</html>

