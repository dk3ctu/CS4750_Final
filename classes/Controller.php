<?php

class Controller
{
    private $command;
    private $db;

    public function __construct($command)
    {
        $this->command = $command;
        $this->db = new Database();
    }

    public function run()
    {
        switch ($this->command) {
            case "home":
                $this->home();
                break;
            case "pokedex":
                $this->pokedex();
                break;
            case "teams":
                $this->teams();
                break;
            case "logout":
                $this->logout();
                break;
            case "login":
                $this->login();
                break;
            case "register":
                $this->register();
                break;
            default:
                $this->registerRedirect();
                break;
        }
    }

    private function home()
    {
        if (!isset($_COOKIE['email'])) {
            header("Location: ?command=registerRedirect");
        }

        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];

        include("templates/home.php");
    }

    private function pokedex()
    {
        if (!isset($_COOKIE['email'])) {
            header("Location: ?command=registerRedirect");
        }

        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];

        include("templates/pokedex.php");
    }

    private function teams()
    {
        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];

        $list_of_pokemon = $this->db->query("select * from pokemon");

        if (isset($_POST["pokemon1"])) {
            // if "None", then don't bother trying to do an insert
            // otherwise, insert into pokemon_team table with pokemon_name as the pokemon from the drop down menu
            if ($_POST["pokemon1"] != "None") {
                $pokemon1 = $_POST["pokemon1"];
                $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = '%$pokemon1%' ");

                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number,
                    $_POST["pokemon1"]
                );
                //    $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = ?;", "s", $_POST["pokemon1"]);
                //    $pokemon1 = $_POST["pokemon1"];
                //     $insert = $this->db->query("insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);", 
                //         "siis", $_POST["team_name"], $user_id, $pokedex_number, $_POST["pokemon1"]);
            }
        }


        if (isset($_POST["pokemon2"])) {
            // if "None", then don't bother trying to do an insert
            // otherwise, insert into pokemon_team table with pokemon_name as the pokemon from the drop down menu
            if ($_POST["pokemon2"] != "None") {
                $pokemon2 = $_POST["pokemon2"];
                $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = '%$pokemon2%' ");
                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number,
                    $_POST["pokemon2"]
                );
                //    $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = ?;", "s" ,$_POST["pokemon2"]);
                //     $insert = $this->db->query("insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);", 
                //         "siis", $_POST["team_name"], $user_id, $pokedex_number, $_POST["pokemon2"]);
            }
        }
        if (isset($_POST["pokemon3"])) {
            if ($_POST["pokemon3"] != "None") {
                $pokemon3 = $_POST["pokemon3"];
                $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = '%$pokemon3%' ");
                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number,
                    $_POST["pokemon3"]
                );
                //    $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name =?;", "s", $_POST["pokemon3"]);
                //     $insert = $this->db->query("insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);", 
                //         "siis", $_POST["team_name"], $user_id, $pokedex_number, $_POST["pokemon3"]);
            }
        }
        if (isset($_POST["pokemon4"])) {
            if ($_POST["pokemon4"] != "None") {
                $pokemon4 = $_POST["pokemon4"];
                $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = '%$pokemon4%' ");
                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number,
                    $_POST["pokemon4"]
                );
                // $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name =?;", "s", $_POST["pokemon4"]);
                // $insert = $this->db->query("insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);", 
                //     "siis", $_POST["team_name"], $user_id, $pokedex_number, $_POST["pokemon4"]);
            }
        }
        if (isset($_POST["pokemon5"])) {
            if ($_POST["pokemon5"] != "None") {
                $pokemon5 = $_POST["pokemon5"];
                $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = '%$pokemon5%' ");
                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number,
                    $_POST["pokemon5"]
                );
                // $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name =?;", "s", $_POST["pokemon5"]);
                // $insert = $this->db->query("insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);", 
                //     "siis", $_POST["team_name"], $user_id, $pokedex_number, $_POST["pokemon5"]);
            }
        }
        if (isset($_POST["pokemon6"])) {
            if ($_POST["pokemon6"] != "None") {
                $pokemon6 = $_POST["pokemon6"];

                $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = '%$pokemon6%' ");
                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number,
                    $_POST["pokemon6"]
                );
            }
        }

        include("templates/teams.php");
    }

    private function logout()
    {
        setcookie("name", "", time() - 3600);
        setcookie("email", "", time() - 3600);

        header("Location: ?command=login");
    }

    private function login()
    {
        if (isset($_POST["email"])) {
            $data = $this->db->query("select * from user where email = ?;", "s", $_POST["email"]);
            if (empty($data)) {
                $error_msg = "A user under this email does not exist.";
            } else if (!empty($data)) {
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    setcookie("name", $data[0]["name"], time() + 3600);
                    setcookie("email", $data[0]["email"], time() + 3600);

                    header("Location: ?command=home");
                } else {
                    $error_msg = "Wrong password!";
                }
            }
        }
        include("templates/login.php");
    }

    private function registerRedirect()
    {
        include("templates/register.php");
    }

    private function register()
    {
        $data = $this->db->query("select * from user where email = ?;", "s", $_POST["email"]);
        if (empty($data)) {
            $insert = $this->db->query(
                "insert into user (name, email, password) values (?, ?, ?);",
                "sss",
                $_POST["name"],
                $_POST["email"],
                password_hash($_POST["password"], PASSWORD_DEFAULT)
            );
        } else if (!empty($data)) {
            $error_msg = "A user under this email already exists!";
        }

        include("templates/register.php");
    }
}
