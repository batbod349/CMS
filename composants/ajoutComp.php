<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>
        Accueil
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Utilisez Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <!-- Utilisez jQuery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script id="Script_Base">
            $(document).ready(function () {
            $("#icone-button, #icone-button svg").click(function (e) {
                e.stopPropagation();
                $("#liste-deroulante").toggle(); // Cette ligne permet d'afficher ou masquer la liste déroulante
            });

            $("#icone-button").click(function () {
                const nouveauBouton = $("<button>").text("Bouton ajouté");
                $("#liste-deroulante").append(nouveauBouton);
            });

            // Fermer la liste déroulante si l'utilisateur clique en dehors
            $(document).click(function (e) {
                if (!$(e.target).is("#icone-button") && !$(e.target).is("#liste-deroulante")) {
                    $("#liste-deroulante").hide(); // Cela masque la liste déroulante si l'utilisateur clique en dehors
                }
            }); 
        });
    </script>


    <style type="text/css">
        h1 {
            color:green;
        }

        .xyz {
            background-size: auto;
            text-align: center;
            padding-top: 100px;
        }

        .btn-circle {
            border-radius: 50%;
            text-align: center;
        }

        .btn-xl {
            width: 70px;
            height: 70px;
            padding: 10px 16px;
            font-size: 12px;
        }
        
        .background-green {
            background-color: lightgray; /* Couleur de fond verte */
            color: white; /* Couleur du texte */
            border: 1px lightgray;
            /* Autres styles de texte, marge, etc. si nécessaire */
        }

        #liste-deroulante {
            background-color: lightgray;
            border: 2px solid rgb(128, 128, 128); /* Changer la couleur et l'épaisseur de la bordure de la liste déroulante */
            border-radius: 5px; /* Arrondir les coins de la liste déroulante */
            padding: 5px; /* Ajouter du rembourrage pour l'intérieur de l'option sélectionnée */
            display: none;
            margin-top: 10px;
        }
    </style>

</head>

<body>

    <!-- Le contenu de votre page -->

    <div class="container mt-5 d-flex align-items-center justify-content-center">

        <button id="icone-button" class="btn btn-secondary btn-circle btn-xl d-flex align-items-center justify-content-center background-green" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> 
        </button>

    </div>

    <select id="liste-deroulante" style="display: none;">
        <option value="Option 1">test 1</option>
        <option value="Option 2">test 2</option>
        <option value="Option 3">test 3</option>
    </select>
    
    <button id="icone-button" class="btn btn-secondary">Cliquez pour ajouter un bouton</button>
    <div id="liste-deroulante" style="display: none;">
        <button id="nouveau-bouton" class="btn btn-primary">Nouveau bouton</button>
    </div>

</body>

</html>
