<!--
naam script     : header.php
omschrijving    : het is de header van het systeem gemaakt als een component om het aan te roepen waar nofig
Auteur          : hussen
project         : scootershop
Aanmaakdatum    : 5/12/2025
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
   <style>
    
/* Navbar container */
nav.navbar {
    background-color: #222;
    padding: 15px 20px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
}

/* Navbar menu */
nav.navbar ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 20px;
}

/* Navbar links */
nav.navbar ul li a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    padding: 8px 12px;
    border-radius: 5px;
    transition: 0.3s ease;
}

/* Hover effect */
nav.navbar ul li a:hover {
    background-color: #444;
}

/* Active pagina (optioneel) */
nav.navbar ul li a.active {
    background-color: #007bff;
}
   </style>

</head>
<body>
<?php $base_url = "/school/school/projecten/scootershopexamen/scootershopexamen/"; ?>
<nav class="navbar">
    <ul>
        <li><a href="<?= $base_url ?>index.php">dashboard</a></li>
        <li><a href="<?= $base_url ?>paginas/bestellingen.php">Bestellingen</a></li>
        <li><a href="<?= $base_url ?>paginas/magazijn.php">Magazijn</a></li>



    </ul>

</nav>
</body>
</html>






