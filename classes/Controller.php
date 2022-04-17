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
        $db_for_teams = $this->db;

        $list_of_pokemon = $this->db->query("select * from pokemon");
        if (isset($_POST["team_name"]))
            $check_for_existing_team_name = $this->db->query("select * from pokemon_team where team_name = ?;", "s", $_POST["team_name"]);

        if (empty($check_for_existing_team_name)) {
            if (isset($_POST["pokemon1"])) {
                // if "None", then don't bother trying to do an insert
                // otherwise, insert into pokemon_team table with pokemon_name as the pokemon from the drop down menu
                if ($_POST["pokemon1"] != "none") {
                    $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = ?;", "s", $_POST["pokemon1"]);

                    $insert = $this->db->query(
                        "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                        "siis",
                        $_POST["team_name"],
                        $user_id,
                        $pokedex_number[0]["pokedex_number"],
                        $_POST["pokemon1"]
                    );
                }
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
            if ($_POST["pokemon2"] != "none") {
                $pokedex_number2 =  $this->db->query("select pokedex_number from pokemon where name = ?;", "s", $_POST["pokemon2"]);
                
                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number2[0]["pokedex_number"],
                    $_POST["pokemon2"]
                );
            }
        }
        if (isset($_POST["pokemon3"])) {
            if ($_POST["pokemon3"] != "none") {
                $pokedex_number3 =  $this->db->query("select pokedex_number from pokemon where name = ?;", "s", $_POST["pokemon3"]);
                
                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number3[0]["pokedex_number"],
                    $_POST["pokemon3"]
                );
            }
        }
        if (isset($_POST["pokemon4"])) {
            if ($_POST["pokemon4"] != "none") {
                $pokedex_number4 =  $this->db->query("select pokedex_number from pokemon where name = ?;", "s", $_POST["pokemon4"]);
                
                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number4[0]["pokedex_number"],
                    $_POST["pokemon4"]
                );
            }
        }
        if (isset($_POST["pokemon5"])) {
            if ($_POST["pokemon5"] != "none") {
                $pokedex_number5 =  $this->db->query("select pokedex_number from pokemon where name = ?;", "s", $_POST["pokemon5"]);

                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number5[0]["pokedex_number"],
                    $_POST["pokemon5"]
                );
            }
        }
        if (isset($_POST["pokemon6"])) {
            if ($_POST["pokemon6"] != "none") {
                $pokedex_number6 =  $this->db->query("select pokedex_number from pokemon where name = ?;", "s", $_POST["pokemon6"]);

                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number6[0]["pokedex_number"],
                    $_POST["pokemon6"]
                );
            }
        } else {
            $error_msg = "Team name already exists. Use another name.";
        }

        // display the team
        $user_pokemon_teams = $this->db->query("select distinct team_name from pokemon_team where uid = ?", "i", $user_id); // get the team_name(s) of the user
        // get the names and types of each pokemon team
        foreach ($user_pokemon_teams as $team) {
            $members = $this->db->query("select pokemon_name, type1, type2 from pokemon_team natural join pokemon where uid = ? and team_name = ?", "is", $user_id, $team["team_name"]); // gives all the pokemon names under a user no matter which team_name they are in
        }

        // team type effectiveness
        // for each pokemon on the team, add up the strengths and weaknesses for each type:
        // for ecah pokemon on the team, if 1, don't do math; if greater than 1, increase the count of weaknesses for this praticular type;, if less than one then increase the count of weaknesses for this particular type

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
