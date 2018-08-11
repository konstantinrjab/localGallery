<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Gallery</title>
</head>
<body class="bg-dark">
<?php
$images = scandir('img/');
array_shift($images);
array_shift($images);
$images = array_slice($images, 5, 30);
//echo '<pre>';
//print_r($images);
//echo '</pre>';
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">

        <?php foreach ($images as $i => $image) : ?>
            <div class="carousel-item">
                <img id="<?= $i ?>_carousel" class="d-block w-100" src="img/<?= $image; ?>">
            </div>
        <?php endforeach; ?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($images as $i => $image) : ?>
            <div class="col-sm-6 col-lg-3">
                <img id="<?= $i ?>" class="d-block w-100" src="img/<?= $image; ?>" onclick="toCarousel(this)">
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>