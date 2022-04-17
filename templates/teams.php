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
        <style>@media print {#ghostery-tracker-tally {display:none !important}}</style>
    
        
        
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
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?command=home">Home</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="?command=teams">Teams</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?command=pokedex">PokeDex</a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link" href="?command=login">Login</a>
                        </li>

                        
                        
    
                            
                    </ul>
                </div>
            </div>
        </nav>





        <form action="?command=login" method="post">
        <h2>Login</h2>
        
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required/>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"/>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required/>
            </div>           
        <hr>
            
        <button class="registerbtn" type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        <hr>
        </form>
</body>

</html>