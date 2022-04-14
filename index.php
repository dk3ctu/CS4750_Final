<?php

require('connect-db.php');
require('classes/sqlfuncs.php');

$all_pokemons = getAllPokemon();

?>

<!DOCTYPE html>
<html>

<body>
<h2>PokeDex</h2>
<!-- <div class="row justify-content-center">   -->
<table class="w3-table w3-bordered w3-card-4" style="width:90%">
  <thead>
  <tr style="background-color:#B0B0B0">
    <th width="25%">Abilities</th>        
    <th width="25%">Attack</th>        
    <th width="20%">Base Total</th> 
    <th width="20%">Capture Rate</th>
    <th width="25%">Defense</th>        
    <th width="25%">Experience Growth</th>        
    <th width="20%">HP</th> 
    <th width="20%">Name</th>  
    <th width="20%">Percentage Male</th>  
    <th width="20%">Pokedex Number</th>  
    <th width="20%">Special Attack</th>  
    <th width="20%">Special Defense</th>  
    <th width="20%">Speed</th> 
    <th width="20%">Type 1</th>  
    <th width="20%">Type 2</th>  
    <th width="20%">Generation</th> 

  </tr>
  </thead>
  <?php foreach ($all_pokemons as $pokemon): ?>
  <tr>
    <td><?php echo $pokemon['abilities']; ?></td>
    <td><?php echo $pokemon['attack']; ?></td>
    <td><?php echo $pokemon['base_total']; ?></td>
    <td><?php echo $pokemon['capture_rate']; ?></td>
    <td><?php echo $pokemon['defense']; ?></td>
    <td><?php echo $pokemon['experience_growth']; ?></td> 
    <td><?php echo $pokemon['hp']; ?></td>
    <td><?php echo $pokemon['name']; ?></td>
    <td><?php echo $pokemon['percentage_male']; ?></td> 
    <td><?php echo $pokemon['pokedex_number']; ?></td>
    <td><?php echo $pokemon['sp_attack']; ?></td>
    <td><?php echo $pokemon['sp_defense']; ?></td> 
    <td><?php echo $pokemon['speed']; ?></td>
    <td><?php echo $pokemon['type1']; ?></td>
    <td><?php echo $pokemon['type2']; ?></td> 
    <td><?php echo $pokemon['generation']; ?></td>  
    <td>
    
    </td>
   
  </tr>
  <?php endforeach; ?>

  
  </table>

  </body>
</html>