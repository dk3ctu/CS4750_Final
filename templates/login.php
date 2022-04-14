
<!DOCTYPE html>
<html lang="en">
    <!--https://cs4640.cs.virginia.edu/eqp6wkt/sprint2/-->

    <!--sources used: https://stackoverflow.com/questions/928849/setting-table-column-width, https://getbootstrap.com/docs/5.1/content/tables/#bordered-tables,
    https://getbootstrap.com/docs/5.1/components/list-group/#checkboxes-and-radios, https://getbootstrap.com/docs/5.1/forms/floating-labels/-->
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
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="teams.php">Teams</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="pokedex.php">PokeDex</a>
                        </li>
    
    
                            
                    </ul>
                </div>
            </div>
        </nav>
        


        <form action="?command=login" method="post">
    
      <div class="container">
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
      </div>
      
      
    
      <div class="container" style="background-color:#f1f1f1">
        <span class="psw">Forgot <a href="?command=forgotpw">password?</a></span>
        
      </div>
      <div class="container" style="background-color:#f1f1f1">
        <span class="psw">New User? <a href="?command=register">Register Here!</a></span>
        
      </div>
      
    </form>












       


       

        <div class="col-sm-12 row" style="float: left;">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">© 2022 Pokemon Team Builder</p>
    
                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="?command=home" class="nav-link px-2 text-muted">Home</a></li>
                    <li class="nav-item"><a href="?command=teams" class="nav-link px-2 text-muted">Teams</a></li>
                    
                </ul>
            </footer>
        </div>
        </div> 
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>