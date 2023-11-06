<!DOCTYPE html>
<html>
<head>
    <style>
        .menuroulant {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menuroulant li {
            position: relative;
        }

        .menuroulant li a:link, .menuroulant li a:visited {
            display: block;
            color: #FFFFFF;
            background-color: #293245;
            padding: 6px 10px;
            border: 1px solid #FFFFFF;
            text-align: center;
            text-decoration: none;
            width: 150px;
            border-radius: 10px;
        }

        .menuroulant li a:hover {
            background-color: #199BD2;
        }

        .menuroulant li a:active {
            background-color: #808080;
        }

        .menuroulant .sousmenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
        }

        .menuroulant li:hover .sousmenu {
            display: block;
        }

        .menuroulant .sousmenu li {
            border-top: 1px solid transparent;
            border-right: 1px solid transparent;
            border-radius: 10px;
        }

        .menuroulant .sousmenu li a:link, .menuroulant .sousmenu li a:visited {
            display: block;
            color: #FFFFFF;
            text-decoration: none;
            background-color: #808080;
        }

        .menuroulant .sousmenu li a:hover {
            background-color: #199BD2;
        }
    </style>
</head>

<body>
    <nav class="Wrapper">
        <ul class="menuroulant">
            <li>
                <a href="#">Login</a>
                <ul class="sousmenu">
                    <li>
                        <a href="#">Profile</a>
                    </li>
                    <li>
                        <a href="#">Déconnexion</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</body>
</html>