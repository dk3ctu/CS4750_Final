<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
$list_of_users = $this->db->query("select * from user");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["searchBtn"])) {
        // echo "<pre>";
        // echo print_r($_POST);
        // echo "</pre>";
        $list_of_users = $this->db->query("select * from user where name like '%" . $_POST["searchValue"] . "%'");

   

    }
}
?>

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
                        <a class="nav-link" href="?command=teams">Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?command=pokedex">Pokédex</a>
                    </li>
                    <?php if (isset($_COOKIE['admin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="?command=user">Users</a>
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
        <h1>Users</h1>
        <p class="lead">View users</p>
        <form method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for a user by name..." autofocus
                    id="searchValue" name="searchValue" onkeypress="checkForEnter(event)"
                    <?php if (isset($_POST['searchValue'])) {
                                                                                                                                                                                            echo "value = '";
                                                                                                                                                                                            echo $_POST['searchValue'];
                                                                                                                                                                                            echo "'";
                                                                                                                                                                                        } ?> />
                <input type="submit" class="btn btn-primary" value="Search" id="searchBtn" name="searchBtn" />

            </div>


        </form>
        <br>
        <table class="table table-striped">
            <tr>
                <th scope="col" style="width: 20%;">UID</th>
                <th scope="col" style="width: 20%;">Email</th>
                <th scope="col" style="width: 20%;">Name</th>
                <th scope="col" style="width: 20%;">Update</th>
                <th scope="col" style="width: 20%;">Delete</th>

            </tr>
            <?php foreach ($list_of_users as $user) : ?>
            <tr>
                <td><?php echo $user['uid']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td> 
                <form action = "?command=updateUser" method="post">
                <button type="submit"  class ="btn btn-primary">Update</button>
                <input type ="hidden" value = "<?php echo $user['email']; ?>" name = "userEmail" id = "userEmail" ></input>
            </form>


            </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>