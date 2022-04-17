<?php

?>

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
            <a class="navbar-brand primary-text" href="?command=homepage">Pokemon Team Builder</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsTop" aria-controls="navbarsTop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsTop">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if (isset($_COOKIE['email'])) {
                        echo
                        '<li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?command=home">Home</a>
                        </li>';
                        echo
                        '<li class="nav-item">
                            <a class="nav-link" href="?command=teams">Teams</a>
                        </li>';
                        echo
                        '<li class="nav-item">
                            <a class="nav-link" href="?command=pokedex">PokeDex</a>
                        </li>';
                    }
                    ?>
                    <?php
                    if (!isset($_COOKIE['email'])) {
                        echo '<li class="nav-item">
                            <a class="nav-link" href="?command=login">Login</a>
                        </li>';
                    }
                    ?>
                    <?php
                    if (isset($_COOKIE['email'])) {
                        echo
                        '<li class="nav-item">
                            <a href="?command=logout" class="nav-link"> Logout</a>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

        <?php if (!empty($error_msg)) { 
          echo "<div class='alert alert-danger'>$error_msg</div>";
        }
        ?>
        
        <form action="?command=teams" method="post">
        <h2>Build your team:</h2>
        
            <div class="mb-3">
                <label for="team_name" class="form-label">Team Name</label>
                <input type="team_name" class="form-control" id="team_name" name="team_name" required/>
            </div>
            <div class="mb-3">
                <label> Choose a pokemon: </label>
                <select name="pokemon1" id="pokemon1"> 
                    <option value = "none"> None </option>
                    <?php
                     foreach($list_of_pokemon as $pokemon): ?>
                        <option value =  "<?php echo $pokemon['name']; ?> " >  <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>

                </select>
                <select name="pokemon2" id="pokemon2"> 
                <option value = "none"> None </option>
                    <?php
                     foreach($list_of_pokemon as $pokemon): ?>
                        <option value =  "<?php echo $pokemon['name']; ?> " >  <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>

                </select>
                <select name="pokemon3" id="pokemon3"> 
                <option value = "none"> None </option>
                    <?php
                     foreach($list_of_pokemon as $pokemon): ?>
     
                        <option value =  "<?php echo $pokemon['name']; ?> " >  <?php echo $pokemon['name']; ?> </option>';

                </select>
                <select name="pokemon4" id="pokemon4"> 
                <option value = "none"> None </option>
                    <?php
                     foreach($list_of_pokemon as $pokemon): ?>
                        <option value =  "<?php echo $pokemon['name']; ?> " >  <?php echo $pokemon['name']; ?> </option>';
                       
                    <?php endforeach; ?>

                </select>
                <select name="pokemon5" id="pokemon5"> 
                <option value = "none"> None </option>
                    <?php
                     foreach($list_of_pokemon as $pokemon): ?>
                  
                        <option value =  "<?php echo $pokemon['name']; ?> " >  <?php echo $pokemon['name']; ?> </option>';
        
                    <?php endforeach; ?>

                </select>
                <select name="pokemon6" id="pokemon6"> 
                <option value = "none"> None </option>
                    <?php
                     foreach($list_of_pokemon as $pokemon): ?>
                        <option value =  "<?php echo $pokemon['name']; ?> " >  <?php echo $pokemon['name']; ?> </option>';
                    <?php endforeach; ?>

    <form action="?command=teams" method="post">
        <h2>Build your team:</h2>

        <div class="mb-3">
            <label for="team_name" class="form-label">Team Name</label>
            <input type="team_name" class="form-control" id="team_name" name="team_name" required />
        </div>
        <div class="mb-3">
            <label for="pokemon_names"> Choose a pokemon: </label>
            <select name="pokemon1" id="pokemon1">
                <option value="none"> None </option>
                <?php
                foreach ($list_of_pokemon as $pokemon) : ?>
                    <option value="<?php $pokemon['name'] ?> "> <?php echo $pokemon['name']; ?> </option>';
                <?php endforeach; ?>

            </select>
            <select name="pokemon2" id="pokemon2">
                <option value="none"> None </option>
                <?php
                foreach ($list_of_pokemon as $pokemon) : ?>
                    <option value="<?php $pokemon['name'] ?> "> <?php echo $pokemon['name']; ?> </option>';
                <?php endforeach; ?>

            </select>
            <select name="pokemon3" id="pokemon3">
                <option value="none"> None </option>
                <?php
                foreach ($list_of_pokemon as $pokemon) : ?>

                    <option value="<?php $pokemon['name'] ?> "> <?php echo $pokemon['name']; ?> </option>';

                <?php endforeach; ?>

            </select>
            <select name="pokemon4" id="pokemon4">
                <option value="none"> None </option>
                <?php
                foreach ($list_of_pokemon as $pokemon) : ?>
                    <option value="<?php $pokemon['name'] ?> "> <?php echo $pokemon['name']; ?> </option>';

                <?php endforeach; ?>

            </select>
            <select name="pokemon5" id="pokemon5">
                <option value="none"> None </option>
                <?php
                foreach ($list_of_pokemon as $pokemon) : ?>

                    <option value="<?php $pokemon['name'] ?> "> <?php echo $pokemon['name']; ?> </option>';

                <?php endforeach; ?>

            </select>
            <select name="pokemon6" id="pokemon6">
                <option value="none"> None </option>
                <?php
                foreach ($list_of_pokemon as $pokemon) : ?>
                    <option value="<?php $pokemon['name'] ?> "> <?php echo $pokemon['name']; ?> </option>';
                <?php endforeach; ?>

            </select>

        </div>

        <hr>
        <button type="submit">Create</button>

        <hr>
    </form>

        <table class="w3-table w3-bordered w3-card-4" style="width:90%">
        
            
        <?php
            foreach($user_pokemon_teams as $team): ?>
            <thead>
            <tr style="background-color:#B0B0B0">
            <th>
            <?php

             
                echo $team['team_name'];

                $members = $db_for_teams->query("select pokemon_name, type1, type2 from pokemon_team natural join pokemon where uid = ? and team_name = ?", "is", $user_id, $team["team_name"]);

                ?>
                <tbody>
             <?php  foreach($members as $pokemon): ?>
                
                <tr>
                  <td>  <?php echo $pokemon['pokemon_name']; ?></td>
                  <td> <?php echo $pokemon['type1']; ?> </td>
                   <td> <?php echo $pokemon['type2']; ?></td>
                </tr>
                
                <?php endforeach; ?>
                
             </tbody>


                
            </th>
            </tr>
            </thead>
        


        <?php endforeach; ?>





</body>

</html>