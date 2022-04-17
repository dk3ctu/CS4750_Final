<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
$list_of_pokemon = $this->db->query("select * from pokemon");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["searchBtn"])) {
        // echo "<pre>";
        // echo print_r($_POST);
        // echo "</pre>";
        $list_of_pokemon = $this->db->query("select * from pokemon where name like '%" . $_POST["searchValue"] . "%'");

        if (!empty($_POST["type_list"])) {
            $queries = [];
            foreach ($_POST["type_list"] as $type) {
                $query = $this->db->query("select * from pokemon where type1 = '" . $type . "' union select * from pokemon where type2 = '" . $type . "'");
                array_push($queries, $query);
            }
            $result = [];
            foreach ($queries as $query) {
                $result = array_merge((array) $result, (array) $query);
            }
            $overlap = [];
            foreach ($list_of_pokemon as $pokemon) {
                if (in_array($pokemon, $result)) {
                    array_push($overlap, $pokemon);
                }
            }
            $list_of_pokemon = $overlap;
        }

        if (!empty($_POST["gen_list"])) {
            $queries = [];
            foreach ($_POST["gen_list"] as $gen) {
                $query = $this->db->query("select * from pokemon where generation = ?", "s", $gen);
                array_push($queries, $query);
            }
            $result = [];
            foreach ($queries as $query) {
                $result = array_merge((array) $result, (array) $query);
            }
            $overlap = [];
            foreach ($list_of_pokemon as $pokemon) {
                if (in_array($pokemon, $result)) {
                    array_push($overlap, $pokemon);
                }
            }
            $list_of_pokemon = $overlap;
        }
    }
}
?>

<script type="text/javascript">
    function checkForEnter(key) {
        if (key.keyCode == 13) {
            // key.preventDefault();
        }
    }
</script>

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
        <form method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for a Pokemon by name..." autofocus id="searchValue" name="searchValue" onkeypress="checkForEnter(event)" <?php if (isset($_POST['searchValue'])) {
                                                                                                                                                                                            echo "value = '";
                                                                                                                                                                                            echo $_POST['searchValue'];
                                                                                                                                                                                            echo "'";
                                                                                                                                                                                        } ?> />
                <input type="submit" class="btn btn-primary" value="Search" id="searchBtn" name="searchBtn" />

            </div>
            <div class="mt-4">
                <p>Include only these types:</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="normal" value="normal" <?php if (isset($_POST['type_list']) && in_array("normal", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="normal">Normal</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="fighting" value="fighting" <?php if (isset($_POST['type_list']) && in_array("fighting", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="fighting">Fighting</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="flying" value="flying" <?php if (isset($_POST['type_list']) && in_array("flying", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="flying">Flying</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="poison" value="poison" <?php if (isset($_POST['type_list']) && in_array("poison", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="poison">Poison</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="ground" value="ground" <?php if (isset($_POST['type_list']) && in_array("ground", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="ground">Ground</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="rock" value="rock" <?php if (isset($_POST['type_list']) && in_array("rock", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="rock">Rock</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="bug" value="bug" <?php if (isset($_POST['type_list']) && in_array("bug", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="bug">Bug</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="ghost" value="ghost" <?php if (isset($_POST['type_list']) && in_array("ghost", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="ghost">Ghost</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="steel" value="steel" <?php if (isset($_POST['type_list']) && in_array("steel", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="steel">Steel</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="fire" value="fire" <?php if (isset($_POST['type_list']) && in_array("fire", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="fire">Fire</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="water" value="water" <?php if (isset($_POST['type_list']) && in_array("water", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="water">Water</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="grass" value="grass" <?php if (isset($_POST['type_list']) && in_array("grass", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="grass">Grass</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="electric" value="electric" <?php if (isset($_POST['type_list']) && in_array("electric", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="electric">Electric</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="psychic" value="psychic" <?php if (isset($_POST['type_list']) && in_array("psychic", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="psychic">Psychic</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="ice" value="ice" <?php if (isset($_POST['type_list']) && in_array("ice", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="ice">Ice</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="dragon" value="dragon" <?php if (isset($_POST['type_list']) && in_array("dragon", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="dragon">Dragon</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="dark" value="dark" <?php if (isset($_POST['type_list']) && in_array("dark", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="dark">Dark</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="type_list[]" id="fairy" value="fairy" <?php if (isset($_POST['type_list']) && in_array("fairy", $_POST['type_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="fairy">Fairy</label>
                </div>
            </div>
            <div class="mt-4">
                <p>Include only Pokemon from these generations:</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="gen_list[]" id="1" value="1" <?php if (isset($_POST['type_list']) && in_array("1", $_POST['gen_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="normal">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="gen_list[]" id="2" value="2" <?php if (isset($_POST['type_list']) && in_array("2", $_POST['gen_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="fighting">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="gen_list[]" id="3" value="3" <?php if (isset($_POST['type_list']) && in_array("3", $_POST['gen_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="flying">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="gen_list[]" id="4" value="4" <?php if (isset($_POST['type_list']) && in_array("4", $_POST['gen_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="poison">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="gen_list[]" id="5" value="5" <?php if (isset($_POST['type_list']) && in_array("5", $_POST['gen_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="ground">5</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="gen_list[]" id="6" value="6" <?php if (isset($_POST['type_list']) && in_array("6", $_POST['gen_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="rock">6</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="gen_list[]" id="7" value="7" <?php if (isset($_POST['type_list']) && in_array("7", $_POST['gen_list'])) echo "checked"; ?>>
                    <label class="form-check-label" for="rock">7</label>
                </div>
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
                    <td><?php echo ucfirst($pokemon['type1']); ?></td>
                    <td><?php if ($pokemon['type2'] != "") {
                            echo ucfirst($pokemon['type2']);
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