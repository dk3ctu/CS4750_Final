<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    
                     if(isset($_COOKIE['email'])) {
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
                     if(!isset($_COOKIE['email'])){
                     echo '<li class="nav-item">
                         <a class="nav-link" href="?command=login">Login</a>
                     </li>';
                     }
                     ?>
                     <?php 
                     if(isset($_COOKIE['email'])){
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
  <?php foreach ($list_of_pokemon as $pokemon): ?>
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

