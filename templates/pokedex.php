<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

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
                            <a class="nav-link active" href="?command=pokedex">Pokédex</a>
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
        <h1>Pokédex</h1>
        <p class="lead">View the Pokédex here!</p>
        <form action="?command=search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for a Pokemon..." autofocus id="searchValue" name="searchValue" />
                <input type="button" class="btn btn-primary" value="Search" id="searchBtn" name="searchBtn" />
            </div>
        </form>
        <br>
        <table class="table table-striped">
            <tr>
                <th scope="col" style="width: 20%;">Pokédex Number</th>
                <th scope="col" style="width: 20%;">Name</th>
                <th scope="col" style="width: 20%;">Generation</th>
                <th scope="col" style="width: 20%;">Type 1</th>
                <th scope="col" style="width: 20%;">Type 2</th>
            </tr>
            <?php foreach ($list_of_pokemon as $pokemon) : ?>
                <tr>
                    <td><?php echo $pokemon['pokedex_number']; ?></td>
                    <td><?php echo $pokemon['name']; ?></td>
                    <td><?php echo $pokemon['generation']; ?></td>
                    <td><?php echo $pokemon['type1']; ?></td>
                    <td><?php if ($pokemon['type2'] != "") {
                            echo $pokemon['type2'];
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>