<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voting System App</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<nav class="navbar text-bg-info p-3 text-white shadow-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="index.php">Voting System</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-white"></span>
        </button>
        <div class="offcanvas offcanvas-end bg-info " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white fw-bold" id="offcanvasNavbarLabel"><a href="index.php" class="offcanvas-title text-white fw-bold text-decoration-none">Voting system</a></h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="bg-info-emphasis text-white  px-3 py-2  rounded">
                <ul class="navbar-nav justify-content-end flex-grow-1 ">
                    <li class="nav-item">
                        <a class="nav-link active text-light fw-bold" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <hr class="border border-2">
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold" href="login.php">Log In</a>
                    </li>
                    <hr class="border border-2 ">
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold" href="register.php">Register</a>
                    </li>
                    <hr class="border border-2 ">

                </ul>
            </div>
        </div>
    </div>
</nav>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>