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

    private function home(){
        
        include("templates/home.php");
    }
    private function pokedex(){
        
        include("templates/pokedex.php");
        
    }
    private function teams(){
        
        include("templates/teams.php");
    }

    function getAllPokemon()
{
	$db = new mysqli(connect::$db['host'], connect::$db['user'], connect::$db['pass'], connect::$db[
        'database']);
	$query = "select * from pokemon";

	$statement = $db->prepare($query);
	$statement->execute();

	// fetchAll() returns an array of all rows in the result set
	$results = $statement->fetchAll();   

	$statement->closeCursor();

	return $results;
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