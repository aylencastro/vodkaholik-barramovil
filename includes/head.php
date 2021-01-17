<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="ISO 8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles/style.css">
    <script src="./scripts/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro|BenchNine|Dancing+Script|Kaushan+Script|Merienda|Pragati+Narrow|Tenor+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./icon/iconfinder_Cocktail_2376769.ico" type="image/x-icon">
    <title><?php echo TITLE; ?></title>
</head>

<body>

    <div id="loading">
        <div class="center" id="loading-flex">
            <div class="logo2" id="logo-load"></div>
            <h1>Cargando&#8230;</h1>
            <div id="gif"></div>
        </div>
    </div>

<script>

setTimeout(iniciarPagina, 5000);

function iniciarPagina() {
    
    if (document.readyState == 'complete') 
    {
        document.getElementById("loading").style.display= "none";
        document.getElementById("body-loaded").style.display= "contents";
    }
} 
</script>
