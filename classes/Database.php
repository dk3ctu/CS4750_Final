<?php
include("connect.php");
class Database {
    public $mysqli;

  

    public function __construct() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->mysqli = new mysqli($host, $user, $pass, $dbname);

    }

    public function query($query, $bparam=null, ...$params) {
        $stmt = $this->db->prepare($query);

        if ($bparam != null)
            $stmt->bind_param($bparam, ...$params);

        if (!$stmt->execute()) {
            return false;
        }

        if (($res = $stmt->get_result()) !== false) {
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        return true;
    }
}