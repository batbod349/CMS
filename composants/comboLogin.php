<html>
    <head>
       <style>
        .menuroulant
        {
            height: 60px;
            width: 200px;
            list-style: none;
        }

        .menuroulant li a:link ,.menuroulant li a:visited 
        {
            display: block;
            color: #FFFFFF;
            background-color: #293245;
            padding: 6px 10px;
            border: 1px solid #FFFFFF;
            text-align: center;
            text-decoration: none;

        }
        .menuroulant li a:hover {background-color: #199BD2;}
        .menuroulant li a:active {background-color: #808080;}

        .menuroulant .sousmenu
        {
            list-style-type: none;
            display: none;
            padding: 0;
            margin: 0;
            position: absolute;
        }
        .menuroulant .sousmenu li
        {
            float:none;
            margin: 0;
            padding: 0;
            border-top: 1px solid transparent;
            border-right: 1px solid transparent;
        }

         .menuroulant .sousmenu li a:link, .menuroulant li a:visited
        {
            display: block;
            color: #FFFFFF;
            text-decoration: none;
            background-color: #808080 ;
        }

        .menuroulant .sousmenu li a:hover{
            background-color: #199BD2;
        }

        .menuroulant li:hover .sousmenu {
            display: block;
        }   

       </style>
    </head>
    
    <nav class="Wrapper">
        <ul class="menuroulant">
            <li>
                <a href="#">Login</a>
            </li>
            <ul class="sousmenu">
                <li>
                    <a href="#">profile</a>
                </li>
                <li>
                    <a href="#">deconetion</a>
                </li>
            </ul>
        </ul>
    </nav>
</html>