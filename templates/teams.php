<!DOCTYPE html>
<html>


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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsTop"
                aria-controls="navbarsTop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsTop">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($_COOKIE['email'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?command=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?command=teams">Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?command=pokedex">Pokédex</a>
                    </li>
                    <?php if (isset($_COOKIE['admin'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?command=user">Users</a>
                    </li>
                    <?php endif ?>
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
     <?php if(!$aboutToUpdate) : ?>
        <form action="?command=teams" method="post">
            <h2>Build your team:</h2>

            <div class="mb-3">
                <label for="team_name" class="form-label">Team Name</label>
                <input type="team_name" class="form-control" id="team_name" name="team_name" required />
            </div>
            <div class="mb-3">
                <label> Choose a pokemon: </label>
                <select name="pokemon1" id="pokemon1">
                    <option value="none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="pokemon2" id="pokemon2">
                    <option value="none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="pokemon3" id="pokemon3">
                    <option value="none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="pokemon4" id="pokemon4">
                    <option value="none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="pokemon5" id="pokemon5">
                    <option value="none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="pokemon6" id="pokemon6">
                    <option value="none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Create</button>
            <hr>
        </form>
                    
        <?php endif ?>


        <?php if($aboutToUpdate) : ?>
        <form action="?command=actuallyUpdateTeam" method="post">
            <h2>Change your team:</h2>

            <div class="mb-3">
                <label for="team_name" class="form-label">Team Name</label>
                <input type="hidden" class="form-control" id="team_name" name="team_name" value = " <?php echo $team; ?>"required></input>
            </div>
            <div class="mb-3">
                <label> Choose a pokemon: </label>
                <select name="p1" id="p1">
                    
                    <option value="<?php echo $p1;?>"> <?php echo $p1;?> </option>
                    <option value = "none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="p2" id="p2">
              
                <option value="<?php echo $p2;?>"> <?php echo $p2;?> </option>
                <option value = "none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="p3" id="p3">
         
                <option value="<?php echo $p3;?>"> <?php echo $p3;?> </option>
                <option value = "none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="p4" id="p4">
               
                <option value="<?php echo $p4;?>"> <?php echo $p4;?> </option>
                <option value = "none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="p5" id="p5">
               
                <option value="<?php echo $p5;?>"> <?php echo $p5;?> </option>
                <option value = "none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
                <select name="p6" id="p6">
           
                <option value="<?php echo $p6;?>"> <?php echo $p6;?> </option>
                <option value = "none"> None </option>
                    <?php foreach($list_of_pokemon as $pokemon): ?>
                    <option value="<?php echo $pokemon['name']; ?> "> <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>
                </select>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Update</button>


            <hr>
         </form>
                    
        <?php endif ?>


























        <?php foreach($user_pokemon_teams as $team): ?>
        <form action="?command=updateTeam" method="post">
            <input type="submit" value="Change" name="btnAction" class="btn btn-warning" />
            <input type="hidden" name="team_to_update" value="<?php echo $team['team_name']; ?>" id="team_to_update"></input>
           
        </form>
        <form action="?command=deleteTeam" method="post">
            <button type="delete" class="btn btn-danger"> Delete Team </button>
            <input type="hidden" value = "<?php echo $team['team_name']; ?>" name="team_name" id="team_name"></input>
        </form>
        <table class="table table-striped">
            <tr>
                <th scope="col" style="width: 16%; font-size:24px"><?php echo $team['team_name']; ?></th>
            </tr>
        </table>
        <table class="table table-striped">
            <tr>
                <th scope="col" style="width: 33%;">Pokemon Name</th>
                <th scope="col" style="width: 33%;">Type 1</th>
                <th scope="col" style="width: 33%;">Type 2</th>
            </tr>
            <?php
                $members = $db_for_teams->query("select pokemon_name, type1, type2 from pokemon_team natural join pokemon where uid = ? and team_name = ?", "is", $user_id, $team["team_name"]);
                $normal_weakness = 0;
                $normal_resistance = 0;
                $fighting_weakness = 0;
                $fighting_resistance = 0;
                $flying_weakness = 0;
                $flying_resistance = 0;
                $poison_weakness = 0;
                $poison_resistance = 0;
                $ground_weakness = 0;
                $ground_resistance = 0;
                $rock_weakness = 0;
                $rock_resistance = 0;
                $bug_weakness = 0;
                $bug_resistance = 0;
                $ghost_weakness = 0;
                $ghost_resistance = 0;
                $steel_weakness = 0;
                $steel_resistance = 0;
                $fire_weakness = 0;
                $fire_resistance = 0;
                $water_weakness = 0;
                $water_resistance = 0;
                $grass_weakness = 0;
                $grass_resistance = 0;
                $electric_weakness = 0;
                $electric_resistance = 0;
                $psychic_weakness = 0;
                $psychic_resistance = 0;
                $ice_weakness = 0;
                $ice_resistance = 0;
                $dragon_weakness = 0;
                $dragon_resistance = 0;
                $dark_weakness = 0;
                $dark_resistance = 0;
                $fairy_weakness = 0;
                $fairy_resistance = 0;
                ?>

            <?php foreach($members as $pokemon): ?>
            <!--  for each pokemon, get the type effectiveness of each of them frmo the type_effectiveness table -->
            <?php $pokemon_type_effectiveness = $db_for_teams->query("select * from type_effectiveness where name =?", "s", $pokemon['pokemon_name']) ?>
            <?php foreach($pokemon_type_effectiveness as $effectiveness): ?>
            <?php
                if ($effectiveness['against_bug'] > 1){
                    $bug_weakness = $bug_weakness + 1;
                } else if ($effectiveness['against_bug'] < 1){
                    $bug_resistance = $bug_resistance + 1;
                }
                if ($effectiveness['against_dark'] > 1){
                    $dark_weakness = $dark_weakness + 1;
                } else if ($effectiveness['against_dark'] < 1){
                    $dark_resistance = $dark_resistance + 1;
                }
                if ($effectiveness['against_dragon'] > 1){
                    $dragon_weakness = $dragon_weakness + 1;
                } else if ($effectiveness['against_dragon'] < 1){
                    $dragon_resistance = $dragon_resistance + 1;
                }
                if ($effectiveness['against_electric'] > 1){
                    $electric_weakness = $electric_weakness + 1;
                } else if ($effectiveness['against_electric'] < 1){
                    $electric_resistance = $electric_resistance + 1;
                }
                if ($effectiveness['against_fairy'] > 1){
                    $fairy_weakness = $fairy_weakness + 1;
                } else if ($effectiveness['against_fairy'] < 1){
                    $fairy_resistance = $fairy_resistance + 1;
                }
                if ($effectiveness['against_fight'] > 1){
                    $fighting_weakness = $fighting_weakness + 1;
                } else if ($effectiveness['against_fight'] < 1){
                    $fighting_resistance = $fighting_resistance + 1;
                }
                if ($effectiveness['against_fire'] > 1){
                    $fire_weakness = $fire_weakness + 1;
                } else if ($effectiveness['against_fire'] < 1){
                    $fire_resistance = $fire_resistance + 1;
                }
                if ($effectiveness['against_flying'] > 1){
                    $flying_weakness = $flying_weakness + 1;
                } else if ($effectiveness['against_flying'] < 1){
                    $flying_resistance = $flying_resistance + 1;
                }
                if ($effectiveness['against_ghost'] > 1){
                    $ghost_weakness = $ghost_weakness + 1;
                } else if ($effectiveness['against_ghost'] < 1){
                    $ghost_resistance = $ghost_resistance + 1;
                }
                if ($effectiveness['against_grass'] > 1){
                    $grass_weakness = $grass_weakness + 1;
                } else if ($effectiveness['against_grass'] < 1){
                    $grass_resistance = $grass_resistance + 1;
                }
                if ($effectiveness['against_ground'] > 1){
                    $ground_weakness = $ground_weakness + 1;
                } else if ($effectiveness['against_ground'] < 1){
                    $ground_resistance = $ground_resistance + 1;
                }
                if ($effectiveness['against_ice'] > 1){
                    $ice_weakness = $ice_weakness + 1;
                } else if ($effectiveness['against_ice'] < 1){
                    $ice_resistance = $ice_resistance + 1;
                }
                if ($effectiveness['against_normal'] > 1){
                    $normal_weakness = $normal_weakness + 1;
                } else if ($effectiveness['against_normal'] < 1){
                    $normal_resistance = $normal_resistance + 1;
                }
                if ($effectiveness['against_poison'] > 1){
                    $poison_weakness = $poison_weakness + 1;
                } else if ($effectiveness['against_poison'] < 1){
                    $poison_resistance = $poison_resistance + 1;
                }
                if ($effectiveness['against_psychic'] > 1){
                    $psychic_weakness = $psychic_weakness + 1;
                } else if ($effectiveness['against_psychic'] < 1){
                    $psychic_resistance = $psychic_resistance + 1;
                }
                if ($effectiveness['against_rock'] > 1){
                    $rock_weakness = $rock_weakness + 1;
                } else if ($effectiveness['against_rock'] < 1){
                    $rock_resistance = $rock_resistance + 1;
                }
                if ($effectiveness['against_steel'] > 1){
                    $steel_weakness = $steel_weakness + 1;
                } else if ($effectiveness['against_steel'] < 1){
                    $steel_resistance = $steel_resistance + 1;
                }
                if ($effectiveness['against_water'] > 1){
                    $water_weakness = $water_weakness + 1;
                } else if ($effectiveness['against_water'] < 1){
                    $water_resistance = $water_resistance + 1;
                }
                ?>
            <?php endforeach; ?>
            <tr>
                <td><?php echo $pokemon['pokemon_name']; ?></td>
                <td><?php echo $pokemon['type1']; ?> </td>
                <td><?php echo $pokemon['type2']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <table class="table table-striped">
            <tr>
                <th scope="col" style="width: 100%;">Weaknesses</th>
            </tr>
        </table>
        <table class="table table-striped">
            <tr>
                <th scope="col" style="width: 16%; background-color:#A6B91A">Bug</th>
                <th scope="col" style="width: 16%; background-color:#705746">Dark</th>
                <th scope="col" style="width: 16%; background-color:#6F35FC">Dragon</th>
                <th scope="col" style="width: 16%; background-color:#F7D02C">Electric</th>
                <th scope="col" style="width: 16%; background-color:#D685AD">Fairy</th>
                <th scope="col" style="width: 16%; background-color:#C22E28">Fighting</th>
            </tr>
            <tr>
                <td><?php echo $bug_weakness; ?></td>
                <td><?php echo $dark_weakness; ?> </td>
                <td><?php echo $dragon_weakness; ?></td>
                <td><?php echo $electric_weakness; ?></td>
                <td><?php echo $fairy_weakness; ?> </td>
                <td><?php echo $fighting_weakness; ?></td>
            </tr>
            <tr>
                <th scope="col" style="width: 16%; background-color:#EE8130">Fire</th>
                <th scope="col" style="width: 16%; background-color:#A98FF3">Flying</th>
                <th scope="col" style="width: 16%; background-color:#735797">Ghost</th>
                <th scope="col" style="width: 16%; background-color:#7AC74C">Grass</th>
                <th scope="col" style="width: 16%; background-color:#E2BF65">Ground</th>
                <th scope="col" style="width: 16%; background-color:#96D9D6">Ice</th>
            </tr>
            <tr>
                <td><?php echo $fire_weakness; ?></td>
                <td><?php echo $flying_weakness; ?> </td>
                <td><?php echo $ghost_weakness; ?></td>
                <td><?php echo $grass_weakness; ?></td>
                <td><?php echo $ground_weakness; ?> </td>
                <td><?php echo $ice_weakness; ?></td>
            </tr>
            <tr>
                <th scope="col" style="width: 16%; background-color:#A8A77A">Normal</th>
                <th scope="col" style="width: 16%; background-color:#A33EA1">Poison</th>
                <th scope="col" style="width: 16%; background-color:#F95587">Psychic</th>
                <th scope="col" style="width: 16%; background-color:#B6A136">Rock</th>
                <th scope="col" style="width: 16%; background-color:#B7B7CE">Steel</th>
                <th scope="col" style="width: 16%; background-color:#6390F0">Water</th>
            </tr>
            <tr>
                <td><?php echo $normal_weakness; ?></td>
                <td><?php echo $poison_weakness; ?> </td>
                <td><?php echo $psychic_weakness; ?></td>
                <td><?php echo $rock_weakness; ?></td>
                <td><?php echo $steel_weakness; ?> </td>
                <td><?php echo $water_weakness; ?></td>
            </tr>
        </table>
        <table class="table table-striped">
            <tr>
                <th scope="col" style="width: 100%;">Resistances</th>
            </tr>
        </table>
        <table class="table table-striped">
            <tr>
                <th scope="col" style="width: 16%; background-color:#A6B91A">Bug</th>
                <th scope="col" style="width: 16%; background-color:#705746">Dark</th>
                <th scope="col" style="width: 16%; background-color:#6F35FC">Dragon</th>
                <th scope="col" style="width: 16%; background-color:#F7D02C">Electric</th>
                <th scope="col" style="width: 16%; background-color:#D685AD">Fairy</th>
                <th scope="col" style="width: 16%; background-color:#C22E28">Fighting</th>

            </tr>
            <tr>
                <td><?php echo $bug_resistance; ?></td>
                <td><?php echo $dark_resistance; ?> </td>
                <td><?php echo $dragon_resistance; ?></td>
                <td><?php echo $electric_resistance; ?></td>
                <td><?php echo $fairy_resistance; ?> </td>
                <td><?php echo $fighting_resistance; ?></td>
            </tr>
            <tr>
                <th scope="col" style="width: 16%; background-color:#EE8130">Fire</th>
                <th scope="col" style="width: 16%; background-color:#A98FF3">Flying</th>
                <th scope="col" style="width: 16%; background-color:#735797">Ghost</th>
                <th scope="col" style="width: 16%; background-color:#7AC74C">Grass</th>
                <th scope="col" style="width: 16%; background-color:#E2BF65">Ground</th>
                <th scope="col" style="width: 16%; background-color:#96D9D6">Ice</th>
            </tr>
            <tr>
                <td><?php echo $fire_resistance; ?></td>
                <td><?php echo $flying_resistance; ?> </td>
                <td><?php echo $ghost_resistance; ?></td>
                <td><?php echo $grass_resistance; ?></td>
                <td><?php echo $ground_resistance; ?> </td>
                <td><?php echo $ice_resistance; ?></td>
            </tr>
            <tr>
                <th scope="col" style="width: 16%; background-color:#A8A77A">Normal</th>
                <th scope="col" style="width: 16%; background-color:#A33EA1">Poison</th>
                <th scope="col" style="width: 16%; background-color:#F95587">Psychic</th>
                <th scope="col" style="width: 16%; background-color:#B6A136">Rock</th>
                <th scope="col" style="width: 16%; background-color:#B7B7CE">Steel</th>
                <th scope="col" style="width: 16%; background-color:#6390F0">Water</th>
            </tr>
            <tr>
                <td><?php echo $normal_resistance; ?></td>
                <td><?php echo $poison_resistance; ?> </td>
                <td><?php echo $psychic_resistance; ?></td>
                <td><?php echo $rock_resistance; ?></td>
                <td><?php echo $steel_resistance; ?> </td>
                <td><?php echo $water_resistance; ?></td>
            </tr>
        </table>
        <?php endforeach; ?>
    </div>
</body>

</html>