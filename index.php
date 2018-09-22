<?php
session_start();
$hash = '$2y$10$vgaOY6Mb27tDWNO7iZXHnO..jZqF5ajnZgkIev2DPML/NSOGRYlwy';
if (isset($_POST['password']) ||
    password_hash($_POST['password'], PASSWORD_DEFAULT) == $hash) {
    $auth = true;
    unset($_POST['password']);
}

$path = 'img/';
if (is_dir($path)) {
    $images = glob("$path*.*");
    shuffle($images);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/8.15.2/lazyload.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Gallery</title>
</head>
<body class="bg-dark">
<?php if ($auth !== true) : ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="post">
                            <div class="form-label-group pb-3">
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                       placeholder="Password" required>
                            </div>
                            <button class="btn btn-lg btn-facebook btn-block" type="submit">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <?php if (isset($images)) : ?>
        <div class="container mt-4 gallery">
            <div class="row">
                <?php foreach ($images as $i => $image) : ?>
                    <div class="col-sm-6 col-lg-3">
                        <img id="<?= $i ?>" class="d-block w-100 lazy" src="<?= $image; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else : ?>
        <div class="container d-flex align-items-center justify-content-center w100vh">
            <div class="row">
                <div class="col-12">
                    <p class="text-danger display-1 text-center">Images not found</p>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
<?php unset($_SESSION['auth']) ?>