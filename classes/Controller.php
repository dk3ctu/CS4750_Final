<?php

class Controller {
    private $command;
    private $db;
    
    public function __construct($command) {
        $this->command = $command;
        $this->db = new Database();
    }

    public function run() {
        switch($this->command) {
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
                $this->destroyCookies();
            case "login":
            default:
                $this->login();
                break;
        }
    }

    private function home() {
        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];

        include("templates/home.php");
    }

    private function pokedex() {
        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];

        $list_of_pokemon = $this->db->query("select * from pokemon");
        include("templates/pokedex.php");
    }

    private function teams() {
        $user = [
            "name" => $_COOKIE["name"],
            "email" => $_COOKIE["email"],
        ];
        $user_id = $this->db->query("select uid from user where email = ?;", "s", $user["email"]);
        $user_id = $user_id[0]["uid"];

        include("templates/teams.php");
    }
    
    private function destroyCookies() {
        setcookie("name", "", time() - 3600);
        setcookie("email", "", time() - 3600);
    }

    private function login() {
        if (isset($_POST["email"])) {
            $data = $this->db->query("select * from user where email = ?;", "s", $_POST["email"]);
            if ($data === false) {
                $error_msg = "Error checking for user";
            } else if (!empty($data)) {
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    setcookie("name", $data[0]["name"], time() + 3600);
                    setcookie("email", $data[0]["email"], time() + 3600);
                    
                    header("Location: ?command=home");
                } else {
                    $error_msg = "Wrong password";
                }
            } else { // empty, no user found
                $error_msg = "New user created";
                $insert = $this->db->query("insert into user (name, email, password) values (?, ?, ?);", 
                        "sss", $_POST["name"], $_POST["email"], 
                        password_hash($_POST["password"], PASSWORD_DEFAULT));

                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    setcookie("name", $_POST["name"], time() + 3600);
                    setcookie("email", $_POST["email"], time() + 3600);
                  
                    header("Location: ?command=home");
                }
            }
        }
        include("templates/login.php");
    }   
}