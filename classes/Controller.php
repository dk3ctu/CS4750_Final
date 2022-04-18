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
            case "deleteTeam":
                $this->deleteTeam();
                break;
            case "updateTeam":
                $this->updateTeam();
                break;
            case "actuallyUpdate":
                $this->actuallyUpdate;
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
            case "user":
                $this->user();
                break;
            case "deleteUser":
                $this->deleteUser();
                break;
            case "updateUser":
                $this->updateUser();
                break;
            case "actuallyUpdate":
                $this->actuallyUpdate();
                break;
            case "actuallyUpdateTeam":
                $this->actuallyUpdateTeam();
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


    private function user()
    {
        //$dont_show = true;
        if (!isset($_COOKIE['email'])) {
            header("Location: ?command=registerRedirect");
        }

        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];

        include("templates/users.php");
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
        $aboutToUpdate = false;
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

                /* 
                $insert = $this->db->query(
                    "insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);",
                    "siis",
                    $_POST["team_name"],
                    $user_id,
                    $pokedex_number,
                    $_POST["pokemon1"]
                );
                */

                /*
                $pokedex_number =  $this->db->query("select pokedex_number from pokemon where name = ?;", "s", $_POST["pokemon1"]);
                $pokemon1 = $_POST["pokemon1"];
                $insert = $this->db->query("insert into pokemon_team (team_name, uid, pokedex_number, pokemon_name) values (?, ?, ?, ?);", "siis", $_POST["team_name"], $user_id, $pokedex_number, $_POST["pokemon1"]);
                */
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
        }
    }
    
         else {
            $error_msg = "Team name already exists. Use another name.";
        }

        // display the team
        $user_pokemon_teams = $this->db->query("select distinct team_name from pokemon_team where uid = ?", "i", $user_id); // get the team_name(s) of the user
        // get the names and types of each pokemon team
      
        // team type effectiveness
        // for each pokemon on the team, add up the strengths and weaknesses for each type:
        // for ecah pokemon on the team, if 1, don't do math; if greater than 1, increase the count of weaknesses for this praticular type;, if less than one then increase the count of resistances for this particular type




        
        include("templates/teams.php");
    }
    private function deleteTeam()
    {
        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];
        $db_for_teams = $this->db;
        // if (isset($_POST["team_name"]))
        //     $check_for_existing_team_name = $this->db->query("select * from pokemon_team where team_name = ?;", "s", $_POST["team_name"]);
        $team = $_POST["team_name"];
        // sql query to delete a team
        $delete_team = $this->db->query("delete from pokemon_team where uid = ? and team_name = ?", "is", $user_id, $team);

        header("Location: ?command=teams");
    }

    public $p1 = "";
    public $p2 = "";
    public $p3 = "";
    public $p4 = "";
    public $p5 = "";
    public $p6 = "";
    public $team = "";
    public $old_pks = array();
    private function updateTeam()
    {
        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];
        $db_for_teams = $this->db;
        $user_pokemon_teams = $this->db->query("select distinct team_name from pokemon_team where uid = ?", "i", $user_id); 
        // if (isset($_POST["team_name"]))
        //     $check_for_existing_team_name = $this->db->query("select * from pokemon_team where team_name = ?;", "s", $_POST["team_name"]);
        $team = $_POST["team_to_update"];
       
        $get_team = $this->db->query("select * from pokemon_team where team_name = ? and uid = ?;", "si", $team, $user_id);
        if(!empty($get_team[0]["pokemon_name"]))
            $p1 = $get_team[0]["pokemon_name"];
        if(!empty($get_team[1]["pokemon_name"]))
            $p2 = $get_team[1]["pokemon_name"];
        if(!empty($get_team[2]["pokemon_name"])) 
            $p3 = $get_team[2]["pokemon_name"];
        if(!empty($get_team[3]["pokemon_name"])) 
            $p4 = $get_team[3]["pokemon_name"];
        if(!empty($get_team[4]["pokemon_name"]))
            $p5 = $get_team[4]["pokemon_name"];
        if(!empty($get_team[5]["pokemon_name"]))    
            $p6 = $get_team[5]["pokemon_name"];

        $pkks = array($p1,$p2,$p3,$p4,$p5,$p6);
            for($i = 0; $i < 6; $i++){
                $old_pks[$i] = $pkks[$i];
            }
        
        $aboutToUpdate = true;
        $list_of_pokemon = $this->db->query("select * from pokemon");
        include("templates/teams.php");
        
    }

    private function actuallyUpdateTeam(){
        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $list_of_pokemon = $this->db->query("select * from pokemon");
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];


        
        
        
        if($_POST["p1"] != "none")
            $p1 = $_POST["p1"];
        if($_POST["p2"] != "none")
            $p2 = $_POST["p2"];
        if($_POST["p3"] != "none")
            $p3 = $_POST["p3"];
        if($_POST["p4"] != "none")
            $p4 = $_POST["p4"];
        if($_POST["p5"] != "none")
            $p5 = $_POST["p5"];
        if($_POST["p6"] != "none")
            $p6 = $_POST["p6"];

     
        $pks = array($p1,$p2,$p3,$p4,$p5,$p6);
        
        $i = 0;
        foreach($pks as $p){
            
            if($p != "none"){
               
                $update = $this->db->query("update pokemon_team set pokemon_name = ? where team_name = ? and uid = ? and pokemon_name = ?", "ssi", $p, $_POST["team_name"], $user_id, $old_pks[$i]);
                $i = $i + 1;
            }
        }   

    header("Location: ?command=teams");

        
    }
    private function logout()
    {
        setcookie("name", "", time() - 3600);
        setcookie("email", "", time() - 3600);
        setcookie("admin", "", time() - 3600);
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
                    if($data[0]["admin"] == 1){
                        setcookie("admin", $data[0]["admin"], time() +3600);
                    }
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
            $admin = 0;
            if(($_POST["email"] == "eqp6wkt@virginia.edu" || $_POST["email"] == "vz5ud@virginia.edu" || $_POST["email"] == "dk3ctu@virginia.edu" ||
            $_POST["email"] == "dkk8es@virginia.edu")){
                $admin = 1;
            }
            $insert = $this->db->query(
                "insert into user (name, email, password, admin) values (?, ?, ?, ?);",
                "sssi",
                $_POST["name"],
                $_POST["email"],
                password_hash($_POST["password"], PASSWORD_DEFAULT), $admin
            );

            setcookie("name", $_POST["name"], time() + 3600);
            setcookie("email", $_POST["email"], time() + 3600);
            if ($admin == 1) {
                setcookie("admin", $admin, time() +3600);
            }
            header("Location: ?command=home");

        } else if (!empty($data)) {
            $error_msg = "A user under this email already exists!";
        }

        include("templates/register.php");
    }

    public $email = "";
    public $name = "";
    public $uid = "";
    private function updateUser(){
        $dont_show = false;
        // grab the query of a user 
        $data = $this->db->query("select * from user where email = ?;", "s", $_POST["userEmail"]);
        
        $email = $data[0]['email'];
        $name = $data[0]['name'];
        $uid = $data[0]['uid'];       

        include("templates/users.php");
        
    }
    
    private function actuallyUpdate() {
        $update = $this->db->query("update user set email = ?, name = ? where uid = ?", "ssi", $_POST['email'], $_POST['name'], $_POST['uid']);
        header("Location: ?command=user");
    }

    private function deleteUser() {
       $sql = $this->db->query("delete from user where email = ?;", "s", $_POST["userEmail2"]);
       header("Location: ?command=user");    
    }


}