<?php

    $navItems = [
        [
            "href" => "#nosotros",
            "title" => "Nosotros"
        ],
        [
            "href" => "#servicios",
            "title" => "Servicios"
        ],
        [
            "href" => "#fotos",
            "title" => "Fotos"
        ],
        [
            "href" => "#formulario",
            "title" => "Contacto"
        ]
    ];

?>

<ul>
   <?php
        foreach($navItems as $item)
        {
            echo "<li><a href=\"$item[href]\" onclick='closeNav()'>$item[title]</a></li>";
        }
   ?>
</ul>