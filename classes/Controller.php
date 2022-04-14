<?php

class Controller {
    private $command;
    private $db;
    //private $submitlist;
    
    public function __construct($command) {
        $this->command = $command;
        $this->db = new Database();
        //$this->submitlist = ""; 
    }

    public function run() {
        switch($this->command) {
            case "home":
                $this->home();
                break;
            
            case "logout":
                $this->destroyCookies();
            case "login":
                $this->login();
                break;
            default:
                $this->login();
        }
    }

    private function home(){
        
        include("templates/homepage.php");
    }
  
    

    private function destroyCookies() {
        setcookie("name", "", time() - 3600);
        setcookie("email", "", time() - 3600);
        //setcookie("score", "", time() - 3600);
        //echo "Hi " . $_COOKIE["name"];
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
                    $_SESSION["name"] = $_POST["name"];
                    $_SESSION["email"] = $_POST["email"];
                    header("Location: ?command=home");
                } else {
                    $error_msg = "Wrong password";
                }
            } else { // empty, no user found
                $insert = $this->db->query("insert into user (name, email, password) values (?, ?, ?);", 
                        "sss", $_POST["name"], $_POST["email"], 
                        password_hash($_POST["password"], PASSWORD_DEFAULT));
                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    setcookie("name", $_POST["name"], time() + 3600);
                    setcookie("email", $_POST["email"], time() + 3600);
                    $_SESSION["name"] = $_POST["name"];
                    $_SESSION["email"] = $_POST["email"];
                    header("Location: ?command=home");
                }
            }
        }
        include("../templates/login.php");
    }

   
}