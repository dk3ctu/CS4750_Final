<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Eddy Phan (eqp6wkt), Vivine Zheng, Darnell Khay, Darwin Khay">
    <meta name="description" content="PHP file for our Pokemon Team Builder">

    <title>Pokemon Team Builder</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            #ghostery-tracker-tally {
                display: none !important
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Main Navigation Bar">
        <div class="container-xl">
            <a class="navbar-brand primary-text" href="?command=home">Pokemon Team Builder</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsTop" aria-controls="navbarsTop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsTop">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($_COOKIE['email'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?command=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?command=teams">Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?command=pokedex">Pokédex</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?command=logout">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?command=registerRedirect">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="?command=login">Login</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <div style="margin: 2rem 5rem;">
        <?php if (!empty($error_msg)) {
            echo "<div class='alert alert-danger'>$error_msg</div>";
        }
        ?>
        <?php if (isset($_COOKIE['email'])) : ?>
            <h1>Welcome to Pokemon Team Builder!</h1>
            <p class="lead">You are already logged in!</p>
        <?php else : ?>
            <h1>Welcome to Pokemon Team Builder!</h1>
            <p class="lead">Log in here!</p>
            <hr>
            <div>
                <form action="?command=login" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required />
                    </div>
                    <br>
                    <button class="btn btn-success" type="submit">Login</button>
                </form>
            </div>
            <hr>
            <span class="psw">New User? <a href="?command=registerRedirect">Register for an account here!</a></span>
        <?php endif ?>
    </div>
    <div class="col-12 border-top" style="float:left;">
        <footer class="d-flex flex-wrap justify-content-between align-items-center">
            <p class="col-md-4 ms-4 mt-4 mb-0 text-muted">© 2022 Pokemon Team Builder</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>